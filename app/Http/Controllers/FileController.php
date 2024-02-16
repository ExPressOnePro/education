<?php

namespace App\Http\Controllers;

use App\Models\File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $files = File::all();
            return view('pages.files.index', compact('files'));
//            return response()->json(['status' => true, 'data' => ['media' => $media]]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function openFile($id)
    {
        $file = File::findOrFail($id);
        $filePath = storage_path('app/public/' . $file->real_path);

        return response()->file($filePath);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048', // Максимальный размер файла в Кб
        ]);

        $file = $request->file('file');
        $name = $request->input('file_name');

        $fileType = $file->getClientMimeType(); // Получение MIME-типа файла
        $fileSize = $file->getSize(); // Получение размера файла в байтах
        $real_path = $request->file('file')->storeAs('uploads', $name .'.'. $file->getClientOriginalExtension(), 'public');

        $fileModel = new File();
        $fileModel->user_id = Auth::user()->id;
        $fileModel->file_name = $name;
        $fileModel->real_path = $real_path;
        $fileModel->file_type = $fileType;
        $fileModel->file_size = $fileSize;
        $fileModel->year = Carbon::now()->year;
        $fileModel->publication_date = Carbon::now(); // Или другая дата публикации
        $fileModel->save();

        return redirect()->route('achizition')->with('success', 'File uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $file = File::find($id);

        if (!$file) {
//            return redirect()->route('achizition')->with('error', 'File not found');
            return 'error';
        }

        $file->file_name = $request->input('file_name');
        $file->year = $request->input('year');
        $file->publication_date = $request->input('publication_date');
        $file->save();

        return redirect()->route('achizition')->with('success', 'File updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $file = File::find($id);

        if ($file) {
            $file->delete();
            Storage::disk('public')->delete($file->real_path);
            return redirect()->route('achizition')->with('success', 'File deleted successfully');
        }

        return redirect()->route('achizition')->with('error', 'File not found');
    }
}
