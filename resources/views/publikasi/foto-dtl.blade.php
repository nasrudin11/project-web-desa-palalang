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
        <li class="breadcrumb-item active fw-bold" aria-current="page">
          Foto
        </li>
      </ol>
    </nav>
  </div>
</div>

<!-- Konten Foto -->

<div class="container my-3">
    <h2>Foto</h2>

    <div class="card border-0 py-3 px-2 shadow mb-3">
        <img src="../img/banner1.jpg" class="card-img-top" alt="Berita 1">
        <div class="card-body ">
            <h2 class="card-title">Berita 1</h2>
            <p>08 - 09 - 2025</p>
            <p>Content Galeri</p>
            <h4 class="text-secondary">Foto Lainya</h4>
        </div>
    </div>
         

</div>

    
@endsection
