<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
     * Determine whether the user can view the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function view(User $user, Category $category)
    {
        return  $user->hasRole('Admin')|| $user->hasPermissionTo('View categories');
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return  $user->hasRole('Admin')|| $user->hasPermissionTo('Create categories');
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function update(User $user, Category $category)
    {
        return  $user->hasRole('Admin')|| $user->hasPermissionTo('Update categories');
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        return  $user->hasRole('Admin')|| $user->hasPermissionTo('Delete categories');
    }


}
