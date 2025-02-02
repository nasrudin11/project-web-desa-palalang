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
                        Pengaduan
                    </li>
                </ol>
            </nav>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Dusun</th>
                                <th>Jenis Aduan</th>
                                <th>No HP</th>
                                <th>Tanggal</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $index => $item)
                                <tr>
                                    <!-- Bungkus setiap baris dengan tautan -->
                                    <a href="/dashboard-pengaduan-dtl/{{ $aduan->id }}" class="text-decoration-none text-dark">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->dusun }}</td>
                                        <td>{{ $item->jenis_aduan }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{!! Str::limit($aduan->deskripsi, 15, '...') !!}</td>
                                    </a>
                                </tr>
                            @endforeach
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
