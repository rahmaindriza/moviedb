@extends('layouts.main')
@section('title','Daftar Movie')
@section('navMovie','active')
@section('content')

<h1>Daftar Movie</h1>

<!-- Menampilkan pesan sukses -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('movie.create') }}" class="btn btn-primary mb-3">Tambah Movie</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Slug</th>
            <th>Category</th>
            <th>Year</th>
            <th>Actors</th>
            <th>Sinopsis</th>
            <th>Cover</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($movies as $movie)
        <tr>
            <td>{{ $movies->firstItem() + $loop->index }}</td>
            <td>{{ $movie->title }}</td>
            <td>{{ $movie->slug }}</td>
            <td>{{ $movie->category->category_name ?? '-' }}</td>
            <td>{{ $movie->year }}</td>
            <td>{{ $movie->actors }}</td>
            <td>{{ \Illuminate\Support\Str::limit($movie->synopsis, 50) }}</td>
           <td>
            @if($movie->cover_image)
                <img src="{{ $movie->cover_image }}" alt="cover" width="50">
            @else
                -
            @endif
        </td>
            <td>
                <div style="display: flex; gap: 5px;">
                    <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus movie ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9" class="text-center">Tidak ada movie.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- Navigasi pagination -->
<div class="d-flex justify-content-center">
    {{ $movies->links() }}
</div>

@endsection
