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
                            <tr onclick="window.location='/dashboard-pengaduan-dtl';" style="cursor: pointer;">
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Palalang</td>
                                <td>Berat</td>
                                <td>08819283471</td>
                                <td>2025-01-15</td>
                                <td>
                                    <span class="short-desc">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium non, ullam tempore nihil...
                                    </span>
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

    <script>
        // Membatasi deskripsi hingga 15 kata
        document.querySelectorAll('.short-desc').forEach(function (element) {
            const fullText = element.innerText;
            const words = fullText.split(' ');
            if (words.length > 10) {
                element.innerText = words.slice(0, 10).join(' ') + '...';
            }
        });
    </script>
@endsection
