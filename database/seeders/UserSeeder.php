<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // CREO 2 USUARIOS ( adm, editor) PARA TENER EL SISTEMA CARGADO

        //adom
        $admin=User::create([
            'name'=>'admin',
            'email'=>'admin@speaksmarte.net',
            'password'=>Hash::make('admin'),
        ]);
        //ASIGNACION DE USUARIOS AL ROL CORRESPONDIENTE

        //  $admin (USER) --> Rol adm
        $admin->assignRole('admin');


        // editor
        $editor=User::create([
            'name'=>'editor',
            'email'=>'editor@speaksmarte.net',
            'password'=>Hash::make('editor'),
        ]);
        // $editor (USER) --> Rol editor.
        $editor->assignRole('editor');

    }
}
