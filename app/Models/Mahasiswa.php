<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model; //Model Eloquent

class Mahasiswa extends Model
{
    protected $table = "mahasiswa"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswa
    public $timestamps = false;
    protected $primaryKey = 'nim'; // Memanggil isi DB Dengan primarykey
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nim',
        'nama',
        'Foto',
        'kelas',
        'jurusan',
        'no_hp',
        'email',
        'tanggal_lahir'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function matakuliah()
    {
        return $this->belongsToMany(MataKuliah::class,'Mahasiswa-MataKuliah', 'mahasiswa_nim','matakuliah_id');
    }
}