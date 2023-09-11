<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $categories = Category::all();
        $posts = $category->IntersectPosts();

        return view('home', [
            'title' => "Publicaciones de la categoria {$category->name}",
            'posts' => paginateCollection($posts, 10),
            'categories' => $categories,
            'search' =>'',
            'cat'=>0
        ]);
    }

}
