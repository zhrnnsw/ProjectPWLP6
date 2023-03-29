<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswa')->insert([
            'nim' => '214172016',
            'nama' => 'Zahra Annisa Wahono',
            'kelas' => 'TI - 2F',
            'jurusan' => 'Teknologi Informasi',
            'no_hp' => '081238509815',
            
        ]);
        DB::table('mahasiswa')->insert([
            'nim' => '214172015',
            'nama' => 'Syahla Syafiqah Fayra',
            'kelas' => 'TI - 2F',
            'jurusan' => 'Teknologi Informasi',
            'no_hp' => '083468765934',
            
        ]);
    }
}
