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
          Berita
        </li>
      </ol>
    </nav>
  </div>
</div>

<!-- Konten Pengumuman -->

<div class="container mb-4">
  <h2 class="mb-4">Berita</h2>
  <div class="row">

    <div class="col">
      @if ($berita->isEmpty())
          <!-- Jika tidak ada data berita -->
        <div class="col-12 text-center">
            <img src="{{ asset('img/no-data.png') }}" alt="No Data" class="img-fluid">
        </div>

      @else
        <!-- Loop berita jika ada -->
        @foreach($berita as $item)

          <div class="row mb-3">
              <!-- Card pertama dengan kolom kecil untuk gambar (Berita utama) -->
              <div class="col-3">
                <a href="/berita-dtl/{{ $item->id_publikasi }}">
                    <img src="{{ $item->foto_publikasi ? asset('storage/'.$item->foto_publikasi) : asset('img/no-image.png') }}" alt="Gambar Berita" class="img-fluid shadow">
                </a>
            </div>

            <!-- Card kedua dengan kolom besar untuk berita utama -->
            <div class="col">
                <div class="card border-0 py-3 px-3 shadow-sm">
                    <div class="card-body">
                        <a href="/berita-dtl/{{ $item->id_publikasi }}" class="text-decoration-none text-secondary">
                            <h3 class="fw-bold">{{ $item->judul_publikasi }}</h3>
                        </a>
                        <i class="fa fa-calendar text-secondary" aria-hidden="true"></i> 
                        <span class="text-secondary small">{{ $item->created_at->format('d-m-Y') }}</span>
                        <p>{!! Str::limit($item->deskripsi_publikasi, 100) ?? 'Konten tidak tersedia.' !!}</p>
                        <a href="/berita-dtl/{{ $item->id_publikasi }}" class="btn btn-sm text-white" style="background-color: #50B498">Selengkapnya</a>
                    </div>
                </div>
            </div>
          </div>
        @endforeach
        
      @endif

      <!-- Pagination Bootstrap 5 -->
      <div class="mt-3">
        {{ $berita->links('pagination::bootstrap-5') }}
      </div>

    </div>

    <!-- Card ketiga dengan kolom kecil untuk berita terbaru -->
    <div class="col-md-4">
      <!-- Card untuk berita terbaru -->
      <div class="card border-0 pt-2 px-2 shadow-sm">
        <div class="card-body">
          <h5 class="fw-bolder">Berita Terbaru</h5>

          @if ($beritaTerbaru->isEmpty())
            <!-- Jika tidak ada data -->
            <p class="text-center text-secondary">Data Not Available</p>
          @else
            @foreach ($beritaTerbaru as $item)
              <div class="row mb-3">
                <div class="col-4">
                  <img src="{{ $item->foto_publikasi ? asset('storage/'.$item->foto_publikasi) : asset('img/no-image.png') }}" alt="Gambar Berita Terbaru" class="img-fluid">
                </div>

                <div class="col">
                  <a href="/berita-dtl/{{ $item->id_publikasi }}" class="text-decoration-none text-dark">
                    <p class="text-secondary fw-bold">{{ $item->judul_publikasi }}</p>
                  </a>
                  <i class="fa fa-calendar text-secondary" aria-hidden="true"></i> 
                  <span class="text-secondary small">{{ $item->created_at->format('d-m-Y') }}</span>
                </div>
              </div>
              <hr>
            @endforeach
          @endif

        </div>
      </div>
    </div>


  </div>
</div>




    
@endsection
