@extends('Admin.main')

@section('content')

<div class="container">
    <h2>Edit Menu Level</h2>
    <form action="{{ route('menu_levels.update', $menuLevel->ID_level) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="level" class="form-label">Level Name</label>
            <input type="text" class="form-control" id="level" name="level" value="{{ $menuLevel->level }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
