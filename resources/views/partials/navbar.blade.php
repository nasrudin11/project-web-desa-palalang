<!-- Navbar -->
<nav id="navbar" class="navbar navbar-expand-lg navbar-transpare position-fixed w-100 border-1" data-bs-target="#navbar" style="z-index: 10;">
    <div class="container">
        <!-- Navbar Brand -->
        <a class="navbar-brand text-white d-flex align-items-center" href="/">
            <img src="{{ asset('storage/' . $data->logo) }}" alt="Logo" class="img-fluid me-2" style="height: 35px; width: auto;">
            <b>{{ $data->nama_website }}</b>
        </a>

        <!-- Navbar Toggler Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i> 
        </button>

        <!-- Offcanvas Menu -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome back, {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/dashboard-admin">Dashboard</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white me-2" aria-current="page" href="#homepageCarousel">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white me-2" href="#" id="dropdownProfil" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profil
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownProfil">
                                <li><a class="dropdown-item" href="/visi-misi">Visi Misi</a></li>
                                <li><a class="dropdown-item" href="/sejarah">Sejarah</a></li>
                                <li><a class="dropdown-item" href="/peta-desa">Peta Desa</a></li>
                                <li><a class="dropdown-item" href="/fasilitas-desa">Fasilitas Desa</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white me-2" href="#" id="dropdownPemerintahan" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pemerintahan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownProfil">
                                <li><a class="dropdown-item" href="/struktur-organisasi">Struktur Organisasi</a></li>
                                <li><a class="dropdown-item" href="/perangkat-desa">Perangkat Desa</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white me-2" href="#" id="dropdownPublikasi" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Publikasi Desa
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownPublikasi">
                                <li><a class="dropdown-item" href="/foto">Foto</a></li>
                                <li><a class="dropdown-item" href="/video">Video</a></li>
                                <li><a class="dropdown-item" href="/berita">Berita</a></li>
                                <li><a class="dropdown-item" href="/pengumuman">Pengumuman</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white me-2" href="/pengaduan">Pengajuan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white me-2" href="/login">Login</a>
                        </li>
                    @endauth
                    
                </ul>
            </div>
        </div>
    </div>
</nav>
    