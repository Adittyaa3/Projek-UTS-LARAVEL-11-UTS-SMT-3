@extends('Admin.main')

@section('content')

<div class="container">
    <h2>Create Menu Level</h2>
    <form action="{{ route('menu_levels.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="level" class="form-label">Level Name</label>
            <input type="text" class="form-control" id="level" name="level" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
