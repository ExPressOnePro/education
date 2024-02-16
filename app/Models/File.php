<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'file_path',
        'year',
        'publication_date'
    ];


    public function index()
    {
        $files = File::all();
        return view('pages.components.files', compact('files'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048',
            'year' => 'required|integer',
            'publication_date' => 'required|date',
        ]);

        $fileName = $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('public/files', $fileName);

        $file = new File();
        $file->file_name = $fileName;
        $file->file_path = $filePath;
        $file->year = $request->input('year');
        $file->publication_date = $request->input('publication_date');
        $file->save();

        return redirect()->route('files.index')->with('success', 'File uploaded successfully');
    }
}
