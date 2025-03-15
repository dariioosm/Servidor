<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Agenda;
use Illuminate\Database\Seeder;

class AgendaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Agenda::create(['fecha'=>'2025-01-20','hora'=>'09:00:00','idpersona'=>1,'idimagen'=>3]);
        Agenda::create(['fecha'=>'2025-01-20','hora'=>'21:00:00','idpersona'=>1,'idimagen'=>5]);
        Agenda::create(['fecha'=>'2025-01-20','hora'=>'13:00:00','idpersona'=>2,'idimagen'=>7]);
    }
}
