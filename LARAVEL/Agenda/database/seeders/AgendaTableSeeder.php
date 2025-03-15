<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Agenda;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AgendaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agenda')->insert([
         ['id' => 2, 'fecha' => '2025-01-20', 'hora' => '09:00:00', 'idpersona' => 1, 'idimagen' => 3, 'created_at' => now(), 'updated_at' => now()],
         ['id' => 3, 'fecha' => '2025-01-20', 'hora' => '21:00:00', 'idpersona' => 1, 'idimagen' => 5, 'created_at' => now(), 'updated_at' => now()],
         ['id' => 4, 'fecha' => '2025-01-20', 'hora' => '13:00:00', 'idpersona' => 2, 'idimagen' => 7, 'created_at' => now(), 'updated_at' => now()],
         ['id' => 5, 'fecha' => '2025-01-20', 'hora' => '18:00:00', 'idpersona' => 1, 'idimagen' => 6, 'created_at' => now(), 'updated_at' => now()],
        ]);
     }
}
