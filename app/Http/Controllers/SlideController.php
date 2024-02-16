<?php

namespace App\Http\Controllers;

use App\Models\slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        $slide = Slide::findOrFail($id);

        // Проверяем, были ли изменены название и содержание слайда
        if ($request->has('title')) {
            $slide->title = $request->input('title');
        }
        if ($request->has('content')) {
            $slide->content = $request->input('content');
        }

        // Проверяем, было ли загружено новое изображение для слайда
        if ($request->hasFile('photo')) {
            // Обновляем изображение слайда
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('slides', $filename, 'public');
            $slide->photo = $path;
        }

        // Сохраняем обновленные данные
        $slide->save();

        return redirect()->back()->with('success', 'Slide updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
