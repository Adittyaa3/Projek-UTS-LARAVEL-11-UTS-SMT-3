@extends('Admin.main')

@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-center" style="font-family: 'Playfair Display', serif; font-weight: bold; color: #333;">
            Jenis Users
        </h2>
        <button class="btn btn-success" id="tambahJenisUserBtn" style="border-radius: 25px; padding: 8px 20px;">
            Tambah Jenis User
        </button>
    </div>

    <div class="table-responsive shadow-sm rounded" style="background-color: #f8f9fa; padding: 20px;">
        <table id="jenisUsersTable" class="table table-hover display expandable-table" style="width:100%">
            <thead class="thead-light" style="background-color: #f1f1f1;">
                <tr>
                    <th scope="col" style="font-weight: 600;">ID</th>
                    <th scope="col" style="font-weight: 600;">Jenis User</th>
                    <th scope="col" style="font-weight: 600;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenisUsers as $jenisUser)
                    <tr>
                        <td>{{ $jenisUser->id }}</td>
                        <td>{{ $jenisUser->jenis_user }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm editBtn" style="border-radius: 20px; padding: 5px 15px;" data-id="{{ $jenisUser->id }}" data-jenis="{{ $jenisUser->jenis_user }}">
                                Edit
                            </button>
                            <form action="{{ route('jenis_users.destroy', $jenisUser->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 20px; padding: 5px 15px;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal for Adding/Editing Jenis User -->
<div class="modal fade" id="jenisUserModal" tabindex="-1" aria-labelledby="jenisUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jenisUserModalLabel">Tambah Jenis User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="jenisUserForm" action="{{ route('jenis_users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="jenis_user">Jenis User:</label>
                        <input type="text" name="jenis_user" id="jenis_user" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        // Open modal for adding a new Jenis User
        $('#tambahJenisUserBtn').on('click', function() {
            $('#jenisUserModalLabel').text('Tambah Jenis User');
            $('#jenis_user').val(''); // Clear the input field
            $('#jenisUserForm').attr('action', '{{ route('jenis_users.store') }}'); // Set action to store
            $('#jenisUserModal').modal('show'); // Show the modal
        });

        // Open modal for editing an existing Jenis User
        $('.editBtn').on('click', function() {
            var id = $(this).data('id');
            var jenisUser = $(this).data('jenis');
            
            $('#jenisUserModalLabel').text('Edit Jenis User');
            $('#jenis_user').val(jenisUser); // Set the input field to the existing value
            $('#jenisUserForm').attr('action', '{{ url('jenis_users') }}/' + id); // Set action to update

            // Remove existing _method field and add PUT method for update
            $('#jenisUserForm').find('input[name="_method"]').remove();
            $('#jenisUserForm').append('<input type="hidden" name="_method" value="PUT">');
            
            $('#jenisUserModal').modal('show'); // Show the modal
        });
    });
</script>

@endsection
