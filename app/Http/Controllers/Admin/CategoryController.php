<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Category);

        $categories = Category::paginate();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category;

        $this->authorize('create',$category);

        return view('admin.categories.create',[
            'category'=> $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Category\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create',new Category);

        $category = Category::create($request->validated());

        return redirect()
            ->route('admin.categories.index')
            ->with('info', 'Categoria guardada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $this->authorize('view',$category);

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $this->authorize('update',$category);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Category $category)
    {
        $this->authorize('update',$category);

        $category->update($request->validated());

        return redirect()
            ->route('admin.categories.edit', $category)
            ->with('info', 'Categoria actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->authorize('delete',$category);

        $category->delete();
        return redirect()->route('admin.categories.index')
            ->with('info', 'Rol Eliminado con exito');
    }
}
