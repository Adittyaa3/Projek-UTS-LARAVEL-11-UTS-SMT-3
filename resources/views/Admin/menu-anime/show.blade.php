@extends('Admin.main')

@section('content')

  <div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <img src="{{ asset('/storage/products/'.$anime->image) }}" class="rounded" style="width: 100%">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h3>{{ $anime->title }}</h3>
                    <hr/>
                    {{-- <p>{{  number_format($anime->price,2,',','.') }}</p> --}}
                    <code>
                        {!! $anime->description !!}
                    </code>
                    <hr/>
                    <p>number of eps {{ $anime->number_of_episodes }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>  

@endsection
