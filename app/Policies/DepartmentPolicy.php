<?php

namespace App\Policies;

use App\Models\Department;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepartmentPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view any posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function before(User $user)
    {
        if($user->hasRole('Admin'))
        {
            return true;
        }
    }

    /**
     * Determine whether the user can view the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function view(User $user, Department $department)
    {
        return  $user->hasRole('Admin')|| $user->hasPermissionTo('View departments');
    }

    /**
     * Determine whether the user can create departments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return  $user->hasRole('Admin')|| $user->hasPermissionTo('Create departments');
    }

    /**
     * Determine whether the user can update the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function update(User $user, Department $department)
    {
        return  $user->hasRole('Admin')|| $user->hasPermissionTo('Update departments');
    }

    /**
     * Determine whether the user can delete the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function delete(User $user, Department $department)
    {
        return  $user->hasRole('Admin')|| $user->hasPermissionTo('Delete departments');
    }

}
