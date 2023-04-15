<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class MahasiswaMataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'mahasiswa_nim' => '214172016',
                'matakuliah_id' => 1,
                'nilai' => 'A'
            ],
            [
                'mahasiswa_nim' => '214172016',
                'matakuliah_id' => 2,
                'nilai' => 'A'
            ],
            [
                'mahasiswa_nim' => '214172016',
                'matakuliah_id' => 3,
                'nilai' => 'A'
            ],
            [
                'mahasiswa_nim' => '214172016',
                'matakuliah_id' => 4,
                'nilai' => 'A'
            ],
        ];
        DB::table('mahasiswa-matakuliah')->insert($data);
    }
}
