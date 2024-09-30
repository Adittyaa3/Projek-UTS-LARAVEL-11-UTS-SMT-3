@extends('Admin.main')

@section('content')
<div class="container" style="margin-top: 100px; overflow-x: auto;">
    <div class="card" style="max-width: 100%;">
        <div class="card-body">
            <h1 class="card-title text-center">Update Data User</h1>
            
            <!-- Form untuk Update Data User -->
            <form class="forms-sample" action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Menggunakan PUT method untuk update -->

                <!-- Hidden input for user ID -->
                <input type="hidden" value="{{ $user->id }}" name="id">

                <!-- Input untuk nama user -->
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Input untuk email user -->
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="{{ old('email', $user->email) }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Dropdown untuk memilih jenis user -->
                <div class="form-group row">
                    <label for="ID_jenis_user" class="col-sm-3 col-form-label">Jenis User</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="ID_jenis_user" name="ID_jenis_user" required>
                            <option value="">Pilih Jenis User</option>
                            @foreach($jenis_users as $jenis_user)
                                <option value="{{ $jenis_user->id }}" {{ $user->ID_jenis_user == $jenis_user->id ? 'selected' : '' }}>
                                    {{ $jenis_user->jenis_user }}
                                </option>
                            @endforeach
                        </select>
                        @error('ID_jenis_user')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Input untuk password (opsional) -->
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Baru (Opsional)">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti password.</small>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Tombol Submit dan Reset -->
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
@endsection
