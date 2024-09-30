@extends('Admin.main')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="card">
        <div class="card-body">
            <p class="card-title" style="text-align: center">Input Data User Baru</p>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-success" id="tambahJenisUserBtn" style="border-radius: 25px; padding: 8px 20px; margin-botton:50px" data-bs-toggle="modal" data-bs-target="#userModal">
                        Tambah Jenis User
                    </button>
                    <!-- Tabel responsive dengan ID 'example' dan expandable-table -->
                    <div class="table-responsive" style="margin-top: 30px">
                        <table id="example" class="display expandable-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Password</th>
                                    <th>Status</th>
                                    <th>Updated at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $users)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $users->name }}</td>
                                    <td>{{ $users->email }}</td>
                                    <td>{{ $users->getRoleNames()->implode(', ') }}</td>
                                    <td>{{ $users->password }}</td>
                                    <td>{{ $users->status }}</td>
                                    <td>{{ $users->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('user.edit', $users->id) }}" class="btn btn-outline-success btn-fw">Update</a>
                                        <a href="{{ url('deleteuser', $users->id) }}" class="btn btn-outline-danger btn-fw">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal for Input New User Data -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Input Data User Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="{{ route('user.store') }}" method="POST">
                    @csrf

                    <!-- Name Input -->
                    <div class="form-group mb-4">
                        <label for="name" class="form-label" style="font-weight: 600;">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ old('name') }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Email Input -->
                    <div class="form-group mb-4">
                        <label for="email" class="form-label" style="font-weight: 600;">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ old('email') }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Jenis User Dropdown -->
                    <div class="form-group mb-4">
                        <label for="ID_jenis_user" class="form-label" style="font-weight: 600;">Jenis User</label>
                        <select class="form-select" id="ID_jenis_user" name="ID_jenis_user" required>
                            <option value="">Pilih Jenis User</option>
                            @foreach($jenis_users as $jenis_user)
                                <option value="{{ $jenis_user->id }}">{{ $jenis_user->jenis_user }}</option>
                            @endforeach
                        </select>
                        @error('ID_jenis_user')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="form-group mb-4">
                        <label for="password" class="form-label" style="font-weight: 600;">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
@endsection
