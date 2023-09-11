<?php
namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::factory()->create([
            'name'=>'DG',
            'display_name'=>'Dirección General'
        ]);

       Department::factory()->create([
           'name'=> 'CA',
           'display_name'=>'Consejo de Admon'
        ]);
       Department::factory()->create([
            'name'=>'GS',
            'display_name'=>'Gerencia de Servicios de Salud'
        ]);
       Department::factory()->create([
            'name'=>'GO',
            'display_name'=>'Gerencia de Operaciones'
        ]);
       Department::factory()->create([
            'name'=>'KH',
            'display_name'=>'Capital Humano'
        ]);
       Department::factory()->create([
            'name'=>'TE',
            'display_name'=>'Tesorería'
        ]);
       Department::factory()->create([
            'name'=>'TI',
            'display_name'=>'Tecnológia Información'
        ]);
       Department::factory()->create([
            'name'=>'VT',
            'display_name'=>'Ventas'
        ]);
       Department::factory()->create([
            'name'=>'MK',
            'display_name'=>'Mercadotecnia'
        ]);
       Department::factory()->create([
            'name'=>'SG',
            'display_name'=>'Servicios Generales'
        ]);
       Department::factory()->create([
            'name'=>'AB',
            'display_name'=>'Alimentos & Bebidas'
        ]);
       Department::factory()->create([
            'name'=>'SE',
            'display_name'=>'Servicio al Cliente Excepcional'
        ]);
       Department::factory()->create([
            'name'=>'SL',
            'display_name'=>'Serena Living'
        ]);
       Department::factory()->create([
            'name'=>'SC-ROS',
            'display_name'=>'SerenaCenter ROS-1'
        ]);
       Department::factory()->create([
            'name'=>'SC-TIJ',
            'display_name'=>'SerenaCenter TIJ-1'
        ]);
    }
}



