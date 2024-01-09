<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //El sistema va a tener 2 roles
        //1-Administrador, 2-Secretario
        $admin = Role::create(['name' => 'admin']);
        $secretaria = Role::create(['name' => 'secretaria']);

//Le estamos dando permisos a las rutas que se encuentran en el archivo web.php
        Permission::create(['name' => 'index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'reportes'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'pdf'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'pdf_fechas'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'home'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'miembros'])->syncRoles([$admin]);
        Permission::create(['name' => 'ministerios'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuarios'])->syncRoles([$admin]);
        Permission::create(['name' => 'asistencias'])->syncRoles([$admin, $secretaria]);

        //Asignamos los roles a los usuarios
        User::find(1)->assignRole($admin);
        User::find(2)->assignRole($secretaria);
    }
}
