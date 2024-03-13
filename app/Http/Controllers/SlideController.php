<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SlideController extends Controller
{
    public function update(Request $request, int $id): RedirectResponse
    {
        /** @var Slide $slide */
        $slide = Slide::query()->findOrFail($id);

        if ($request->has('title')) {
            $slide->title = $request->input('title');
        }
        if ($request->has('content')) {
            $slide->content = $request->input('content');
        }

        if ($request->hasFile('photo')) {
            if ($slide->photo && Storage::disk('public')->exists($slide->photo)) {
                Storage::disk('public')->delete($slide->photo);
            }

            $file = $request->file('photo');
            $path = $file->storeAs('uploads', 'slide_'.$slide->id . '.jpg', 'public');
            $slide->photo = $path;
        }

        $slide->save();

        return redirect()->back()->with('success', 'Slide updated successfully');
    }

    public function openFile(int $id): BinaryFileResponse
    {
        /** @var Slide $file */
        $file = Slide::query()->findOrFail($id);
        $filePath = storage_path('app/public/' . $file->photo);

        return response()->file($filePath);
    }
}
