
@extends('Admin.main')

@section('content')
<h2>Edit Jenis User</h2>
<form action="{{ route('jenis_users.update', $jenisUser->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="jenis_user">Jenis User:</label>
        <input type="text" name="jenis_user" class="form-control" value="{{ $jenisUser->jenis_user }}" required>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>

@endsection
