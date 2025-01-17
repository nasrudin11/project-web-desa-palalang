@extends('layouts.main')

@section('content')

    <!-- Homepage Banner as Carousel -->
    <div id="homepageCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#homepageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#homepageCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#homepageCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner" style="height: 100vh;">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="d-flex align-items-center justify-content-center position-relative" 
                    style="height: 100vh; background: url('{{ asset('storage/' . $data->banner_1) }}') no-repeat center center; background-size: cover;">
                    <!-- Overlay -->
                    <div class="position-absolute top-0 start-0 w-100 h-100" 
                        style="background: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
                    <!-- Content -->
                    <h1 class="text-white position-relative" style="z-index: 2;">Welcome to Our Website</h1>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="d-flex align-items-center justify-content-center position-relative" 
                    style="height: 100vh; background: url('{{ asset('storage/' . $data->banner_2) }}') no-repeat center center; background-size: cover;">
                    <!-- Overlay -->
                    <div class="position-absolute top-0 start-0 w-100 h-100" 
                        style="background: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
                    <!-- Content -->
                    <h1 class="text-white position-relative" style="z-index: 2;">Explore Our Features</h1>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="d-flex align-items-center justify-content-center position-relative" 
                    style="height: 100vh; background: url('{{ asset('storage/' . $data->banner_3) }}') no-repeat center center; background-size: cover;">
                    <!-- Overlay -->
                    <div class="position-absolute top-0 start-0 w-100 h-100" 
                        style="background: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
                    <!-- Content -->
                    <h1 class="text-white position-relative" style="z-index: 2;">Join Us Today</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Container untuk Pelayanan Desa -->
    <div class="container mt-4 py-3 px-4">
        <h3 class="text-center mb-4">Pelayanan Desa</h3>
        <div class="row text-center">
            <!-- Pelayanan Administrasi -->
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
                <div class="p-3">
                    <i class="fa-solid fa-file-lines" style="font-size: 3rem; color: #50B498;"></i>
                    <h5 class="mt-3">Administrasi</h5>
                    <p>Layanan untuk pembuatan dokumen penting seperti KTP, KK, Akta Kelahiran, dan lainnya.</p>
                </div>
            </div>
            <!-- Pelayanan Pembangunan -->
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="p-3">
                    <i class="fa-solid fa-building" style="font-size: 3rem; color: #50B498;"></i>
                    <h5 class="mt-3">Pembangunan</h5>
                    <p>Usulan dan informasi mengenai proyek pembangunan di desa, serta permohonan izin pembangunan.</p>
                </div>
            </div>
            <!-- Pelayanan Kesehatan -->
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <div class="p-3">
                    <i class="fa-solid fa-heartbeat" style="font-size: 3rem; color: #50B498;"></i>
                    <h5 class="mt-3">Kesehatan</h5>
                    <p>Pendaftaran layanan kesehatan desa, informasi imunisasi, pemeriksaan kesehatan, dan penyuluhan kesehatan.</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Profil Desa -->
    <div class="container py-3 px-4">
        <h3 class="text-center mb-4">Profil Desa</h3>
        <div class="row">
            <!-- Embed Map -->
            <div class="col-md-6 mb-4" data-aos="fade-right" data-aos-duration="1000">
                <div class="ratio ratio-16x9">
                    {!!  $data->link_video !!}
                </div>       
            </div>

            <!-- Sejarah Desa -->
            <div class="col-md-6" data-aos="fade-left" data-aos-duration="1000">
                <h4>Sejarah</h4>
                {!! $data->sejarah_singkat !!}
            </div>
        </div>
    </div>

    <!-- Container Berita -->
    <div class="container py-3 px-4">
        <h3 class="text-center mb-4">Berita</h3>
        <div class="row g-4">
            @forelse ($berita as $item)
                <!-- Baris Berita -->
                <div class="col-md-3" data-aos="zoom-in" data-aos-duration="1000">
                    <a href="/berita-dtl/{{ $item->id_publikasi }}" class="text-decoration-none text-dark">
                        <div class="card shadow border-0">
                            <img src="{{ $item->foto_publikasi ? asset('storage/'.$item->foto_publikasi) : 'https://via.placeholder.com/300x200?text=No+Image' }}" class="card-img-top" alt="Berita">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->judul_publikasi }}</h5>
                                <p class="card-text">{!! Str::limit($item->deskripsi_publikasi, 100) !!}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <!-- Jika tidak ada data -->
                <div class="col-md-3" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="card shadow border-0">
                        <img src="https://via.placeholder.com/300x200?text=No+Data" class="card-img-top" alt="No Data">
                        <div class="card-body">
                            <h5 class="card-title">Tidak ada Berita</h5>
                            <p class="card-text">Saat ini tidak ada berita yang tersedia. Mohon cek kembali nanti.</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Tombol Lihat Lainnya -->
        <div class="text-center mt-4">
            <a href="/berita" class="btn btn-sm text-white" style="background-color: #50B498">Lihat Lainnya</a>
        </div>
    </div>


    <!-- Container Pengumuman -->
    <div class="container py-3 px-4">
        <h3 class="text-center mb-4">Pengumuman</h3>
        <div class="row g-4">
            @forelse ($pengumuman as $item)
                <!-- Baris Berita -->
                <div class="col-md-3" data-aos="zoom-in" data-aos-duration="1000">
                    <a href="/pengumuman-dtl/{{ $item->id_publikasi }}" class="text-decoration-none text-dark">
                        <div class="card shadow border-0">
                            <img src="{{ $item->foto_publikasi ? asset('storage/'.$item->foto_publikasi) : 'https://via.placeholder.com/300x200?text=No+Image' }}" class="card-img-top" alt="Pengumuman">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->judul_publikasi }}</h5>
                                <p class="card-text">{!! Str::limit($item->deskripsi_publikasi, 100) !!}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <!-- Jika tidak ada data -->
                <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="card shadow border-0">
                        <img src="https://via.placeholder.com/300x200?text=No+Data" class="card-img-top" alt="No Data">
                        <div class="card-body">
                            <h5 class="card-title">Tidak ada Berita</h5>
                            <p class="card-text">Saat ini tidak ada berita yang tersedia. Mohon cek kembali nanti.</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Tombol Lihat Lainnya -->
        <div class="text-center mt-4">
            <a href="/pengumuman" class="btn btn-sm text-white" style="background-color: #50B498">Lihat Lainnya</a>
        </div>
    </div>

@endsection








    

