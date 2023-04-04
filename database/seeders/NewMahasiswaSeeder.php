<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewMahasiswaSeeder extends Seeder
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
                'nim' => 2141720047,
                'nama' => 'Yasmine Navisha Andhani',
                'kelas' => 'TI - 2F',
                'jurusan' => 'Teknologi Informasi',
                'no_hp' => '081233672068',
                'email' => '2141720047@student.polinema.ac.id',
                'tanggal_lahir' => '01 Juni 2003'
            ],
            [
                'nim' => 2141720241,
                'nama' => 'Yuliyana Rahmawati',
                'kelas' => 'TI - 2F',
                'jurusan' => 'Teknologi Informasi',
                'no_hp' => '081238509815',
                'email' => '2141720241@student.polinema.ac.id',
                'tanggal_lahir' => '20 Juli 2002'
            ],
            [
                'nim' => 2141720056,
                'nama' => 'Davino Dinendra',
                'kelas' => 'TI - 2F',
                'jurusan' => 'Teknologi Informasi',
                'no_hp' => '082112343467',
                'email' => '2141720056@student.polinema.ac.id',
                'tanggal_lahir' => '23 Maret 2003'
            ],
            [
                'nim' => 2141720250,
                'nama' => 'Rr. Denti Nurramadhona',
                'kelas' => 'TI - 2F',
                'jurusan' => 'Teknologi Informasi',
                'no_hp' => '081238507654',
                'email' => '2141720250@student.polinema.ac.id',
                'tanggal_lahir' => '9 November 2002'
            ],
            [
                'nim' => 2141720004,
                'nama' => 'Angela Viani',
                'kelas' => 'TI - 2F',
                'jurusan' => 'Teknologi Informasi',
                'no_hp' => '082112341234',
                'email' => '2141720004@student.polinema.ac.id',
                'tanggal_lahir' => '8 November 2001'
            ],
            [
                'nim' => 2141720009,
                'nama' => 'Alhena Anastasha',
                'kelas' => 'TI - 2F',
                'jurusan' => 'Teknologi Informasi',
                'no_hp' => '081342392431',
                'email' => '2141720009@student.polinema.ac.id',
                'tanggal_lahir' => '11 Mei 2001'
            ],
        ];
        DB::table('mahasiswa')->insert($data);
    }
}
