@extends('Admin.main')

@section('content')

<div class="table-responsive shadow-sm rounded" style="background-color: #f8f9fa; padding: 20px;">
    <h2>Menu Levels</h2>
    <a href="{{ route('menu_levels.create') }}" class="btn btn-primary" style="margin-bottom: 30px">Create New Level</a>
    <table id="menuLevelsTable" class="table table-hover display expandable-table" style="width:100%">
        <thead class="thead-light" style="background-color: #f1f1f1;">
            <tr>
                <th scope="col" style="font-weight: 600;">ID</th>
                <th scope="col" style="font-weight: 600;">Level</th>
                <th scope="col" style="font-weight: 600;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menuLevels as $level)
                <tr>
                    <td>{{ $level->ID_level }}</td>
                    <td>{{ $level->level }}</td>
                    <td>
                        <a href="{{ route('menu_levels.edit', $level->ID_level) }}" class="btn btn-warning btn-sm" style="border-radius: 20px; padding: 5px 15px;">
                            Edit
                        </a>
                        <form action="{{ route('menu_levels.destroy', $level->ID_level) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 20px; padding: 5px 15px;">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection