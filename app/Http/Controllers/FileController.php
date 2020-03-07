<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Upload;

class FileController extends Controller
{
    public function index()
    {
        return view('file.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required:max:255',
            'overview' => 'required',
            'price' => 'required|numeric'
        ]);

        auth()->user()->files()->create([
            'title' => $request->get('title'),
            'overview' => $request->get('overview'),
            'price' => $request->get('price')
        ]);

        return back()->with('message', 'Your file is submitted Successfully');
    }

    public function upload(Request $request)
    {
        $uploadedFile = $request->file('file');
        $filename = time() . $uploadedFile->getClientOriginalName();

        Storage::disk('local')->putFileAs(
            'files/' . $filename,
            $uploadedFile,
            $filename
        );

        $upload = new Upload;
        $upload->filename = $filename;

        $upload->user()->associate(auth()->user());

        $upload->save();

        return response()->json([
            'id' => $upload->id
        ]);
    }
}
