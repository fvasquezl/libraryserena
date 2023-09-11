<?php
/**
 * Created by PhpStorm.
 * User: fvasquez
 * Date: 11/16/19
 * Time: 9:11 PM
 */

namespace Tests;

use App\User;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;

trait TestHelper
{
    protected $adminUser;

    public function adminUser(array $attributes =[])
    {
        if($this->adminUser){
            return $this->adminUser;
        }
        $this->createAdminRole();
        $this->adminUser =factory(User::class)->create($attributes);
        $this->adminUser->assignRoles('admin');
        return $this->adminUser;
    }

    public function createAdminRole()
    {
        return factory(Role::class)->create([
            'name'      => 'Admin',
            'slug'      => 'admin',
            'special'   => 'all-access'
        ]);
    }


    public function createPermission($permission)
    {
        factory(Permission::class)->create([
            'slug' => $permission,
        ]);
    }
}