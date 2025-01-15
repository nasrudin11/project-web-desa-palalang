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
                    Pemerintahan Layouts
                </li>
            </ol>
        </nav>
    </div>

    <!-- Section Navbar -->
    <div class="card mt-4">
        <div class="card-body">
            <h5>Struktur Organisasi</h5>

            <div class="text-center mb-2">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <img src="{{ asset('storage/' . $struktur->gambar_struktur) }}" alt="Logo" class="img-fluid rounded w-100">
                    </div>
                </div>
            </div>

            <form action="/store-perangkat-desa" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex align-items-center gap-3 mb-3">
                    <label for="gambar_struktur" class="form-label mb-0" style="min-width: 120px;">File Gambar</label>
                    <input type="file" name="gambar_struktur" id="gambar_struktur" class="form-control @error('gambar_struktur') is-invalid @enderror">
                    @error('gambar_struktur')
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

                    <form action="/store-perangkat-desa" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="nama_perangkat" class="form-label">Nama</label>
                                <input type="text" id="nama_perangkat" name="nama_perangkat" class="form-control @error('nama_perangkat') is-invalid @enderror" placeholder="Masukkan judul" required/>
                                @error('nama_perangkat')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" id="jabatan" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" placeholder="Masukkan judul" required/>
                                @error('jabatan')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="foto_perangkat" class="form-label">File Foto</label>
                                <input type="file" id="foto_perangkat" name="foto_perangkat" class="form-control @error('foto_perangkat') is-invalid @enderror"/>
                                @error('foto_perangkat')
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
                            <th>Nama Perangkat</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perangkat as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if ($item->foto_perangkat)
                                        <img src="{{ asset('storage/' . $item->foto_perangkat) }}" alt="Foto Perangkat" width="100">
                                    @else
                                        Tidak ada foto
                                    @endif
                                </td>
                                <td>{{ $item->nama_perangkat }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-warning btn-sm shadow" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_perangkat }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                    
                                    <!-- Tombol Hapus -->
                                    <button type="button" class="btn btn-danger btn-sm shadow" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id_perangkat }}">
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


<!-- Modal Edit dan Hapus -->
@if ($perangkat->isNotEmpty())
    @foreach ($perangkat as $item)
        <!-- Modal Edit -->
        <div class="modal fade" id="editModal{{ $item->id_perangkat }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Perangkat Desa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/edit-perangkat-desa/{{ $item->id_perangkat }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="nama_perangkat" class="form-label">Nama</label>
                                <input type="text" id="nama_perangkat" name="nama_perangkat" value="{{ $item->nama_perangkat }}" class="form-control @error('nama_perangkat') is-invalid @enderror" />
                                @error('nama_perangkat')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" id="jabatan" name="jabatan" value="{{ $item->jabatan }}" class="form-control @error('jabatan') is-invalid @enderror" />
                                @error('jabatan')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="text-center mb-2">
                                <div class="row justify-content-center">
                                    <div class="col-md-5">
                                        @if ($item->foto_perangkat)
                                            <img src="{{ asset('storage/' . $item->foto_perangkat) }}" alt="{{ $item->nama_perangkat }}" class="img-fluid rounded w-100">
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
                                <label for="foto_perangkat" class="form-label">File Foto</label>
                                <input type="file" id="foto_perangkat" name="foto_perangkat" class="form-control @error('foto_perangkat') is-invalid @enderror" />
                                @error('foto_perangkat')
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

        <!-- Modal Hapus -->
        <div class="modal fade" id="deleteModal{{ $item->id_perangkat }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus perangkat desa ini?</p>
                        <form action="/delete-perangkat-desa/{{ $item->id_perangkat }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                        </form>
                    </div>
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

