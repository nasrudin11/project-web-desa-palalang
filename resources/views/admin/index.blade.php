@extends('layouts.main-login')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Card Utama -->
            <div class="col mb-6 order-0">
                <div class="card">
                    <div class="d-flex align-items-start row">
                        <!-- Konten Selamat Datang -->
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h4 class="card-title text-primary mb-3">Selamat Datang Kembali! 🎉</h4>
                                <p class="mb-6">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic, beatae?
                                </p>
                            </div>
                        </div>
                        <!-- Gambar -->
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-6">
                                <img
                                    src="../assets/img/illustrations/man-with-laptop.png"
                                    height="120"
                                    class="scaleX-n1-rtl"
                                    alt="man with laptop" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row untuk Foto, Video, Berita, Pengumuman -->
        <div class="row">
            <!-- Foto -->
            <div class="col mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Foto</h5>
                        <h2 class="text-primary mb-0">{{ $fotoCount }}</h2> <!-- Menampilkan jumlah foto -->
                    </div>
                </div>
            </div>

            <!-- Video -->
            <div class="col mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Video</h5>
                        <h2 class="text-success mb-0">{{ $videoCount }}</h2> <!-- Menampilkan jumlah video -->
                    </div>
                </div>
            </div>

            <!-- Berita -->
            <div class="col mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Berita</h5>
                        <h2 class="text-info mb-0">{{ $beritaCount }}</h2> <!-- Menampilkan jumlah berita -->
                    </div>
                </div>
            </div>

            <!-- Pengumuman -->
            <div class="col mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pengumuman</h5>
                        <h2 class="text-warning mb-0">{{ $pengumumanCount }}</h2> <!-- Menampilkan jumlah pengumuman -->
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection