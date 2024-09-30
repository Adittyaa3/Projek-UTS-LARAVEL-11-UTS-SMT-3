@extends('Admin.main')

@section('content')
<div class="card">
    <div class="card-body">
<div class="col-md-6" style="margin: ">
<div class="card-body" style="margin-top: 50px; ">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('menus.create') }}" class="btn btn-success">Tambah Menu</a>
    </div>
    <h4 class="card-title">Menu Management</h4>

    <div class="table-responsive">
        <!-- Table with 'display expandable-table' class for better display -->
        <table id="menuTable" class="display expandable-table table table-hover" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>Menu Name</th>
                    <th>Menu Link</th>
                    <th>Menu Icon</th>
                    {{-- <th>Level</th> --}}
                    <th>Show</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->menu_name }}</td>
                    <td>{{ $menu->menu_link }}</td>
                    <td><i class="{{ $menu->menu_icon }} menu-icon"></i></td>
                    {{-- <td>{{ $menu->menuLevel->level ?? 'No Level' }}</td> --}}
                    <td>
                        <a href="" class="btn btn-outline-dark btn-fw">Show</a>
                    </td>
                    <td>
                        <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-outline-success btn-fw">Update</a>
                    </td>
                    <td>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-fw">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


      
    <!-- Jenis User Dropdown -->
    {{-- <form class="forms-sample" action="{{ url('/sidebarplus') }}" method="post">
                @csrf
    <div class="form-group row mb-4">
        <label for="ID_jenis_user" class="col-sm-3 col-form-label" style="font-weight: 600;">menu</label>
        <div class="col-sm-9">
            <select class="form-select border-0 shadow-sm" id="ID_jenis_user" name="ID_jenis_user" required style="border-radius: 10px;">
                <option value="">pilih jenis menu</option>
                @foreach($menus as $menus_user)
                    <option value="{{ $menus_user->id }}">{{ $menus_user->menu_name}}</option>
                @endforeach
            </select>
            @error('ID_jenis_user')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
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
    <div class="form-group row">
        <div class="col-sm-9 offset-sm-3 d-flex justify-content-start">
            <button type="submit" class="btn btn-primary me-2" style="border-radius: 50px; padding: 10px 30px;">Submit</button>
            <button type="reset" class="btn btn-light" style="border-radius: 50px; padding: 10px 30px;">Cancel</button>
        </div>
    </div>
</form> --}}



      
    </div>
  </div>

</div>
</div>





@endsection
