@extends('Admin.main')

@section('content')
  
  
      <div class="container mt-5 mb-5">
          <div class="row">
              <div class="col-md-12">
                  <div class="card border-0 shadow-sm rounded">
                      <div class="card-body">
                          <!-- Update Anime -->
                          <form action="update" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="number" value="{{$anime->id }}" name="id" hidden>
  
                              <!-- IMAGE Field -->
                              <div class="form-group mb-3">
                                  <label class="font-weight-bold">IMAGE</label>
                                  <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                              
                                  <!-- error message untuk image -->
                                  @error('image')
                                      <div class="alert alert-danger mt-2">
                                          {{ $message }}
                                      </div>
                                  @enderror
  
                                  <!-- Tampilkan gambar yang ada saat ini -->
                                  <div class="mt-2">
                                      <img src="{{ asset('storage/products/' . $anime->image) }}" alt="Current Image" style="width: 150px;">
                                  </div>
                              </div>
  
                              <!-- TITLE Field -->
                              <div class="form-group mb-3">
                                  <label class="font-weight-bold">TITLE</label>
                                  <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $anime->title) }}" placeholder="Masukkan Judul Anime">
                              
                                  <!-- error message untuk title -->
                                  @error('title')
                                      <div class="alert alert-danger mt-2">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                                       <div class="form-group mb-3">
                                  <label class="font-weight-bold">TITLE</label>
                                  <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('title', $anime->description) }}" placeholder="Masukkan deskripsi">
                              
                                  <!-- error message untuk title -->
                                  @error('description')
                                      <div class="alert alert-danger mt-2">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
  
                              <!-- NUMBER OF EPISODES Field -->
                              <div class="form-group mb-3">
                                  <label class="font-weight-bold">NUMBER OF EPISODES</label>
                                  <input type="number" class="form-control @error('number_of_episodes') is-invalid @enderror" name="number_of_episodes" value="{{ old('number_of_episodes', $anime->number_of_episodes) }}" placeholder="Masukkan Jumlah Episode Anime">
                                  
                                  <!-- error message untuk number_of_episodes -->
                                  @error('number_of_episodes')
                                      <div class="alert alert-danger mt-2">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
  
                              <!-- Submit and Reset Buttons -->
                              <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                              <button type="reset" class="btn btn-md btn-warning">RESET</button>
  
                          </form> 
                      </div>
                  </div>
              </div>
          </div>
      </div>
  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


 

             
@endsection
