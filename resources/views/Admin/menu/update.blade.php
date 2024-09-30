@extends('Admin.main')

@section('content')
<div class="container" style="margin-top: 100px; overflow-x: auto;"> <!-- Menambahkan overflow-x -->
    <div class="card" style="max-width: 100%;"> <!-- Set max-width untuk mencegah overflow -->
        <div class="card-body">
            <h1 class="card-title" style="text-align: center">Input Data Mahasiswa Baru</h1>
            <!-- Form untuk Input Data Mahasiswa Baru -->
            <form class="forms-sample" action="{{ url('update/{id}',$mahasiswa->mahasiswas_id) }}" method="POST">
                @csrf   
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Mahasiswa" value="{{ old('nama') }}">
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nim" class="col-sm-3 col-form-label">NIM Mahasiswa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM Mahasiswa" value="{{ old('nim') }}">
                        @error('nim')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="angkatan" class="col-sm-3 col-form-label">Angkatan Mahasiswa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="angkatan" name="angkatan" placeholder="Masukkan Angkatan Mahasiswa" value="{{ old('angkatan') }}">
                        @error('angkatan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="nomor_hp" class="col-sm-3 col-form-label">Nomor HP Mahasiswa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Masukkan Nomor HP Mahasiswa" value="{{ old('nomor_hp') }}">
                        @error('nomor_hp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button type="reset" class="btn btn-light">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</table>
@endsection
