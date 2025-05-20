@extends('layouts.main')

@section('title', 'Home | Akademik Film')

@section('navHome', 'active') {{-- Ini bikin navbar Home aktif --}}

@section('content')
<div class="text-center mt-5 pt-4">
    <h1 class="display-4">Selamat Datang di Website Movie</h1>
    <p class="lead">Jelajahi berbagai kategori film favorit Anda dengan mudah dan cepat.</p>

    <img src="{{ asset('images/bioskop.png') }}" alt="Gambar Bioskop" class="img-fluid my-4" style="max-height: 400px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">

    <p class="text-muted">Nikmati pengalaman menonton dari berbagai genre seperti Action, Drama, dan lainnya.</p>
</div>
@endsection
