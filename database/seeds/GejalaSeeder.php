<?php

use App\Models\Gejala;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('gejala')->insert([
            'id' => 1,
            'gejala' => 'Tidak makan atau makan dengan jumlah yang sangat sedikit'
        ]);



        DB::table('gejala')->insert([
            'id' => 2,
            'gejala' => 'Makan berlebihan pada periode tertentu misalnya selama 2 jam'
        ]);



        DB::table('gejala')->insert([
            'id' => 3,
            'gejala' => 'Makan berlebihan sepanjang hari'
        ]);



        DB::table('gejala')->insert([
            'id' => 4,
            'gejala' => 'Memiliki rasa takut yang intens terhadap kenaikan berat badan atau menjadi gemuk'
        ]);



        DB::table('gejala')->insert([
            'id' => 5,
            'gejala' => 'Sangat terobsesi dengan bentuk tubuh dan berat badan'
        ]);



        DB::table('gejala')->insert([
            'id' => 6,
            'gejala' => 'Memiliki badan kurus'
        ]);



        DB::table('gejala')->insert([
            'id' => 7,
            'gejala' => 'Memiliki badan normal (tidak kurus dan tidak gemuk)'
        ]);



        DB::table('gejala')->insert([
            'id' => 8,
            'gejala' => 'Memiliki badan gemuk'
        ]);



        DB::table('gejala')->insert([
            'id' => 9,
            'gejala' => 'Berat badan turun drastis'
        ]);



        DB::table('gejala')->insert([
            'id' => 10,
            'gejala' => 'Memuntahkan makanan dengan sengaja'
        ]);



        DB::table('gejala')->insert([
            'id' => 11,
            'gejala' => 'Mengkonsumsi berbagai macam obat diet atau obat yang mengstimulasi buang air kecil atau buang air besar'
        ]);



        DB::table('gejala')->insert([
            'id' => 12,
            'gejala' => 'Olahraga berlebihan'
        ]);



        DB::table('gejala')->insert([
            'id' => 13,
            'gejala' => 'Merasa khawatir atau malu makan di tempat umum'
        ]);



        DB::table('gejala')->insert([
            'id' => 14,
            'gejala' => 'Sulit untuk menahan diri dari makan atau berhenti makan begitu sudah mulai'
        ]);



        DB::table('gejala')->insert([
            'id' => 15,
            'gejala' => 'Makan lebih cepat dari biasanya'
        ]);



        DB::table('gejala')->insert([
            'id' => 16,
            'gejala' => 'Menstruasi tidak teratur atau mengalami Amenore'
        ]);



        DB::table('gejala')->insert([
            'id' => 17,
            'gejala' => 'Hasrat seksual menurun'
        ]);



        DB::table('gejala')->insert([
            'id' => 18,
            'gejala' => 'Merasa jijik dengan diri sendiri, depresi, atau sangat bersalah ketika sesudah makan'
        ]);
    }
}
