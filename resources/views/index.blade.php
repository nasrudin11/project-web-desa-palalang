@extends('layouts.main')

@section('content')

    <!-- Homepage Banner as Carousel -->
    <div class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#homepageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#homepageCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#homepageCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner" style="height: 100vh;">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="d-flex align-items-center justify-content-center" 
                    style="height: 100vh; background: url('{{ asset('storage/' . $data->banner_1) }}') no-repeat center center; background-size: cover;">
                    <h1 class="text-white">Welcome to Our Website</h1>
                </div>
            </div>                              
            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="d-flex align-items-center justify-content-center" 
                    style="height: 100vh; background: url('{{ asset('storage/' . $data->banner_1) }}') no-repeat center center; background-size: cover;">
                    <h1 class="text-white">Explore Our Features</h1>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="d-flex align-items-center justify-content-center" 
                    style="height: 100vh; background: url('{{ asset('storage/' . $data->banner_1) }}') no-repeat center center; background-size: cover;">
                    <h1 class="text-white">Join Us Today</h1>
                </div>
            </div>
        </div>

    </div>


    <!-- Container untuk SOP Desa -->
    <div class="container mt-4 py-3 px-4">
        <h3 class="text-center mb-4">SOP Desa</h3>
        <div class="row text-center">
            <!-- Pelayanan Administrasi -->
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
                <div class="p-3">
                    <i class="fa-solid fa-file-lines" style="font-size: 3rem; color: #50B498;"></i>
                    <h5 class="mt-3">Kasi Kesejahteraan</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos, deserunt molestias corporis corrupti explicabo vero!</p>
                </div>
            </div>
            <!-- Pelayanan Pembangunan -->
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="p-3">
                    <i class="fa-solid fa-building" style="font-size: 3rem; color: #50B498;"></i>
                    <h5 class="mt-3">Kasi Pelayanan</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum dolorum, quaerat similique ratione nesciunt possimus?</p>
                </div>
            </div>
            <!-- Pelayanan Kesehatan -->
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <div class="p-3">
                    <i class="fa-solid fa-heartbeat" style="font-size: 3rem; color: #50B498;"></i>
                    <h5 class="mt-3">Kasi Pemerintahan</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque recusandae delectus iste id voluptate. Veniam?</p>
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
            <!-- Baris Pertama -->
            <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1000">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="card shadow border-0">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Berita 1">
                        <div class="card-body">
                            <h5 class="card-title">Berita Desa 1</h5>
                            <p class="card-text">Deskripsi singkat berita desa 1 yang menarik perhatian pembaca.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1000">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="card shadow border-0">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Berita 2">
                        <div class="card-body">
                            <h5 class="card-title">Berita Desa 2</h5>
                            <p class="card-text">Deskripsi singkat berita desa 2 yang menarik perhatian pembaca.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1000">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="card shadow border-0">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Berita 3">
                        <div class="card-body">
                            <h5 class="card-title">Berita Desa 3</h5>
                            <p class="card-text">Deskripsi singkat berita desa 3 yang menarik perhatian pembaca.</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
        <!-- Tombol Lihat Lainnya -->
        <div class="text-center mt-4">
            <a href="#" class="btn btn-success">Lihat Lainnya</a>
        </div>
    </div>

    <!-- Container Pengumuman -->
    <div class="container mb-4 py-3 px-4">
        <h3 class="text-center mb-4">Pengumuman</h3>
        <div class="row g-4">
            <!-- Baris Pertama -->
            <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1000">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="card shadow border-0">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Berita 1">
                        <div class="card-body">
                            <h5 class="card-title">Berita Desa 1</h5>
                            <p class="card-text">Deskripsi singkat berita desa 1 yang menarik perhatian pembaca.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1000">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="card shadow border-0">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Berita 2">
                        <div class="card-body">
                            <h5 class="card-title">Berita Desa 2</h5>
                            <p class="card-text">Deskripsi singkat berita desa 2 yang menarik perhatian pembaca.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1000">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="card shadow border-0">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Berita 3">
                        <div class="card-body">
                            <h5 class="card-title">Berita Desa 3</h5>
                            <p class="card-text">Deskripsi singkat berita desa 3 yang menarik perhatian pembaca.</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>

@endsection








    

