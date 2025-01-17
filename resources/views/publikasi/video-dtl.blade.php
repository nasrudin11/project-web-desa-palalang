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
        <li class="breadcrumb-item fw-bold" aria-current="page">
          Video
        </li>
        <li class="breadcrumb-item active fw-bold" aria-current="page">
          {{ $video->judul_video }}
        </li>
      </ol>
    </nav>
  </div>
</div>

<!-- Konten Video -->
<div class="container mb-4">
  <h3 class="mb-3">Video</h3>

  <div class="card border-0 py-3 px-2 shadow mb-3">
    <!-- Video Responsif -->
    @if ($video->video_url)
        <div class="d-flex justify-content-center">
            <div class="ratio ratio-16x9 video-container">
                {!! $video->video_url !!}
            </div>
        </div>
    @else
        <p class="text-secondary text-center">Video tidak tersedia.</p>
    @endif

    <div class="card-body">
        <!-- Judul Video -->
        <h3 class="card-title">{{ $video->judul_video }}</h3>

        <!-- Menambahkan ikon kalender sebelum tanggal -->
        <p class="text-secondary small">
            <i class="fa fa-calendar" aria-hidden="true"></i> 
            {{ $video->created_at->format('d-m-Y') }}
        </p>

        <!-- Konten Video -->
        <p>{{ $video->deskripsi_publikasi ?? 'Konten tidak tersedia.'}} </p>
    </div>
  </div>
</div>

@endsection
