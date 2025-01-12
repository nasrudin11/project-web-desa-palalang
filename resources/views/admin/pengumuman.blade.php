@extends('layouts.main-login')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="container py-3 px-4 rounded text-white" style="background-color: #D3F1DF;">
            <nav style="--bs-breadcrumb-divider: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%278%27 height=%278%27%3E%3Cpath d=%27M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z%27 fill=%27%23ffffff%27/%3E%3C/svg%3E');"  aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="#" class="text-decoration-none text-dark">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">
                        Pengumuman
                    </li>
                </ol>
            </nav>
        </div>
       
        <div class="card mt-4">
            <div class="card-body">
                <button class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</button>

              <!-- Tambah Modal -->
              <div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalCenterTitle">Tambah Pengumuman</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="nameWithTitle" class="form-label">Judul</label>
                            <input type="text" id="nameWithTitle" class="form-control" placeholder="Masukkan Judul" />
                            
                        </div>
                        <div class="mb-2">
                            <label for="emailWithTitle" class="form-label">File Foto</label>
                            <input type="file" id="emailWithTitle" class="form-control"/>
                        </div>

                        <div class="mb-6">
                            <label for="dobWithTitle" class="form-label">Deskripsi Pengumuman</label>
                            <textarea id="editorTambah" class="form-control" placeholder="Enter Name"></textarea>
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
                                <td>No</td>
                                <th>Foto</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>28</td>
                                <td>Programmer</td>
                                <td>New York</td>
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
                                <td>Jane Smith</td>
                                <td>34</td>
                                <td>Designer</td>
                                <td>London</td>
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

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">Edit Pengumuman</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label for="nameWithTitle" class="form-label">Judul</label>
                    <input type="text" id="nameWithTitle" class="form-control" placeholder="Masukkan Judul" />
                    
                </div>
                <div class="mb-2">
                    <label for="emailWithTitle" class="form-label">Fie Foto</label>
                    <input type="file" id="emailWithTitle" class="form-control"/>
                </div>

                <div class="mb-6">
                    <label for="dobWithTitle" class="form-label">Deskripsi Pengumuman</label>
                    <textarea id="editorEdit" class="form-control" placeholder="Enter Name"></textarea>
                </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
          </div>
        </div>
    </div>


    <!-- Delete Modal -->
    <div class="modal fade" id="deleteProdukModal" tabindex="-1" aria-labelledby="deleteProdukModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProdukModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus berita ini?</p>
                    <input type="hidden" id="deleteProdukId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteProdukButton">Hapus</button>
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
    // Inisialisasi CKEditor untuk editor tambah
    ClassicEditor
        .create(document.querySelector('#editorTambah'))
        .catch(error => {
            console.error(error);
        });

    // Inisialisasi CKEditor untuk editor edit
    ClassicEditor
        .create(document.querySelector('#editorEdit'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection