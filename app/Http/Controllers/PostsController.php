<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Auth\UserInterface;
use App\Models\Post;
use App\Models\Album;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AlbumController;
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

    public function download($filename){
        // $post=Post::findOrfail($id);
        // $media=$post->getFirstMedia('download');
        // return $media;
        // $filepath=public_path('images/filename');
        $post=Post::all();
    }

    // public function album(){
    //     $data['albums']=Album::all();
    //     return view('home',$data);
    // }

    // public function homeview(){
    //     return view('home', [
    //         'posts'=> Post::all(),
    //         'data' => Album::all()
    //     ]);
    // }


    // public function like(Post $post, Request $request){
    // $like=new Like();
    // $like->users_id=auth()->id();
    // $like->posts_id=$post->id();
    // $like->likeable=1;
    // $like->save();

    // return redirect()->back();

    // }
    // public function unlike(Post $post, Request $request){
    // $like= Like::where('users_id', auth()->id())->where('posts_id', $post->id)->first();
    // $like->delete();

    // return redirect()->back();

    // }
}
