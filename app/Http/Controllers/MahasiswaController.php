<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\MahasiswaMataKuliah;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $mahasiswa = Mahasiswa::paginate(5); // Mengambil semua isi tabel
        $posts = Mahasiswa::orderBy('nim', 'desc')->paginate(6);
        return view('mahasiswa.index', compact('mahasiswa'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswa.create',['kelas'=>$kelas]);
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required', //required berarti di update
            'no_hp' => 'required',
            'email' => 'required',
            'tanggal_lahir' => 'required'
        ]);
            //fungsi eloquent untuk menambah data
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim=$request->get('nim');
        $mahasiswa->nama=$request->get('nama');
        $mahasiswa->jurusan=$request->get('jurusan');
        $mahasiswa->no_hp=$request->get('no_hp');
        $mahasiswa->email=$request->get('email');
        $mahasiswa->tanggal_lahir=$request->get('tanggal_lahir');

            //fungsi untuk menambah data dengan relasi belong to
        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    public function show($nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = Mahasiswa::find($nim);
        $kelas = Kelas::all();
        return view('mahasiswa.detail',['kelas'=>$kelas], compact('Mahasiswa'));
        
    }

    public function edit(Request $request,$nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = Mahasiswa::find($nim);
        $kelas = Kelas::all();
        return view('mahasiswa.edit',['kelas'=>$kelas], compact('Mahasiswa'));
    }

    public function update(Request $request, $nim)
    {
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'tanggal_lahir' => 'required'
        ]);
            //fungsi eloquent untuk mengupdate data inputan kita
        $mahasiswa = Mahasiswa::with('kelas')->where('nim',$nim)->first();
        $mahasiswa->nim=$request->get('nim');
        $mahasiswa->nama=$request->get('nama');
        $mahasiswa->jurusan=$request->get('jurusan');
        $mahasiswa->no_hp=$request->get('no_hp');
        $mahasiswa->email=$request->get('email');
        $mahasiswa->tanggal_lahir=$request->get('tanggal_lahir');

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');
            //fungsi untuk menambah data dengan relasi belong to
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();
            //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    public function destroy($nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::find($nim)->delete();
        return redirect()->route('mahasiswa.index')-> with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $mahasiswa = Mahasiswa::where('nama', 'like', "%" . $keyword . "%")->paginate(5);
        return view('mahasiswa.index', compact('mahasiswa'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function nilai($nim)
    {
        //$Mahasiswa = Mahasiswa::find($nim);
        $Mahasiswa = Mahasiswa::find($nim);
        $MataKuliah = MataKuliah::all();
        //$MataKuliah = $Mahasiswa->MataKuliah()->get();
        $MahasiswaMataKuliah = MahasiswaMataKuliah::where('mahasiswa_nim','=',$nim)->get();
        return view('mahasiswa.nilai',['Mahasiswa' => $Mahasiswa],['MahasiswaMataKuliah' => $MahasiswaMataKuliah],['MataKuliah' => $MataKuliah], compact('MahasiswaMataKuliah'));
        
    }
    
}