<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dd('hello');
        $request->validate([
            'title' => 'required',
            'file_name' => 'required|mimes:mp4'
        ]);

        $file_name = $request->file('file_name');
        $name = time() . '_' . $file_name->getClientOriginalName();
        $file_name->storeAs('public/videos', $name);

        Video::create([
            'title' => $request->title,
            'file_name' => $file_name
        ]);

        return redirect()->route('videos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
        return view('videos.show', compact('video'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function download(Video $video)
    {
        $path = storage_path('app/public/videos/' . $video->filename);
        return response()->download($path);
    }
}
