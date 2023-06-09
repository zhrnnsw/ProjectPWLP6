@extends('mahasiswa.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        </div><br>
            <form class="form-left my-2" method="get" action="{{ route('search') }}">
                    <div class="form-group w-70 mb-3">
                        <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Masukkan Nama">
                        <button type="submit" class="btn btn-primary mb-1">Cari</button>
                        <a class="btn btn-success right" href="{{ route('mahasiswa.create') }}" > Input Mahasiswa</a>
                    </div>
            </form>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>Nim</th>
        <th>Nama</th>
        <th>Foto</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th width="300px">Action</th>
    </tr>
    @foreach ($mahasiswa as $Mahasiswa)
    <tr>
        <td>{{ $Mahasiswa->nim }}</td>
        <td>{{ $Mahasiswa->nama }}</td>
        <td><img width="100px" src="{{asset('storage/'.$Mahasiswa->Foto)}}"></td>
        <td>{{ $Mahasiswa->kelas->nama_kelas }}</td>
        <td>{{ $Mahasiswa->jurusan }}</td>
        <td>
            <form action="{{ route('mahasiswa.destroy',$Mahasiswa->nim) }}" method="POST">
                <a class="btn btn-info" href="{{ route('mahasiswa.show',$Mahasiswa->nim) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$Mahasiswa->nim) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                <a class="btn btn-warning" href="{{ route('nilai',$Mahasiswa->nim) }}">Nilai</a>
               
            </form>   
        </td>
    </tr>
    @endforeach
</table>
{!! $mahasiswa->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection