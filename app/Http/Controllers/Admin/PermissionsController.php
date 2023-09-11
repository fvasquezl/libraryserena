<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Permission);

        return view('admin.permissions.index', [
            'permissions' => Permission::all(),
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $this->authorize('update', $permission);

        return view('admin.permissions.edit', [
            'permission' => $permission,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->authorize('update', $permission);

        $data = $request->validate(['display_name' => 'required']);
        $permission->update($data);

        return redirect()
            ->route('admin.permissions.edit', $permission)
            ->with('info', 'El Permiso ha sido actualizado');
    }


}
