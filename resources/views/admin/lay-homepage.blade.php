@extends('layouts.main-login')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Section Navbar -->
    <div class="card">
        <div class="card-body">
            <h5>Navbar</h5>
            <form action="" method="post">
                @csrf
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="logo" class="form-label mb-0" style="min-width: 90px;">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control">
                </div>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="nama_website" class="form-label mb-0" style="min-width: 90px;">Nama Website</label>
                    <input type="text" name="nama_website" id="nama_website" class="form-control" placeholder="Masukkan nama website">
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

        <!-- Section Banner -->
        <div class="card mt-4">
            <div class="card-body">
                <h5>Banner</h5>
                <form action="" method="post">
                    @csrf
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <label for="banner_1" class="form-label mb-0" style="min-width: 90px;">Banner 1</label>
                        <input type="file" name="banner_1" id="banner_1" class="form-control">
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <label for="banner_2" class="form-label mb-0" style="min-width: 90px;">Banner 2</label>
                        <input type="file" name="banner_2" id="banner_2" class="form-control">
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <label for="banner_3" class="form-label mb-0" style="min-width: 90px;">Banner 3</label>
                        <input type="file" name="banner_3" id="banner_3" class="form-control">
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
            <form action="" method="post">
                @csrf
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="link_video" class="form-label mb-0" style="min-width: 90px;">Link Video</label>
                    <input type="text" name="link_video" id="link_video" class="form-control" placeholder="Masukkan link iFrame">
                </div>
                <div class="d-flex flex-column">
                    <label for="sejarah_desa" class="form-label mb-2">Sejarah Desa Singkat</label>
                    <textarea name="sejarah_desa" id="editor" class="form-control" placeholder="Tulis sejarah desa"></textarea>
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

            <form action="">
                @csrf
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="tentang_desa" class="form-label mb-0" style="min-width: 90px;">Tentang Desa</label>
                    <textarea type="text" name="tentang_desa" id="tentang_desa" class="form-control" placeholder="Masukkan deskripsi tentang desa"></textarea>
                </div>
    
                <!-- Pelayanan -->
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="pelayanan" class="form-label mb-0" style="min-width: 90px;">Pelayanan</label>
                    <input type="text" name="pelayanan" id="pelayanan" class="form-control" placeholder="Masukkan informasi pelayanan desa">
                </div>
    
                <!-- Official Info -->
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="alamat" class="form-label mb-0" style="min-width: 90px;">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat">
                </div>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="nomor_kontak" class="form-label mb-0" style="min-width: 90px;">Nomor Kontak</label>
                    <input type="text" name="nomor_kontak" id="nomor_kontak" class="form-control" placeholder="Masukkan nomor kontak">
                </div>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="email" class="form-label mb-0" style="min-width: 90px;">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email">
                </div>
    
                <!-- Media Sosial -->
                <h6 class="mt-4">Media Sosial</h6>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="instagram" class="form-label mb-0" style="min-width: 90px;">Instagram</label>
                    <input type="text" name="instagram" id="instagram" class="form-control" placeholder="Link Instagram">
                </div>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="tiktok" class="form-label mb-0" style="min-width: 90px;">Tiktok</label>
                    <input type="text" name="tiktok" id="tiktok" class="form-control" placeholder="Link Tiktok">
                </div>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="youtube" class="form-label mb-0" style="min-width: 90px;">YouTube</label>
                    <input type="text" name="youtube" id="youtube" class="form-control" placeholder="Link YouTube">
                </div>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="facebook" class="form-label mb-0" style="min-width: 90px;">Facebook</label>
                    <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Link Facebook">
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
</script>
@endsection
