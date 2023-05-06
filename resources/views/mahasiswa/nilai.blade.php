@extends('mahasiswa.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div style="text-align: center">
            <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            <h3 style="margin-top: 20px; ">Kartu Hasil Studi (KHS)</h3>
        </div>
        <div class="card" style="width: 100rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Nama: </b>{{$Mahasiswa->nama}}</li>
                <li class="list-group-item"><b>Nim: </b>{{$Mahasiswa->nim}}</li>
                <li class="list-group-item"><b>Kelas: </b>{{$Mahasiswa->kelas->nama_kelas}}</li>
                <li class="list-group-item"><b>Jurusan: </b>{{$Mahasiswa->jurusan}}</li>
            </ul>
            <div class="col-lg-12 margin-tb">
                <table class="table table-bordered">
                    <tr>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Nilai</th>
                    </tr>
                    @foreach ($MahasiswaMataKuliah as $MahasiswaMataKuliah)
                    <tr>
                        <td>{{$MahasiswaMataKuliah->matakuliah->nama_matkul}}</td>
                        <td>{{$MahasiswaMataKuliah->matakuliah->sks}}</td>
                        <td>{{$MahasiswaMataKuliah->matakuliah->semester}}</td>
                        <td>{{$MahasiswaMataKuliah->nilai}}</td>
                    @endforeach
                    </tr>
                </table>
            </div>
        </div>
        <center><a class="btn btn-success btn-lg" href="{{ route('cetak_pdf',$Mahasiswa->nim) }}" style="margin-top: 20px">Cetak ke PDF</a></center>
    </div>
    @endsection