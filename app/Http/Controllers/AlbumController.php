<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use illuminate\Support\Facades\DB;
class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $album=DB::table('albums')->get();
        return view('album',['albums'=>$album]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'namaalbum'=>'required',
            'deskripsi'=>'required'
        ]);
        $album=New Album;
        $album->namaalbum   =$request->namaalbum;
        $album->deskripsi   =$request->deskripsi;
        $album->user_id     = auth()->id();
        $album->save();
    }
    public function add(Request $request)
    {

        // $request->validate([
        //     'namaalbum'=>'required',
        //     'deskripsi'=>'required'
        // ]);
        // $album=New Album;
        // $album->namaalbum   =$request->namaalbum;
        // $album->deskripsi   =$request->deskripsi;
        // $album->user_id     = auth()->id();
        // $album->save();
        // return back()->withMessage('Create Album Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }
}
