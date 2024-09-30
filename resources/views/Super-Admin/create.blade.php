@extends('Admin.main')

@section('content')

<div class="container" style="margin-top: 50px;">
    <div class="card shadow-lg border-0" style="max-width: 100%; border-radius: 10px;">
        <div class="card-body">
            <h2 class="card-title text-center mb-4" style="font-family: 'Playfair Display', serif; font-weight: bold; color: #4f46e5;">
                Input Data User Baru
            </h2>
            
            <!-- Form for Input New User Data -->
            <form class="forms-sample" action="{{ route('user.store') }}" method="POST">
                @csrf
                
                <!-- Name Input -->
                <div class="form-group row mb-4">
                    <label for="name" class="col-sm-3 col-form-label" style="font-weight: 600;">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control border-0 shadow-sm" id="name" name="name" placeholder="Enter Name" value="{{ old('name') }}" style="border-radius: 10px;">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Email Input -->
                <div class="form-group row mb-4">
                    <label for="email" class="col-sm-3 col-form-label" style="font-weight: 600;">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control border-0 shadow-sm" id="email" name="email" placeholder="Enter Email" value="{{ old('email') }}" style="border-radius: 10px;">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Jenis User Dropdown -->
                <div class="form-group row mb-4">
                    <label for="ID_jenis_user" class="col-sm-3 col-form-label" style="font-weight: 600;">Jenis User</label>
                    <div class="col-sm-9">
                        <select class="form-select border-0 shadow-sm" id="ID_jenis_user" name="ID_jenis_user" required style="border-radius: 10px;">
                            <option value="">Pilih Jenis User</option>
                            @foreach($jenis_users as $jenis_user)
                                <option value="{{ $jenis_user->id }}">{{ $jenis_user->jenis_user }}</option>
                            @endforeach
                        </select>
                        @error('ID_jenis_user')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Password Input -->
                <div class="form-group row mb-4">
                    <label for="password" class="col-sm-3 col-form-label" style="font-weight: 600;">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control border-0 shadow-sm" id="password" name="password" placeholder="Enter Password" value="{{ old('password') }}" style="border-radius: 10px;">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Buttons -->
                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3 d-flex justify-content-start">
                        <button type="submit" class="btn btn-primary me-2" style="border-radius: 50px; padding: 10px 30px;">Submit</button>
                        <button type="reset" class="btn btn-light" style="border-radius: 50px; padding: 10px 30px;">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
t