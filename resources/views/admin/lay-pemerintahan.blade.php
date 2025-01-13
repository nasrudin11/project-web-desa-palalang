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
            <h5>Struktur Organisasi</h5>
            <form action="/update-struktur" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="gambar_struktur" class="form-label mb-0" style="min-width: 120px;">File Gambar</label>
                    <input type="file" name="gambar_struktur" id="gambar_struktur" class="form-control">
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
            <h5>Perangkat Desa</h5>

            <button class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</button>

            <!-- Tambah Modal -->
            <div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Perangkat Desa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="nameWithTitle" class="form-label">Nama</label>
                            <input type="text" id="nameWithTitle" class="form-control" placeholder="Masukkan judul" />
                            
                        </div>
                        <div class="mb-2">
                            <label for="emailWithTitle" class="form-label">File Foto</label>
                            <input type="file" id="emailWithTitle" class="form-control"/>
                        </div>
                        <div class="mb-2">
                            <div class="mb-4">
                                <label for="exampleFormControlSelect1" class="form-label">Jabatan</label>
                                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                  <option selected>Open this select menu</option>
                                  <option value="1">One</option>
                                  <option value="2">Two</option>
                                  <option value="3">Three</option>
                                </select>
                            </div>
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
                            <th>Nama Perangkat</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Foto 1</td>
                            <td>Nama</td>
                            <td>Jabatan</td>
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
                            <td>nama</td>
                            <td>Jabatan</td>
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

