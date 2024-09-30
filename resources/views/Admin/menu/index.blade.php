@extends('Admin.main')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title" style="text-align: center">Input Data Mahasiswa Baru</h1>
            <!-- Form untuk Input Buku Baru -->
            <!-- Tabel dengan overflow-x: auto untuk menangani konten yang meluap -->
<div class="table-responsive">
    <table class="table mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Angkatan</th>
                <th>Nomor HP</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $mahasiswas)
            <tr>
                <td>{{ $loop->iteration }}</td> <!-- Menampilkan indeks loop -->
                <td>{{ $mahasiswas->nama }}</td>
                <td>{{ $mahasiswas->nim }}</td>
                <td>{{ $mahasiswas->angkatan }}</td>
                <td>{{ $mahasiswas->nomor_hp }}</td>
                <td> <a href="{{ url('edit/' .$mahasiswas->mahasiswa_id) }}"><button type="button" class="btn btn-outline-success btn-fw">Update</button></a></td>
                <td> <a href="{{ url('/delete'.$mahasiswas->mahasiswa_id) }}"><button type="button" class="btn btn-outline-danger btn-fw">Delete</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>         
@endsection
