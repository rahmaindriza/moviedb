@extends('layouts.main')
@section('title','Edit Kategori')
@section('navCategory','active')
@section('content')
<div class="row">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-12">
            <h1 class="h2">Edit Data Kategori</h1>

            <form action="{{ route('category.update', $category->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="category_name" class="col-sm-2 col-form-label">Nama Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="category_name" value="{{ old('category_name', $category->category_name) }}">
                        @error('category_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="6">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
