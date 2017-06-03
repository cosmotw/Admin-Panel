<?php

namespace App\Http\Controllers\API;

use App\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inputParams = [
            'start' => $request->input('start'),
            'length' => $request->input('length'),
            'order' => $request->input('order')[0],
            'search' => $request->input('search'),
            'selectFields' => ['id', 'title', 'photo_url', 'description', 'category_id', 'created_at', 'updated_at']
        ];

        $dataList = Album::dataList($inputParams);

        return response()
                ->json([
                    'draw' => intval($request->input('draw')),
                    'recordsTotal' => $dataList['count'],
                    'recordsFiltered' => $dataList['count'],
                    'data' => $dataList['data']
                ]);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Album::destroy($id);
    }
}
