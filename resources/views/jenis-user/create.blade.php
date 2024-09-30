@extends('Admin.main')

@section('content')
<div style="margin-top:30px">
    <form action="{{ route('jenis_users.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="jenis_user">Jenis User:</label>
        <input type="text" name="jenis_user" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>

</div>



@endsection
