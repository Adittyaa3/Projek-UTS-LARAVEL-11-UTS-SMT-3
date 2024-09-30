@extends('Admin.main')

@section('content')

<h1>Edit Menu</h1>

    <form action="{{ route('menus.update', $menus->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="menu_name">Menu Name:</label>
        <input type="text" name="menu_name" id="menu_name" value="{{ $menus->menu_name }}" required>

        <label for="menu_link">Menu Link:</label>
        <input type="text" name="menu_link" id="menu_link" value="{{ $menus->menu_link }}" required>

        <label for="menu_icon">Menu Icon:</label>
        <input type="text" name="menu_icon" id="menu_icon" value="{{ $menus->menu_icon }}" required>

        <button type="submit">Update</button>
    </form>

    
@endsection
