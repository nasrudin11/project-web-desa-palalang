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
            <h5>Visi & Misi</h5>
            <form action="/update-visi-misi" method="post">
                @csrf
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
                            <img src="{{ asset('storage/' . $profile->foto_desa) }}" alt="Logo" class="img-fluid rounded w-100">
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
                        @forelse ($fasilitas as $index => $item)
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
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data fasilitas</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>

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
                        <input type="text" id="nama_fasilitas" name="nama_fasilitas" class="form-control  @error('nama_fasilitas') is-invalid @enderror" value="{{ $item->nama_fasilitas }}"/>
                        @error('nama_fasilitas')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="text-center mb-2">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <img src="{{ asset('storage/' . $item->foto_fasilitas) }}" alt="Logo" class="img-fluid rounded w-100">
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
