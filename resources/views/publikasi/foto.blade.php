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

<!-- Konten Fasilitas Desa -->
<div class="container mb-4">

  <h3 class="text-start mb-3">Foto</h3> 

  @if ($foto->isEmpty())
      <!-- Tampilkan gambar jika data kosong -->

    <div class="row justify-content-center">
        <div class="col-md-6 p-0">
            <img src="{{ asset('img/no-data.png') }}" alt="No Data Available" class="img-fluid w-100" >
        </div>
    </div>

  @else 
      
    <!-- Tampilkan fasilitas jika data ada -->
    <div class="row g-4">
      @foreach ($foto as $item)
        <div class="col-md-3" data-aos="fade-up" data-aos-duration="1000">
          <a href="/foto-dtl/{{ $item->id_foto }}" class="text-decoration-none">
              <div class="card border-0 shadow">
                <img src="{{ $item->foto ? asset('storage/'.$item->foto) : asset('img/no-image.png') }}" class="card-img-top" alt="Foto">
                <div class="card-body">
                    <h5 class="card-title text-start fw-bold">{{ $item->judul_foto }}</h5>
                </div>
            </div>
          </a>  
        </div>
      @endforeach
  </div>
  
  @endif
</div>



    
@endsection
