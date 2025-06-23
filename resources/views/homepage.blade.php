@extends('layouts.template')
@section('content')

<h1 class="mb-4 fw-bold">Latest Movies</h1>

{{-- Form Search --}}
<div class="d-flex justify-content-end mb-4">
    <form method="GET" action="{{ url('/') }}" class="d-flex w-25" role="search">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari film atau aktor..."
            value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Search</button>
    </form>
</div>


{{-- Flash Message --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    {{-- Looping data --}}
    @forelse ($movies as $movie)
        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/'.$movie->cover_image) }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title mb-3 fs-5 fw-bold">{{ $movie->title }}</h5>
                            <p class="card-text">{{ Str::words($movie->synopsis, 20, '...') }}</p>
                            <a href="/movie/{{ $movie->id }}/{{ $movie->slug }}" class="btn btn-success fs-6 fw-semibold">
                                Read more
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <p class="text-muted">Film tidak ditemukan.</p>
        </div>
    @endforelse

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $movies->withQueryString()->links() }}
    </div>
</div>

@endsection
