<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use illuminate\Support\Facades\DB;
use App\Http\Controllers\PostsController;



class Post extends Model
{
    // use LikeTrait;
    Public function Album(){
        return $this->hasOne(Album::class);
    }
    Public function user(){
        return $this->belongsTo('App\Models\User');
    }

    

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    // public function unlikedBy(User $user,Post $post){
    //     return $this->likes()->where('users_id', $user->id)->where('posts_id', $post->id)->where('likeable',0)->exists();
    // }
}
