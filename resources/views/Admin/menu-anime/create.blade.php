@extends('Admin.main')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-lg rounded-lg">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4" style="font-family: 'Playfair Display', serif; font-weight: bold; color: #333;">
                            Add New Anime
                        </h2>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</div>         

@endsection
