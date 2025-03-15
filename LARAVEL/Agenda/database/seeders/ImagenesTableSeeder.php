<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class ImagenesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('imagenes')->insert([
        ['idimagen' => 1, 'categoria' => 'aseo', 'imagen' => 'imagenes/banarse.jpg', 'descripcion' => 'imagen que representa el baño', 'created_at' => now(), 'updated_at' => now()],
        ['idimagen' => 3, 'categoria' => 'alimentacion', 'imagen' => 'imagenes/desayunar.jpg', 'descripcion' => 'imagen que representa el desayuno', 'created_at' => now(), 'updated_at' => now()],
        ['idimagen' => 4, 'categoria' => 'tareas escolares', 'imagen' => 'imagenes/colegio_pic.jpg', 'descripcion' => 'imagen que representa el colegio', 'created_at' => now(), 'updated_at' => now()],
        ['idimagen' => 5, 'categoria' => 'salud', 'imagen' => 'imagenes/dentista_pic.png', 'descripcion' => 'imagen que representa ir al dentista', 'created_at' => now(), 'updated_at' => now()],
        ['idimagen' => 6, 'categoria' => 'ocio', 'imagen' => 'imagenes/jugar.png', 'descripcion' => 'imagen que representa jugar', 'created_at' => now(), 'updated_at' => now()],
        ['idimagen' => 7, 'categoria' => 'ocio', 'imagen' => 'imagenes/playa_pic.png', 'descripcion' => 'imagen que representa la playa', 'created_at' => now(), 'updated_at' => now()],
        ['idimagen' => 8, 'categoria' => 'ocio', 'imagen' => 'imagenes/piscina_pic.png', 'descripcion' => 'imagen que representa la piscina', 'created_at' => now(), 'updated_at' => now()],
        ['idimagen' => 9, 'categoria' => 'aseo', 'imagen' => 'imagenes/vestirse.jpg', 'descripcion' => 'imagen que representa vestirse', 'created_at' => now(), 'updated_at' => now()],
        ['idimagen' => 10, 'categoria' => 'tareas escolares', 'imagen' => 'imagenes/comer.jpg', 'descripcion' => 'imagen que representa comer', 'created_at' => now(), 'updated_at' => now()],
   
       ]);

    }
}
