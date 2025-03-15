<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    //! Hay que llamar a las clases obligatoriamente en este metodo
    public function run(): void
    {
       $this->call([
        PersonasTableSeeder::class,
        ImagenesTableSeeder::class,
        AgendaTableSeeder::class,
       ]);
    }
}
