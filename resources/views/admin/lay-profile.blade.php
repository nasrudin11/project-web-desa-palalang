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
                    Profile Layouts
                </li>
            </ol>
        </nav>
    </div>

    <!-- Section Navbar -->
    <div class="card mt-4">
        <div class="card-body">
            <h5>Visi & Misi</h5>
            <form action="/update-visi-misi" method="post">
                @csrf
                @method('PUT')
                <div class="d-flex flex-column">
                    <label for="visi_misi" class="form-label mb-2">Visi dan Misi</label>
                    <textarea name="visi_misi" id="editorVisiMisi" class="form-control @error('visi_misi') is-invalid @enderror" placeholder="Tulis visi dan misi desa">{{ $profile->visi_misi }}</textarea>
                    @error('visi_misi')
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

    <!-- Section Konten -->
    <div class="card mt-4">
        <div class="card-body">
            <h5>Sejarah Desa</h5>
            <form action="/update-sejarah" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="foto_desa" class="form-label mb-0" style="min-width: 150px;">File Foto</label>
                    <div class="w-100">
                        <input type="file" name="foto_desa" id="foto_desa" class="form-control @error('foto_desa') is-invalid @enderror">
                        @error('foto_desa')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="text-center mb-3">
                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-3">
                            <img src="{{ asset('storage/' . $profile->foto_desa) }}" alt="Desa" class="img-fluid rounded w-100">
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <label for="sejarah_desa" class="form-label mb-2">Sejarah Desa</label>
                    <textarea name="sejarah_desa" id="editorSejarah" class="form-control @error('sejarah_desa') is-invalid @enderror" placeholder="Tulis sejarah desa">{{ $profile->sejarah_desa }}</textarea>
                    @error('sejarah_desa')
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

    <!-- Section Peta Desa -->
    <div class="card mt-4">
        <div class="card-body">
            <h5>Peta Desa</h5>
            <form action="/update-peta-desa" method="post">
                @csrf
                @method('PUT')
                <div class="d-flex align-items-center  mb-3">
                    <label for="peta_desa_url" class="form-label mb-0" style="min-width: 100px;">Link Video</label>
                    <div class="w-100">
                        <textarea name="peta_desa_url" id="peta_desa_url" class="form-control  @error('peta_desa_url') is-invalid @enderror" required> {{ $profile  ->peta_desa_url }}</textarea>
                        @error('peta_desa_url')
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

    <!-- Section Fasilitas Desa -->
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
                        <form action="/store-fasilitas" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-2">
                                    <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                                    <input type="text" id="nama_fasilitas" name="nama_fasilitas" class="form-control @error('nama_fasilitas') is-invalid @enderror" placeholder="Masukkan judul" />
                                    @error('nama_fasilitas')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="foto_fasilitas" class="form-label">Foto Fasilitas</label>
                                    <input type="file" id="foto_fasilitas" name="foto_fasilitas @error('foto_fasilitas') is-invalid @enderror" class="form-control" />
                                    @error('foto_fasilitas')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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
                        @foreach ($fasilitas as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if ($item->foto_fasilitas)
                                        <img src="{{ asset('storage/' . $item->foto_fasilitas) }}" alt="Foto Fasilitas" width="100">
                                    @else
                                        Tidak ada foto
                                    @endif
                                </td>
                                <td>{{ $item->nama_fasilitas }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-warning btn-sm shadow" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_fasilitas }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    
                                    <!-- Tombol Hapus -->
                                    <button type="button" class="btn btn-danger btn-sm shadow" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id_fasilitas }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
            
        </div>
    </div>
</div>

@if ($fasilitas->isNotEmpty())
    @foreach ($fasilitas as $item)

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal{{ $item->id_fasilitas }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Edit Fasilitas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <!-- Gunakan method PUT dengan Blade -->
                    <form action="/edit-fasilitas/{{ $item->id_fasilitas }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                                <input type="text" id="nama_fasilitas" name="nama_fasilitas" class="form-control  @error('nama_fasilitas') is-invalid @enderror" value="{{ $item->nama_fasilitas }} required"/>
                                @error('nama_fasilitas')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="text-center mb-2">
                                <div class="row justify-content-center">
                                    <div class="col-md-5">
                                        @if ($item->foto_fasilitas)
                                            <img src="{{ asset('storage/' . $item->foto_fasilitas) }}" alt="{{ $item->nama_fasilitas }}" class="img-fluid rounded w-100">
                                        @else
                                            <div class="no-image-container text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="gray" class="bi bi-image" viewBox="0 0 16 16">
                                                    <path d="M14.002 4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8.002a1 1 0 0 0 1 1h11.002a1 1 0 0 0 1-1V4zm-1-.002V11l-2.5-2.5-3.5 3.5-3.5-3.5L2 11.002V4h11.002zM2 3a2 2 0 0 0-2 2v8.002a2 2 0 0 0 2 2h11.002a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H2z"/>
                                                    <path d="M10.648 7.646a.5.5 0 0 0-.646-.047l-2.772 2.3-1.528-1.85a.5.5 0 0 0-.8.6l1.89 2.287a.5.5 0 0 0 .785.062l2.89-2.4a.5.5 0 0 0-.047-.752z"/>
                                                </svg>
                                                <p class="text-muted mt-2">No Image Available</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-2">
                                <label for="foto" class="form-label">Foto Fasilitas</label>
                                <input type="file" id="foto" name="foto_fasilitas" class="form-control  @error('foto') is-invalid @enderror"/>
                                @error('foto')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal{{ $item->id_fasilitas }}" tabindex="-1" aria-labelledby="deleteProdukModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteProdukModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Form penghapusan fasilitas -->
                    <form action="/delete-fasilitas/{{ $item->id_fasilitas }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus fasilitas ini?</p>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endif




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
