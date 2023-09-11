<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\Department;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::allowed()->published()->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->authorize('create', new Post);

        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create', new Post);

        $post = Post::create($request->all());

        return redirect()
            ->route('admin.posts.edit', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Undocumented function
     *
     * @param Post $post
     * @return void
     */
    public function edit(Post $post)
    {
//        $this->authorize('update', $post);

        return view('admin.posts.edit', [
            'post' => $post,
            'tags' => Tag::all(),
            'roles' => Role::with('permissions')->get(),
            'categories' => Category::all(),
            'departments' => Department::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Post $post)
    {

        $this->authorize('update', $post);

        //!$request->excerpt ? 'test':'';

        $post->update($request->all());
        $post->syncTags($request->get('tags'));
        $post->departments()->detach();
        $post->roles()->detach();

        if($request->has('departments')){
            $post->departments()->sync($request->get('departments'));
        }

        if($request->has('roles')){
            $post->syncRoles($request->get('roles'));
        }

        return redirect()
            ->route('admin.posts.edit', $post)
            ->with('info', 'Publicacion actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back()
            ->with('info', 'Publicacion Eliminada con exito');
    }
}
