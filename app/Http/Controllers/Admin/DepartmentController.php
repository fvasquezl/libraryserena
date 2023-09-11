<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\Department\StoreRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Department);

        $departments = Department::get();

        return view('admin.departments.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = new Department;

        $this->authorize('create',$department);

        return view('admin.departments.create',[
            'department'=> $department
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create',new Department);

        $department = Department::create($request->validated());

        return redirect()
            ->route('admin.departments.index')
            ->with('info', 'El departamento fue creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  Department $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $this->authorize('view',$department);

        return view('admin.departments.show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Department $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $this->authorize('update',$department);

        return view('admin.departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Department\StoreRequest $request
     * @param  Department $department
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Department $department)
    {
        $this->authorize('update',$department);

        $department->update($request->validated());

        return redirect()
        ->route('admin.departments.edit', $department)
        ->with('info', 'El departamento fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Department $department
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Department $department)
    {
        $this->authorize('delete',$department);

        $department->delete();

        return redirect()->route('admin.departments.index')
            ->with('info', 'Departamento Eliminado con exito');
    }
}
