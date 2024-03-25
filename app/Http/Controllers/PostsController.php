<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Auth\UserInterface;
use App\Models\Post;
use App\Models\Album;
use App\Models\Komentar;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\Faker;
use App\Models\Like;
class PostsController extends Controller
{

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'deskription'=>'required',

            'image'=>'required|image|mimes:jpg,png,jpeg,bmp|max:2000',
        ]);
        
        $post = New Post;
        $post->user_id    =  auth()->id();
        $post->title      = $request->title;
        $post->deskription = $request->deskription;
        $post->album_id    =Album::firstWhere('id', $request->album)['id'];



        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName=time().'.' .$file->getClientOriginalExtension();
            $destinationPath=public_path('/images');
            $file->move($destinationPath, $fileName);
            $post->image = $fileName;
        }

         $post->save();
         return back()->withMessage('Upload Image Success');
    }

    public function insertData(Request $req, $id)
    {
        $faker=Faker::create();
        $hasil=Post::find($id);
        $user= New Komentar();
        $user->komentar= $req->komentar;
        $user->post_id=$req->id;
        $user->save();
        return redirect()->action('PostController@store',['id'=>$id]);
    }


}
