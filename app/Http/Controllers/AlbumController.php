<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use App\Http\Requests\StorePhotoPost;

class AlbumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('albumTable');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $album = Album::find($id);
        $outputData = [
            'putURL' => url('projects/album/' . $album->id),
            'photoTitle' => $album->title,
            'photoURL' => $album->photo_url,
            'photoDesc' => $album->description,
            'photoCategory' => $album->category,
            'created_at' => $album->created_at
        ];

        return view('createPhoto', $outputData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(StorePhotoPost $request, int $id)
    {
        $inputData = $request->only(['photoTitle', 'photoURL', 'photoDesc']);
        $result = Album::where('id', $id)->update([
            'title' => $inputData['photoTitle'],
            'photo_url' => $inputData['photoURL'],
            'description' => $inputData['photoDesc']
        ]);

        return redirect('projects/album');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }
}
