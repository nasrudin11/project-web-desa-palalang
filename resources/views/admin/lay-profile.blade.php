@extends('layouts.main-login')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Section Navbar -->
    <div class="card">
        <div class="card-body">
            <h5>Visi & Misi</h5>
            <form action="" method="post">
                @csrf
                <div class="d-flex flex-column">
                    <label for="nama_website" class="form-label mb-2">Visi dan Misi</label>
                    <textarea name="sejarah_desa" id="editorVisiMisi" class="form-control" placeholder="Tulis visi dan misi desa"></textarea>
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
            <h5>Sejarah Desa</h5>
            <form action="" method="post">
                @csrf
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="link_video" class="form-label mb-0" style="min-width: 150px;">File Foto</label>
                    <input type="file" name="link_video" id="link_video" class="form-control">
                </div>
                <div class="d-flex flex-column">
                    <label for="sejarah_desa" class="form-label mb-2">Sejarah Desa</label>
                    <textarea name="sejarah_desa" id="editorSejarah" class="form-control" placeholder="Tulis sejarah desa"></textarea>
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
            <h5>Peta Desa</h5>

            <form action="">
                @csrf
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="tentang_desa" class="form-label mb-0" style="min-width: 150px;">Link Peta Desa</label>
                    <input type="text" class="form-control" placeholder="Masukkan link peta iFrame">
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
            <h5>Fasilitas Desa</h5>

            <button class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</button>

            <!-- Tambah Modal -->
            <div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="nameWithTitle" class="form-label">Nama Fasilitas</label>
                            <input type="text" id="nameWithTitle" class="form-control" placeholder="Masukkan judul" />
                            
                        </div>
                        <div class="mb-2">
                            <label for="emailWithTitle" class="form-label">Foto</label>
                            <input type="file" id="emailWithTitle" class="form-control"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="myTable" class="table table-striped table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Fasilitas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Foto 1</td>
                            <td>Puskesmas</td>
                            <td>
                                <button class="btn btn-warning btn-sm shadow" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                
                                <button type="button" class="btn btn-danger btn-sm shadow" data-bs-toggle="modal" data-bs-target="#deleteProdukModal">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Foto</td>
                            <td>Masjid</td>
                            <td>
                                <button class="btn btn-warning btn-sm shadow" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                
                                <button type="button" class="btn btn-danger btn-sm shadow" data-bs-toggle="modal" data-bs-target="#deleteProdukModal">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection

@section('table')
    <script>
       let table = new DataTable('#myTable');
    </script>
@endsection

@section('text-editor')
<script>
    // Inisialisasi CKEditor
    ClassicEditor
        .create(document.querySelector('#editorVisiMisi'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#editorSejarah'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
