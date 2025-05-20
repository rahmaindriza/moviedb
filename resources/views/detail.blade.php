{{-- @extends('layouts.template')

@section('content')
<div class="card mb-4">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ $movie->cover_image }}" class="img-fluid rounded-start" alt="{{ $movie->title }}">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h3 class="card-title">{{ $movie->title }}</h3>

                <p><strong>Slug:</strong> {{ $movie->slug }}</p>

                <p><strong>Synopsis:</strong><br>{{ $movie->synopsis }}</p>

                <p><strong>Year:</strong> {{ $movie->year }}</p>

                <p><strong>Actors:</strong> {{ $movie->actors }}</p>

                <p><strong>Category:</strong>
                    {{ $movie->category ? $movie->category->name : 'N/A' }}
                </p>

                <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Back to Home</a>
            </div>
        </div>
    </div>
</div>
@endsection --}}
