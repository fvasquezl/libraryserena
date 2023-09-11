<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class TagsController extends Controller
{


    /**
     * @param Tag $tag
     * @return Application|Factory|View
     */
    public function show(Tag $tag)
    {
        $categories = Category::all();
        $posts = $tag->IntersectPosts();

        return view('home', [
            'title' => "Publicaciones de la etiqueta {$tag->name}",
            'posts' => paginateCollection($posts, 10),
            'categories' => $categories,
            'search' => '',
            'cat' => 0
        ]);
    }
}
