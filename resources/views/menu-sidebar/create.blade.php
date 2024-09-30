@extends('Admin.main')
@section('content')
<div class="container" style="margin-top: 100px">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-lg rounded-lg">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4" style="font-family: 'Playfair Display', serif; font-weight: bold; color: #333;">
                            Add New Menu
                        </h2>
                        <form action="{{ url('/menus/store/create') }}" method="POST" style="margin-top: 100px">
                            @csrf
                            <div class="form-group">
                                <label for="menu_name">Menu Name:</label>
                                <input type="text" name="menu_name" id="menu_name" class="form-control" placeholder="Menu Name" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="menu_link">Menu Link:</label>
                                <input type="text" name="menu_link" id="menu_link" class="form-control" placeholder="Menu Link" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="menu_icon">Menu Icon:</label>
                                <input type="text" name="menu_icon" id="menu_icon" class="form-control" placeholder="Menu Icon" required>
                            </div>
                        
                            {{-- <div class="form-group">
                                <label for="ID_level">Menu Level:</label>
                                <select name="ID_level" id="ID_level" class="form-control">
                                    <option value="">No Level</option>
                                    @foreach($menuLevels as $level)
                                        <option value="{{ $level->ID_level }}">{{ $level->level }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                        
                        
                        
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <button type="reset" class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</div>         

@endsection
