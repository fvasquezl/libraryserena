<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\SaveRolesRequest;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Role);
        
        $roles = Role::paginate();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role;

        $this->authorize('create',$role);

        return view('admin.roles.create',[
            'role' => $role,
            'permissions' => Permission::pluck('name','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Roles\SaveRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRolesRequest $request)
    {
        $this->authorize('create',new Role);

        $role = Role::create($request->validated());

        if($request->has('permissions'))
        {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()
            ->route('admin.roles.index')
            ->with('info', 'El role fue creado correctamente');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update',$role);
        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::pluck('name','id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Roles\SaveRolesRequest $request
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRolesRequest $request, Role $role)
    {
        $this->authorize('update',$role);

        $role->update($request->validated());

        $role->permissions()->detach();
 
        if($request->has('permissions'))
        {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()
            ->route('admin.roles.edit', $role)
            ->with('info', 'El role fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage
     * @param Role $role
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete',$role);

        $role->delete(); 

        return redirect()->route('admin.roles.index')
            ->with('info', 'Rol Eliminado con exito');
    }
}
