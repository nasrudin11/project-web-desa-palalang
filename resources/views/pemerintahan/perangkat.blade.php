@extends('layouts.main2')

@section('content')

<div class="container my-3">
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
            Perangkat Desa
        </li>
      </ol>
    </nav>
  </div>
</div>

  <!-- Konten Fasilitas Desa -->

  <div class="container text-center mb-4">
    @if ($perangkat->isEmpty())
        <!-- Tampilkan gambar jika data kosong -->
  
      <div class="row justify-content-center">
          <div class="col-md-6 p-0">
              <img src="{{ asset('img/no-data.png') }}" alt="No Data Available" class="img-fluid w-100" >
          </div>
      </div>
  
    @else

      <h3>Fasilitas Desa</h3>  
        
      <!-- Tampilkan fasilitas jika data ada -->
      <div class="row g-4">
        @foreach ($perangkat as $item)
            <div class="col-md-3" data-aos="fade-up" data-aos-duration="1000">
                <div class="card border-0 shadow">
                    <img src="{{ $item->foto_perangkat ? asset('storage/'.$item->foto_perangkat) : asset('img/no-image.png') }}" class="card-img-top" alt="Foto Perangkat">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $item->nama_perangkat }}</h5>
                        <p class="card-text">{{ $item->jabatan }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    
    @endif
  </div>

    
@endsection
