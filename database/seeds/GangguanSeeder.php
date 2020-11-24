<?php

use App\Models\Gangguan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GangguanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('gangguan')->insert([
            'id' => 1,
            'nama' => 'Anoreksia Nervosa',
            'deskripsi' => ''
        ]);



        DB::table('gangguan')->insert([
            'id' => 2,
            'nama' => 'Bulimia Nervosa',
            'deskripsi' => ''
        ]);



        DB::table('gangguan')->insert([
            'id' => 3,
            'nama' => 'Gangguan Makan Berlebihan',
            'deskripsi' => ''
        ]);
    }
}
