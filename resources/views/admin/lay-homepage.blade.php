@extends('layouts.main-login')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Pesan Sukses -->
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container py-3 px-4 rounded text-white" style="background-color: #D3F1DF;">
        <nav style="--bs-breadcrumb-divider: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%278%27 height=%278%27%3E%3Cpath d=%27M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z%27 fill=%27%23000000%27/%3E%3C/svg%3E');" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none text-dark">Dashboard</a>
                </li>
                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">
                    Homepage Layouts
                </li>
            </ol>
        </nav>
    </div>

    <!-- Section Navbar -->
    <div class="card mt-4">
        <div class="card-body">
            <h5>Navbar</h5>
            <form action="/edit-navbar" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex align-items-center mb-3">
                    <label for="logo" class="form-label mb-0" style="min-width: 100px;">Logo</label>
                    <div class="w-100">
                        <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror">
                        @error('logo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>  
                </div>

                <div class="text-center mb-3">
                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-3">
                            <img src="{{ asset('storage/' . $data->logo) }}" alt="Logo" class="img-fluid" style="max-width: 150px;">
                        </div>
                    </div>
                </div>
                
                <div class="d-flex align-items-center  mb-3">
                    <label for="nama_website" class="form-label mb-0" style="min-width: 100px;">Nama Website</label>

                    <div class="w-100">
                        <input type="text" name="nama_website" id="nama_website" class="form-control @error('nama_website') is-invalid @enderror" value="{{ $data->nama_website }}" required>
                        @error('nama_website')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>  
                </div>
                
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" name="Submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Section Banner -->
    <div class="card mt-4">
        <div class="card-body">
            <h5>Banner</h5>

            <div class="text-center mb-3">
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-3">
                        <img src="{{ asset('storage/' . $data->banner_1) }}" alt="banner1" class="img-fluid rounded shadow" style="max-width: 100%;">
                    </div>
                    <div class="col-md-4 mb-3">
                        <img src="{{ asset('storage/' . $data->banner_2) }}" alt="banner2" class="img-fluid rounded shadow" style="max-width: 100%;">
                    </div>
                    <div class="col-md-4 mb-3">
                        <img src="{{ asset('storage/' . $data->banner_3) }}" alt="banner3" class="img-fluid rounded shadow" style="max-width: 100%;">
                    </div>
                </div>
            </div>
            
            
            <form action="/edit-banner" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex align-items-center  mb-3">
                    <label for="banner_1" class="form-label mb-0" style="min-width: 100px;">Banner 1</label>
                    <div class="w-100">
                        <input type="file" name="banner_1" id="banner_1" class="form-control  @error('banner_1') is-invalid @enderror">
                        @error('banner_1')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                </div>
                <div class="d-flex align-items-center  mb-3">
                    <label for="banner_2" class="form-label mb-0" style="min-width: 100px;">Banner 2</label>
                    <div class="w-100">
                        <input type="file" name="banner_2" id="banner_2" class="form-control  @error('banner_2') is-invalid @enderror">
                        @error('banner_2')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>            
                </div>
                <div class="d-flex align-items-center  mb-3">
                    <label for="banner_3" class="form-label mb-0" style="min-width: 100px;">Banner 3</label>
                    <div class="w-100">
                        <input type="file" name="banner_3" id="banner_3" class="form-control  @error('banner_3') is-invalid @enderror">
                        @error('banner_3')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Section Konten -->
    <div class="card mt-4">
        <div class="card-body">
            <h5>Konten</h5>
            <form action="/edit-konten" method="post">
                @csrf
                @method('PUT')
                <div class="d-flex align-items-center  mb-3">
                    <label for="link_video" class="form-label mb-0" style="min-width: 100px;">Link Video</label>
                    <div class="w-100">
                        <textarea name="link_video" id="link_video" class="form-control  @error('link_video') is-invalid @enderror" required> {{ $data->link_video }}</textarea>
                        @error('link_video')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <label for="sejarah_singkat" class="form-label mb-2">Sejarah Desa Singkat</label>
                    <textarea name="sejarah_singkat" id="editor" class="form-control @error('sejarah_singkat') is-invalid @enderror" placeholder="Tulis sejarah desa">{{ $data->sejarah_singkat }}</textarea>
                    @error('sejarah_singkat')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </form>      
        </div>
    </div>

    <!-- Section Footer -->
    <div class="card mt-4">
        <div class="card-body">
            <h5>Footer</h5>
            <form action="/edit-footer" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="tentang_desa" class="form-label mb-2" style="min-width: 100px;">Tentang Desa</label>
                    <textarea name="tentang_desa" id="editorTentang" class="form-control @error('tentang_desa') is-invalid @enderror" placeholder="Masukkan deskripsi tentang desa">{{ $data->tentang_desa }}</textarea>
                    @error('tentang_desa')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                
                </div>
    
                <!-- Pelayanan -->
                <div class="mb-3">
                    <label for="pelayanan" class="form-label mb-2" style="min-width: 100px;">Pelayanan</label>

                    <textarea name="pelayanan" id="editorPelayanan" class="form-control @error('tentang_desa') is-invalid @enderror" placeholder="Masukkan informasi pelayanan desa">{{ $data->pelayanan }}</textarea>
                    @error('pelayanan')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                <!-- Official Info -->
                <div class="d-flex align-items-center  mb-3">
                    <label for="alamat" class="form-label mb-0" style="min-width: 100px;">Alamat</label>
                    <div class="w-100">
                        <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat" value="{{ $data->alamat_desa }}">
                        @error('pelayanan')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex align-items-center  mb-3">
                    <label for="nomor_kontak" class="form-label mb-0" style="min-width: 100px;">Nomor Kontak</label>
                    <div class="w-100">
                        <input type="text" name="nomor_kontak" id="nomor_kontak" class="form-control @error('nomor_kontak') is-invalid @enderror" placeholder="Masukkan nomor kontak" value="{{ $data->no_kontak }}">
                        @error('nomor_kontak')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                  
                </div>
                <div class="d-flex align-items-center  mb-3">
                    <label for="email" class="form-label mb-0" style="min-width: 100px;">Email</label>
                    <div class="w-100">
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email" value="{{ $data->email_desa }}">
                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                </div>
    
                <!-- Media Sosial -->
                {{-- <h6 class="mt-4">Media Sosial</h6>
                <div class="d-flex align-items-center  mb-3">
                    <label for="link_instagram" class="form-label mb-0" style="min-width: 100px;">Instagram</label>
                    <div class="w-100">
                        <input type="text" name="link_instagram" id="link_instagram" class="form-control @error('link_instagram') is-invalid @enderror" placeholder="Link Instagram" value="{{ $data->link_instagram }}">
                        @error('link_instagram')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex align-items-center  mb-3">
                    <label for="link_tiktok" class="form-label mb-0" style="min-width: 100px;">Tiktok</label>
                    <div class="w-100">
                        <input type="text" name="link_tiktok" id="link_tiktok" class="form-control @error('link_tiktok') is-invalid @enderror" placeholder="Link Tiktok" value="{{ $data->link_tiktok }}">
                        @error('link_tiktok')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                   
                </div>
                <div class="d-flex align-items-center  mb-3">
                    <label for="link_youtube" class="form-label mb-0" style="min-width: 100px;">YouTube</label>
                    <div class="w-100">
                        <input type="text" name="link_youtube" id="link_youtube" class="form-control @error('link_youtube') is-invalid @enderror" placeholder="Link YouTube" value="{{ $data->link_youtube }}">
                        @error('link_youtube')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                   
                </div>
                <div class="d-flex align-items-center  mb-3">
                    <label for="link_facebook" class="form-label mb-0" style="min-width: 100px;">Facebook</label>
                    <div class="w-100">
                        <input type="text" name="link_facebook" id="link_facebook" class="form-control @error('link_facebook') is-invalid @enderror" placeholder="Link Facebook" value="{{ $data->link_facebook }}">
                        @error('link_facebook')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                   
                </div> --}}

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('text-editor')
<script>
    // Inisialisasi CKEditor
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#editorTentang'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editorPelayanan'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
