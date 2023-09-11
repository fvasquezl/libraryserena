<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if($post->isPublished() || auth()->check())
        {
             return view('posts.show', compact('post'));
        }
       abort(404);
    }
}
