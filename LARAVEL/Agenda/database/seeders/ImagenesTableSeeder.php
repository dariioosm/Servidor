<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Imagen;
use Illuminate\Database\Seeder;

class ImagenesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Imagen::create(['categoria'=>'aseo','imagen'=>'imagenes/banarse.jpg','descripcion'=>'Imagen del baño']);
        Imagen::create(['categoria'=>'alimentacion','imagen'=>'imagenes/desayunar.jpg','descripcion'=>'Imagen del desayuno']);
        Imagen::create(['categoria'=>'salud','imagen'=>'imagenes/dentista_pic.png','descripcion'=>'Imagen del dentista']);

    }
}
