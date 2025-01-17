@extends('layouts.main2')

@section('content')

<div class="container my-4">
  <div class="container py-3 px-4 rounded text-dark" style="background-color: #d4edda;">
    <nav
      style="--bs-breadcrumb-divider: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%228%22 height=%228%22%3E%3Cpath d=%22M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z%22 fill=%22%23000000%22/%3E%3C/svg%3E');"
      aria-label="breadcrumb"
    >
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a href="/" class="text-decoration-none text-dark">Home</a>
        </li>
        <li class="breadcrumb-item active fw-bold" aria-current="page">
          Visi & Misi
        </li>
      </ol>
    </nav>
  </div>
</div>

  <!-- Konten Berita -->

  <div class="container mb-4">
    <div class="card border-0 py-3 px-3 shadow">
      <div class="card-body ">
        <h3 class="card-title mb-3">Visi & Misi</h3>
        <hr>
        <p class="card-text">{!! $profile->visi_misi !!}</p>
      </div>
    </div>
  </div>

    
@endsection
