<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Persona;
use Illuminate\Database\Seeder;

class PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Persona::create(['nombre'=>'Carlos','apellidos'=>'Perez','edad'=>5]);
        Persona::create(['nombre'=>'Juan','apellidos'=>'Lopez','edad'=>7]);
        Persona::create(['nombre'=>'Manuel','apellidos'=>'Fernandez','edad'=>10]);
    }
}
