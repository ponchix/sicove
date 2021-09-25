<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permisos=[
            'ver-role',
            'crear-role',
            'editar-role',
            'borrar-role',
            //tabla vehiculos
            'ver-vehiculo',
            'crear-vehiculo',
            'editar-vehiculo',
            'borrar-vehiculo',
        ];
        foreach ($permisos as $permiso) {
            // code...
            Permission::create(['name'=>$permiso]);
        }
    }
}
