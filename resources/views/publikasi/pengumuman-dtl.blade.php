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
          <a href="/pengumuman-dtl/" class="text-decoration-none text-dark">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/pengumuman-dtl/" class="text-decoration-none text-dark">Pengumuman</a>
          </li>
        <li class="breadcrumb-item active fw-bold" aria-current="page">
          Judul Pengumuman
        </li>
      </ol>
    </nav>
  </div>
</div>

<!-- Konten Pengumuman -->

<div class="container mb-4">
    <h2 class="mb-4">Pengumuman</h2>
    <div class="row">

        <!-- Card kedua dengan kolom besar -->
        <div class="col">
            <div class="card border-0 px-3 shadow-sm">
                <div class="card-body">
                        <h3 class="fw-normal">Pengumuman 1</h3>
                    <!-- Tanggal dengan ukuran kecil -->
                    <span class="text-secondary small fw-normal">Dec, 29, 2025</span>
                    <img src="../img/banner1.jpg" alt="" class="img-fluid">

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos sunt aspernatur aliquam voluptatibus voluptatem aliquid iusto? Odio omnis iure natus?</p>
                </div>
            </div>
        </div>
        

        <!-- Card ketiga dengan kolom kecil -->
        <div class="col-4">
                <div class="card border-0 pt-2 px-2 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bolder">Pengumuman Terakhir</h5>

                        <div class="row">
                            <div class="col-4">
                                <img src="../img/banner1.jpg" alt="" class="img-fluid">
                            </div>

                            <div class="col">
                                <a href="/pengumuman-dtl" class="text-decoration-none text-dark">
                                    <h5 class="text-secondary">Pengumuman 1</h5>
                                </a>                   
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-4">
                                <img src="../img/banner1.jpg" alt="" class="img-fluid">
                            </div>

                            <div class="col">
                                <a href="/pengumuman-dtl" class="text-decoration-none text-dark">
                                    <h5 class="text-secondary">Pengumuman 1</h5>
                                </a>                   
                            </div>
                        </div>

                        <hr>


                    </div>
                </div>
        </div>

    </div>
</div>


    
@endsection
