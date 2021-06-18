<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function list() {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return response()->json(   
            $posts
        , 200);
    }
    public function detail(Post $post) {
        
        return response()->json(   
            $post
        , 200);
    }
}

