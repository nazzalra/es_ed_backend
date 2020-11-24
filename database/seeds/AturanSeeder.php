<?php

use App\Models\Aturan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('aturan')->insert([
            'id_gejala' => 1,
            'id_gangguan' => 1,
            'nilai_keyakinan' => 0.35
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 2,
            'id_gangguan' => 1,
            'nilai_keyakinan' => 0.30
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 2,
            'id_gangguan' => 2,
            'nilai_keyakinan' => 0.30
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 3,
            'id_gangguan' => 3,
            'nilai_keyakinan' => 0.30
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 4,
            'id_gangguan' => 1,
            'nilai_keyakinan' => 0.30
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 4,
            'id_gangguan' => 2,
            'nilai_keyakinan' => 0.30
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 5,
            'id_gangguan' => 1,
            'nilai_keyakinan' => 0.30
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 5,
            'id_gangguan' => 2,
            'nilai_keyakinan' => 0.30
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 6,
            'id_gangguan' => 1,
            'nilai_keyakinan' => 0.30
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 7,
            'id_gangguan' => 2,
            'nilai_keyakinan' => 0.20
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 8,
            'id_gangguan' => 2,
            'nilai_keyakinan' => 0.32
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 8,
            'id_gangguan' => 3,
            'nilai_keyakinan' => 0.32
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 9,
            'id_gangguan' => 1,
            'nilai_keyakinan' => 0.70
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 10,
            'id_gangguan' => 2,
            'nilai_keyakinan' => 0.70
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 10,
            'id_gangguan' => 1,
            'nilai_keyakinan' => 0.70
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 11,
            'id_gangguan' => 1,
            'nilai_keyakinan' => 0.70
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 11,
            'id_gangguan' => 2,
            'nilai_keyakinan' => 0.70
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 12,
            'id_gangguan' => 2,
            'nilai_keyakinan' => 0.40
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 12,
            'id_gangguan' => 1,
            'nilai_keyakinan' => 0.40
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 13,
            'id_gangguan' => 2,
            'nilai_keyakinan' => 0.30
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 13,
            'id_gangguan' => 3,
            'nilai_keyakinan' => 0.30
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 13,
            'id_gangguan' => 1,
            'nilai_keyakinan' => 0.30
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 14,
            'id_gangguan' => 2,
            'nilai_keyakinan' => 0.50
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 14,
            'id_gangguan' => 3,
            'nilai_keyakinan' => 0.50
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 15,
            'id_gangguan' => 3,
            'nilai_keyakinan' => 0.30
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 16,
            'id_gangguan' => 1,
            'nilai_keyakinan' => 0.30
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 16,
            'id_gangguan' => 2,
            'nilai_keyakinan' => 0.30
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 17,
            'id_gangguan' => 1,
            'nilai_keyakinan' => 0.30
        ]);



        DB::table('aturan')->insert([
            'id_gejala' => 18,
            'id_gangguan' => 3,
            'nilai_keyakinan' => 0.50
        ]);
    }
}
