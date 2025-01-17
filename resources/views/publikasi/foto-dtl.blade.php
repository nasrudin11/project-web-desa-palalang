@extends('layouts.main2')

@section('content')

<div class="container my-3">
  <div class="container py-3 px-4 rounded text-dark" style="background-color: #D3F1DF;">
    <nav
      style="--bs-breadcrumb-divider: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%228%22 height=%228%22%3E%3Cpath d=%22M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z%22 fill=%22%23000000%22/%3E%3C/svg%3E');"
      aria-label="breadcrumb"
    >
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a href="/" class="text-decoration-none text-dark">Home</a>
        </li>
        <li class="breadcrumb-item" aria-current="page">
          <a href="/foto" class="text-decoration-none text-dark">Home</a>
        </li>
        <li class="breadcrumb-item active fw-bold" aria-current="page">
          {{ $foto->judul_foto }}
        </li>
      </ol>
    </nav>
  </div>
</div>

<!-- Konten Foto -->

<div class="container mb-4">
  <h3 class="mb-3">Foto</h3>

  <div class="card border-0 py-3 px-2 shadow mb-3">
    <!-- Gambar dengan lebar 70% -->
    <img src="{{ $foto->foto ? asset('storage/'.$foto->foto) : asset('img/no-image.png') }}" 
         class="card-img-top img-fluid mx-auto d-block" 
         style="width: 70%;" alt="{{ $foto->judul_foto }}">
         
    <div class="card-body">
        <!-- Judul Foto -->
        <h2 class="card-title">{{ $foto->judul_foto }}</h2>

        <!-- Menambahkan ikon kalender sebelum tanggal -->
        <p class="text-secondary small">
            <i class="fa fa-calendar" aria-hidden="true"></i> 
            {{ $foto->created_at->format('d-m-Y') }}
        </p>

        <!-- Konten Foto -->
        <p>{{ $foto->deskripsi ?? 'Konten tidak tersedia.' }}</p>
    </div>
</div>

</div>

    
@endsection
