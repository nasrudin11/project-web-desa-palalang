@extends('layouts.main-login')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="container py-3 px-4 rounded text-white" style="background-color: #D3F1DF;">
            <nav style="--bs-breadcrumb-divider: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%278%27 height=%278%27%3E%3Cpath d=%27M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z%27 fill=%27%23000000%27/%3E%3C/svg%3E');" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="#" class="text-decoration-none text-dark">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">
                        Video
                    </li>
                </ol>
            </nav>
        </div>
       
        <div class="card mt-4">
            <div class="card-body">
                <button class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</button>

                <!-- Tambah Modal -->
                <div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Tambah Video</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/store-video" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="judul_video" class="form-label">Judul Video</label>
                                        <input type="text" id="judul_videoFoto" name="judul_video" class="form-control @error('judul_video') is-invalid @enderror" value="{{ old('judul_video') }}" placeholder="Masukkan judul video" required>
                                        @error('judul_video')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div
                                        >@enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="video_url" class="form-label">Link Video</label>
                                        <textarea id="video_url" name="video_url" class="form-control @error('video_url') is-invalid @enderror" placeholder="Masukkan link video" required>{{ old('video_url') }}</textarea>
                                        @error('video_url')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi Video   </label>
                                        <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi">{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
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
                                <th>Judul</th>
                                <th>Link Video</th>
                                <th>Deskripsi</th>
                                <th>Tangal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($video as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                   {!! $item->video_url !!}
                                </td>
                                <td>{{ $item->judul_video }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-warning btn-sm shadow" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_video }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                    
                                    <!-- Tombol Hapus -->
                                    <button type="button" class="btn btn-danger btn-sm shadow" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id_video }}">
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
@if ($video->isNotEmpty())
    @foreach ($video as $item)

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal{{ $item->id_video }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/edit-video/{{ $item->id_video }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="judul_video" class="form-label">Judul Foto</label>
                                <input type="text" id="judul_video" name="judul_video" value="{{ $item->judul_video }}" class="form-control @error('judul_video') is-invalid @enderror" required/>
                                @error('judul_video')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="text-center mb-2">
                                <div class="row justify-content-center">
                                    <div class="col-md-5">
                                        @if ($item->video_url)
                                            {!! $item->video_url !!}
                                        @else
                                            <div class="no-image-container text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="gray" class="bi bi-image" viewBox="0 0 16 16">
                                                    <path d="M14.002 4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8.002a1 1 0 0 0 1 1h11.002a1 1 0 0 0 1-1V4zm-1-.002V11l-2.5-2.5-3.5 3.5-3.5-3.5L2 11.002V4h11.002zM2 3a2 2 0 0 0-2 2v8.002a2 2 0 0 0 2 2h11.002a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H2z"/>
                                                    <path d="M10.648 7.646a.5.5 0 0 0-.646-.047l-2.772 2.3-1.528-1.85a.5.5 0 0 0-.8.6l1.89 2.287a.5.5 0 0 0 .785.062l2.89-2.4a.5.5 0 0 0-.047-.752z"/>
                                                </svg>
                                                <p class="text-muted mt-2">No Video Available</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="video_url" class="form-label">Link Video</label>
                                <textarea id="video_url" name="video_url" class="form-control @error('video_url') is-invalid @enderror" required>{{ $item->video_url }}</textarea>
                                @error('video_url')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="deskripsi" class="form-label">Deskripsi Video</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ $item->deskripsi }}</textarea>
                                @error('deskripsi')
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
        <div class="modal fade" id="deleteModal{{ $item->id_video }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus video ini?</p>
                        <form action="/delete-video/{{ $item->id_video }}" method="POST">
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