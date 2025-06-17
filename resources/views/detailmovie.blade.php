{{-- @extends('layouts.template')

@section('content')
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-5 fw-bold">{{ $movie->title }}</h1>
        </div>
    </div>

    <div class="row align-items-start">
        <div class="col-md-5 mb-4">
            <img src="{{ $movie->cover_image }}" class="img-fluid rounded shadow-sm" alt="{{ $movie->title }}">
        </div>

        <div class="col-md-7">
            <p class="fs-5"><strong>Slug:</strong> {{ $movie->slug }}</p>
            <p class="fs-5"><strong>Year:</strong> {{ $movie->year }}</p>
            <p class="fs-5"><strong>Actors:</strong> {{ $movie->actors }}</p>

            <div class="mt-4">
                <h4 class="fw-semibold">Synopsis:</h4>
                <p class="fs-5 text-justify">
                    {{ $movie->synopsis }}<br><br>
                    {!! nl2br(e(Str::limit($movie->synopsis . ' ' . $movie->synopsis, 1000))) !!}
                </p>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-success mt-3">← Back</a>
            {{-- <a href="/" class="btn btn-success mt-3">← Back</a>
        </div>
    </div>
@endsection --}}



@extends('layouts.template')

@section('content')
<h1 class="mb-4 fw-bold">Detail Movie</h1>
    <div class="col-lg-12">
        <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
<<<<<<< HEAD
                <img src="{{ asset('storage/'.$movie->cover_image) }}"
                    class="img-fluid rounded-start h-100 w-100 object-fit-cover"
                    style="max-height: 100%; object-fit: cover;"
                    alt="...">

                {{-- <img src="{{ asset('storage/'.$movie->cover_image) }}"
                     class="img-fluid rounded-start h-100 w-100 object-fit-cover"
                     style="max-height: 100%; object-fit: cover;"
                     alt="{{ $movie->title }}"> --}}
=======
                <img src="{{ asset('storage/'.$movie->cover_image) }}" class="img-fluid rounded-start" alt="...">
>>>>>>> 2bfdd808c2f53f4f8940aa2f69949dacaa1ad5fc

              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title mb-4 fs-4 fw-bold">{{ $movie->title }}</h5>
<<<<<<< HEAD
                    <p class="card-text fs-6">Synopsis: <br>{{$movie->synopsis}}</p>
                    <p class="card-text fs-6">Year : {{ $movie->year }}</p>
                    <p class="card-text fs-6">Category: {{$movie->category->category_name}}</p>
                    <p class="card-text fs-6 mb-5">Actors : {{ $movie->actors }}</p>
=======
                    <p class="card-text fs-5">Synopsis: <br>{{$movie->synopsis}}</p>
                    <p class="card-text fs-5">Year : {{ $movie->year }}</p>
                    <p class="card-text fs-5">Category: {{$movie->category->category_name}}</p>
                    <p class="card-text fs-5 mb-5">Actors : {{ $movie->actors }}</p>
>>>>>>> 2bfdd808c2f53f4f8940aa2f69949dacaa1ad5fc
                  <a href="/" class="btn btn-success fs-5 fw-bold"> ← Back </a>

                </div>
              </div>
            </div>
          </div>
        </div>



@endsection
