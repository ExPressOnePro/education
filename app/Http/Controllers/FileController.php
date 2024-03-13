<?php

namespace App\Http\Controllers;

use App\Models\File;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view(
            'pages.files.index',
            ['files' => File::all()]
        );
    }

    public function openFile($id): BinaryFileResponse
    {
        /** @var File $file */
        $file = File::query()->findOrFail($id);
        $filePath = storage_path('app/public/' . $file->real_path);

        return response()->file($filePath);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => 'required|file|max:2048',
        ]);

        $file = $request->file('file');
        $name = $request->input('file_name');

        $fileType = $file->getClientMimeType();
        $fileSize = $file->getSize();
        $real_path = $request
            ->file('file')
            ?->storeAs(
                'uploads',
                $name .'.'. $file->getClientOriginalExtension(),
                'public'
            );

        $fileModel = new File();
        $fileModel->user_id = Auth::id();
        $fileModel->file_name = $name;
        $fileModel->real_path = $real_path;
        $fileModel->file_type = $fileType;
        $fileModel->file_size = $fileSize;
        $fileModel->year = Carbon::now()->year;
        $fileModel->publication_date = Carbon::now();
        $fileModel->save();

        return redirect()->route('achizition')->with('success', 'File uploaded successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        /** @var File $file */
        $file = File::query()->findOrFail($id);

        $file->file_name = $request->input('file_name');
        $file->year = $request->input('year');
        $file->publication_date = $request->input('publication_date');
        $file->save();

        return redirect()->route('achizition')->with('success', 'File updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse // why $id int?
    {
        /** @var File $file */
        $file = File::query()->find($id);

        if (!$file) {
            return redirect()->route('achizition')->with('error', 'File not found');
        }

        $file->delete();
        Storage::disk('public')->delete($file->real_path);

        return redirect()->route('achizition')->with('success', 'File deleted successfully');
    }
}
