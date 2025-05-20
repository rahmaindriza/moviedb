@extends('layouts.main')
@section('title','Daftar Kategori')
@section('navCategory','active')
@section('content')

<h1>Daftar Kategori</h1>

<!-- Menampilkan pesan sukses -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
        <tr>
            <td>{{ $categories->firstItem() + $loop->index }}</td>
            <td>{{ $category->category_name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <div style="display: flex; gap: 5px;">
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">Tidak ada kategori.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- Navigasi pagination -->
<div class="d-flex justify-content-center">
    {{ $categories->links() }}
</div>

@endsection
