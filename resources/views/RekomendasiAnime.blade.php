@extends('Admin.main')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4" 
        style="font-family: 'Playfair Display', serif; font-weight: bold; color: #fff; 
               background: linear-gradient(135deg, #4f46e5, #3b82f6); padding: 15px; 
               border-radius: 8px;">
        Anime Collection
    </h2>

    <div class="row">
        @forelse ($anime as $animes)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card border-0 shadow-lg rounded-lg" style="background-color: #f8f9fa;">
                    {{-- Display anime image --}}
                    <img src="{{ asset('/storage/products/'.$animes->image) }}" 
                         class="card-img-top rounded-top" 
                         alt="{{ $animes->title }}" 
                         style="height: 300px; width: 100%; object-fit: cover; border-radius: 15px 15px 0 0;">
                    <div class="card-body text-center">
                        {{-- Dominating anime title --}}
                        <h4 class="card-title" style="font-family: 'Playfair Display', serif; font-weight: bold; color: #333; font-size: 1.5rem;">
                            {{ $animes->title }}
                        </h4>

                        {{-- Show Details button only --}}
                        <a href="{{ route('anime.show', $animes->id) }}" class="btn btn-primary mt-3" 
                           style="background-color: #4f46e5; border-radius: 50px; padding: 8px 16px; border: none;">
                            Show Details
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted" style="font-family: 'Playfair Display', serif; font-size: 18px;">No Anime Data Available</p>
            </div>
        @endforelse
    </div>
</div>

@endsection
