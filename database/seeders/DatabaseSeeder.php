<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        //llamado a mis sembradores
        //$this->call([UsuarioSeeder::class, EstadoSeeder::class]);
        $this->call([UsuarioSeeder::class]);
    }
}
