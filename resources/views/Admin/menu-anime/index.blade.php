@extends('Admin.main')

@section('content')

<div class="container mt-5">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button id="showFormBtn" class="btn btn-success">Add Anime</button>
            </div>
            <h4 class="card-title">Anime Management</h4>
            
            <div class="table-responsive">
                <!-- Table with 'display expandable-table' class for better display -->
                <table id="animeTable" class="display expandable-table table table-hover" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Number of Episodes</th>
                            <th>Show</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($anime as $animes)
                            <tr>
                                <td>
                                    <img src="{{ asset('/storage/products/'.$animes->image) }}" class="img-thumbnail" style="height: 80px; width: 80px;">
                                </td>
                                <td>{{ $animes->title }}</td>
                                {{-- Batasi deskripsi hingga 100 karakter --}}
                                <td>{{ Str::limit($animes->description, 100) }}</td>
                                <td>{{ $animes->number_of_episodes }}</td>
                                <td>
                                    <a href="{{ route('anime.show', $animes->id) }}" class="btn btn-outline-dark btn-fw">Show</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-success btn-fw update-btn" data-url="{{ route('anime.edit', $animes->id) }}">Update</button>
                                </td>
                                <td>
                                    <form action="{{ route('anime.destroy', $animes->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-outline-danger btn-fw delete-btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No Anime Data Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal for adding new anime -->
<div class="modal fade" id="addAnimeModal" tabindex="-1" aria-labelledby="addAnimeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAnimeModalLabel">Add New Anime</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('anime.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Image Input --}}
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" style="font-family: 'Roboto', sans-serif;">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" 
                               style="border-radius: 10px; padding: 10px; border: 1px solid #ccc;">
                    
                        @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Title Input --}}
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" style="font-family: 'Roboto', sans-serif;">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               name="title" value="{{ old('title') }}" 
                               placeholder="Enter Anime Title" 
                               style="border-radius: 10px; padding: 10px; border: 1px solid #ccc;">
                    
                        @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Description Input --}}
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" style="font-family: 'Roboto', sans-serif;">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  name="description" rows="5" 
                                  placeholder="Enter Anime Description"
                                  style="border-radius: 10px; padding: 10px; border: 1px solid #ccc;">{{ old('description') }}</textarea>
                    
                        @error('description')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Number of Episodes Input --}}
                    <div class="form-group mb-4">
                        <label class="font-weight-bold" style="font-family: 'Roboto', sans-serif;">Number of Episodes</label>
                        <input type="number" class="form-control @error('number_of_episodes') is-invalid @enderror" 
                               name="number_of_episodes" value="{{ old('number_of_episodes') }}" 
                               placeholder="Enter Number of Episodes"
                               style="border-radius: 10px; padding: 10px; border: 1px solid #ccc;">
                        
                        @error('number_of_episodes')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary" 
                                style="background-color: #5a67d8; border-radius: 50px; padding: 10px 30px; border: none; font-family: 'Roboto', sans-serif;">
                            Save
                        </button>
                        <button type="reset" class="btn btn-warning" 
                                style="border-radius: 50px; padding: 10px 30px; border: none; background-color: #ffcc00; color: white; font-family: 'Roboto', sans-serif;">
                            Reset
                        </button>
                    </div>

                </form> 
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>

{{-- Include jQuery and SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    // Show modal when 'Add Anime' button is clicked
    $('#showFormBtn').click(function() {
        $('#addAnimeModal').modal('show');
    });

    // SweetAlert2 for Delete Confirmation
    $('.delete-btn').click(function(e) {
        e.preventDefault();
        const form = $(this).closest('form');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Submit form if confirmed
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                );
            }
        });
    });

    // SweetAlert2 for Update Confirmation
    $('.update-btn').click(function(e) {
        e.preventDefault();
        const url = $(this).data('url');
        Swal.fire({
            title: 'Edit Anime?',
            text: "You are about to edit the details of this anime.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, edit it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url; // Redirect to edit page if confirmed
            }
        });
    });
});
</script>

@endsection
