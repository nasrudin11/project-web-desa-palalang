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

    <!-- Section Navbar -->
    <div class="card">
        <div class="card-body">
            <h5>Navbar</h5>
            <form action="/edit-navbar" method="POST" enctype="multipart/form-data">
                @csrf
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
                <div class="d-flex align-items-center  mb-3">
                    <label for="banner_1" class="form-label mb-0" style="min-width: 100px;">Banner 1</label>
                    <div class="w-100">
                        <input type="file" name="banner_1" id="banner_1" class="form-control  @error('banner_1') is-invalid @enderror">
                        @error('banner_!')
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
                <div class="d-flex align-items-center  mb-3">
                    <label for="link_video" class="form-label mb-0" style="min-width: 100px;">Link Video</label>
                    <div class="w-100">
                        <textarea name="link_video" id="link_video" class="form-control  @error('link_video') is-invalid @enderror" required> {{ $data->link_video }}</textarea>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <label for="sejarah_singkat" class="form-label mb-2">Sejarah Desa Singkat</label>
                    <div class="w-100">
                        <textarea name="sejarah_singkat" id="editor" class="form-control  @error('sejarah_singkat') is-invalid @enderror" placeholder="Tulis sejarah desa">{{ $data->sejarah_singkat }}</textarea>
                    </div>
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
                <div class="mb-3">
                    <label for="tentang_desa" class="form-label mb-2" style="min-width: 100px;">Tentang Desa</label>
                    <textarea name="tentang_desa" id="editorTentang" class="form-control" placeholder="Masukkan deskripsi tentang desa">{{ $data->tentang_desa }}</textarea>
                </div>
    
                <!-- Pelayanan -->
                <div class="mb-3">
                    <label for="pelayanan" class="form-label mb-2" style="min-width: 100px;">Pelayanan</label>
                    <textarea name="pelayanan" id="editorPelayanan" class="form-control" placeholder="Masukkan informasi pelayanan desa">{{ $data->pelayanan }}</textarea>
                </div>
    
                <!-- Official Info -->
                <div class="d-flex align-items-center  mb-3">
                    <label for="alamat" class="form-label mb-0" style="min-width: 100px;">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat" value="{{ $data->alamat_desa }}">
                </div>
                <div class="d-flex align-items-center  mb-3">
                    <label for="nomor_kontak" class="form-label mb-0" style="min-width: 100px;">Nomor Kontak</label>
                    <input type="text" name="nomor_kontak" id="nomor_kontak" class="form-control" placeholder="Masukkan nomor kontak" value="{{ $data->no_kontak }}">
                </div>
                <div class="d-flex align-items-center  mb-3">
                    <label for="email" class="form-label mb-0" style="min-width: 100px;">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" value="{{ $data->email_desa }}">
                </div>
    
                <!-- Media Sosial -->
                <h6 class="mt-4">Media Sosial</h6>
                <div class="d-flex align-items-center  mb-3">
                    <label for="link_instagram" class="form-label mb-0" style="min-width: 100px;">Instagram</label>
                    <input type="text" name="link_instagram" id="link_instagram" class="form-control" placeholder="Link Instagram">
                </div>
                <div class="d-flex align-items-center  mb-3">
                    <label for="link_tiktok" class="form-label mb-0" style="min-width: 100px;">Tiktok</label>
                    <input type="text" name="link_tiktok" id="link_tiktok" class="form-control" placeholder="Link Tiktok">
                </div>
                <div class="d-flex align-items-center  mb-3">
                    <label for="link_youtube" class="form-label mb-0" style="min-width: 100px;">YouTube</label>
                    <input type="text" name="link_youtube" id="link_youtube" class="form-control" placeholder="Link YouTube">
                </div>
                <div class="d-flex align-items-center  mb-3">
                    <label for="link_facebook" class="form-label mb-0" style="min-width: 100px;">Facebook</label>
                    <input type="text" name="link_facebook" id="link_facebook" class="form-control" placeholder="Link Facebook">
                </div>
    
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
