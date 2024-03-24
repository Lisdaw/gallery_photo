<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();


//Route::post('/gambar', [App\Http\Controllers\FotoController::class, 'storeGaleri'])->name('gambar');
// Route::get('/home', [App\Http\Controllers\FotoController::class, 'index'])->name('home');
// Route::get('/foto', [App\Http\Controllers\FotoController::class, 'storeGaleri'])->name('foto.store');

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/home', function () {
        // dd([
        //     'posts' => App\Models\Post::with('likes')->withCount('likes')->get()->toArray(),
        //     'albums' => App\Models\Album::all()
        // ]);
        return view('home', [
            'posts' =>App\Models\Post::with('likes')->withCount('likes')->get(),
            'albums' => App\Models\Album::all()
        ]);
    });
});




Route::get('/image', function () {
    return view('image', ['posts' => App\Models\Post::all()]);
});

Route::get('/album', function () {
    return view('album', [
        'posts' => App\Models\Post::withCount('likes')->with(['likes' => fn ($query) => $query->where('user_id', auth()->user()->id)])->get(),
        'album' => App\Models\Album::all()
    ]);
});
Route::get('/dowloads/{id}', [PostsController::class, 'download']);


// Route::get('/albums', 'AlbumController@index');
Route::post('/albums', [App\Http\Controllers\AlbumController::class, 'store'])->name('album.store');
Route::post('/posts', [App\Http\Controllers\PostsController::class, 'store'])->name('posts.store');
Route::get('/posts/{postId}/like', [App\Http\Controllers\LikeController::class, 'postlike'])->name('postlike');

// Route::post('/post{image}/like',[PostsController::class,'like'])->name('image.like');
// Route::post('/post{image}/unlike',[PostsController::class,'unlike'])->name('image.unlike');
// // Route::post('/posts/{postId}/like', [PostsController::class, 'like'])->name('posts.like');
// Route::post('/posts/{imageId}/unlike', [PostsController::class, 'unlike'])->name('posts.unlike');
