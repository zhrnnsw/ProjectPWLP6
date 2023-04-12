<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MataKuliahSeeder extends Seeder
{
    public function run()
    {
        $matkul = [
            [
                'nama_matkul' => 'Pemograman Berbasis Objek',
                'sks'=>3,
                'jam'=>6,
                'semester'=>4,
            ],
            [
                'nama_matkul' => 'Pemograman Web Lanjut',
                'sks'=>3,
                'jam'=>6,
                'semester'=>4,
            ],
            [
                'nama_matkul' => 'Basis Data Lanjut',
                'sks'=>3,
                'jam'=>4,
                'semester'=>4,
            ],
            [
                'nama_matkul' => 'Praktikum Basis Data Lanjut',
                'sks'=>3,
                'jam'=>6,
                'semester'=>4,
            ]
        ];

        DB::table('matakuliah')->insert($matkul);
    }
}
