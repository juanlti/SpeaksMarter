<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            //llamo al conjunto de seeder


        $this->call([
            // primera carga: Objetos de la entidad Levels
            LevelSeeder::class,
            // segunda carga: Objetos de la entidad Rols
            RoleSeeder::class,
            // tercera carga: Objetos de la entidad Users
            UserSeeder::class,

        ]);




    }
}
