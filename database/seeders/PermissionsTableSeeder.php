<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User Permissions
        Permission::create([
            'name' => 'View users',
            'display_name' => 'Ver usuarios',
        ]);
        Permission::create([
            'name' => 'Create users',
            'display_name' => 'Crear usuarios',
        ]);
        Permission::create([
            'name' => 'Update users',
            'display_name' => 'Actualizar usuarios',
        ]);
        Permission::create([
            'name' => 'Delete users',
            'display_name' => 'Eliminar usuarios',
        ]);

        //Roles Permissions
        Permission::create([
            'name' => 'View roles',
            'display_name' => 'Ver roles',
        ]);
        Permission::create([
            'name' => 'Create roles',
            'display_name' => 'Crear roles',
        ]);
        Permission::create([
            'name' => 'Update roles',
            'display_name' => 'Actualizar roles',
        ]);
        Permission::create([
            'name' => 'Delete roles',
            'display_name' => 'Eliminar roles',
        ]);

        //Productos Permissions

        Permission::create([
            'name' => 'View posts',
            'display_name' => 'Ver publicaciones',
        ]);
        Permission::create([
            'name' => 'Create posts',
            'display_name' => 'Crear publicaciones',
        ]);
        Permission::create([
            'name' => 'Update posts',
            'display_name' => 'Actualizar publicaciones',
        ]);
        Permission::create([
            'name' => 'Delete posts',
            'display_name' => 'Eliminar publicaciones',
        ]);

        //Permissions Permissions

        Permission::create([
            'name' => 'View permissions',
            'display_name' => 'Ver permisos',
        ]);

        Permission::create([
            'name' => 'Update permissions',
            'display_name' => 'Actualizar permisos',
        ]);

        //Departments Permissions
        Permission::create([
            'name' => 'View departments',
            'display_name' => 'Ver departamentos'
        ]);
        Permission::create([
            'name' => 'Create departments',
            'display_name' => 'Crear departamentos'
        ]);
        Permission::create([
            'name' => 'Update departments',
            'display_name' => 'Actualizar departamentos'
        ]);
        Permission::create([
            'name' => 'Delete departments',
            'display_name' => 'Eliminar departamentos'
        ]);

         //Categories Permissions
         Permission::create([
            'name' => 'View categories',
            'display_name' => 'Ver categorias'
        ]);
        Permission::create([
            'name' => 'Create categories',
            'display_name' => 'Crear categorias'
        ]);
        Permission::create([
            'name' => 'Update categories',
            'display_name' => 'Actualizar categorias'
        ]);
        Permission::create([
            'name' => 'Delete categories',
            'display_name' => 'Eliminar categorias'
        ]);

    }
}
