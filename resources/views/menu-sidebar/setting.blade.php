@extends('Admin.main')

@section('content')
<div class="container">
    <h2>Pengaturan Role dan Menu</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


        <div class="form-group">
            <label for="roles">Jenis User</label>
            <select id="roles" name="id_jenis_user" class="form-control" required>
                <option value="">Pilih Jenis User</option>
                @foreach($jenisUsers as $jenisUser)
                    <option value="{{ $jenisUser->id_jenis_user }}">{{ $jenisUser->jenis_user }}</option>
                @endforeach
            </select>
        </div>

        <h3>Menu yang Tersedia</h3>
        @foreach($menus as $menu)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="menu_{{ $menu->menu_id }}" name="select[]" value="{{ $menu->menu_id }}">
                <label class="form-check-label" for="menu_{{ $menu->menu_id }}">{{ $menu->menu_name }}</label>
            </div>
        @endforeach

        <button type="button" onclick="deleteSelected()" class="btn btn-primary mt-3">Simpan Pengaturan</button>
    
</div>

<script>
    function deleteSelected() {
          var checkboxes = document.getElementsByName('select[]');
          var Role = document.querySelector('#roles');
          var selectedItems = [];
  
          for (var i = 0; i < checkboxes.length; i++) {
              if (checkboxes[i].checked) {
                  selectedItems.push(checkboxes[i].value);
              }
          }
          var csrfToken = $('meta[name="csrf-token"]').attr('content');
          $.ajax({
                  type: "POST",
                  url: "/select-sessions",
                  data: {
                    _token: csrfToken,
                    items: selectedItems,
                    role: Role.value
                  },
                  success: function(response) {
                      console.log(response);
                      window.location.reload();
                  },
                  error: function(xhr, status, error) {
                      console.error(xhr.responseText);
                  }
              });
        }
</script>

    
@endsection
