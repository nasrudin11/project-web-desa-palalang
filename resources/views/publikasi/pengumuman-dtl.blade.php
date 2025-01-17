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
        <li class="breadcrumb-item">
            <a href="/pengumuman" class="text-decoration-none text-dark">Pengumuman</a>
        </li>
        <li class="breadcrumb-item active fw-bold" aria-current="page">
          {{ $pengumuman->judul_publikasi }}
        </li>
      </ol>
    </nav>
  </div>
</div>

<!-- Konten pengumuman -->
<div class="container mb-4">
  <div class="row">

    <!-- Kolom untuk menampilkan detail pengumuman -->
    <div class="col-md-8">
      @if ($pengumuman)
        <!-- Tampilkan pengumuman jika ada -->
        <div class="card shadow-sm">
          <div class="card-body">
            <img src="{{ $pengumuman->foto_publikasi ? asset('storage/'.$pengumuman->foto_publikasi) : asset('img/no-image.png') }}" class="img-fluid w-100 mb-4" alt="Gambar pengumuman">
            <h3>{{ $pengumuman->judul_publikasi }}</h3>
            <div>
              <i class="fa fa-calendar text-secondary" aria-hidden="true"></i>
              <span class="text-secondary small">{{ $pengumuman->created_at->format('d-m-Y') }}</span>
            </div>
            <p>{!! $pengumuman->deskripsi_publikasi ?? 'Deskripsi tidak tersedia.' !!}</p>
          </div>
        </div>
      @else
        <!-- Tampilkan gambar jika data kosong -->
        <div class="row justify-content-center">
          <div class="col-md-6 p-0">
            <img src="{{ asset('img/no-data.png') }}" alt="No Data Available" class="img-fluid w-100" >
          </div>
        </div>
      @endif
    </div>

    <!-- Kolom untuk menampilkan pengumuman terbaru -->
    <div class="col-md-4">
      <!-- Card untuk pengumuman terbaru -->
      <div class="card border-0 pt-2 px-2 shadow-sm">
        <div class="card-body">
          <h5 class="fw-bolder">pengumuman Terbaru</h5>

          @foreach ($pengumumanTerbaru as $item)
            <div class="row mb-3">
              <div class="col-4">
                <img src="{{ $item->foto_publikasi ? asset('storage/'.$item->foto_publikasi) : asset('img/no-image.png') }}" alt="Gambar pengumuman Terbaru" class="img-fluid">
              </div>

              <div class="col">
                <a href="/pengumuman-dtl/{{ $item->id_publikasi }}" class="text-decoration-none text-dark">
                  <h5 class="text-secondary">{{ $item->judul_publikasi }}</h5>
                </a>
                <i class="fa fa-calendar text-secondary" aria-hidden="true"></i>
                <span class="text-secondary small">{{ $item->created_at->format('d-m-Y') }}</span>
              </div>
            </div>
            <hr>
          @endforeach

        </div>
      </div>
    </div>

  </div>
</div>

@endsection
