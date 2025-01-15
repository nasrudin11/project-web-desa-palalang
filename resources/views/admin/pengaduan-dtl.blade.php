@extends('layouts.main-login')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="container py-3 px-4 rounded text-white" style="background-color: #D3F1DF;">
        <nav style="--bs-breadcrumb-divider: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%278%27 height=%278%27%3E%3Cpath d=%27M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z%27 fill=%27%23000000%27/%3E%3C/svg%3E');" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/dashboard-pengaduan" class="text-decoration-none text-dark">Dashboard</a>
                </li>
                <li class="breadcrumb-item text-dark" aria-current="page">
                    Pengaduan
                </li>
                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">
                    Detail Pengaduan
                </li>
            </ol>
        </nav>
    </div>    

    <div class="card mt-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Detail Pengaduan</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nama:</strong> John Doe</p>
                    <p><strong>Dusun:</strong> Palalang</p>
                    <p><strong>Jenis Aduan:</strong> Berat</p>
                </div>
                <div class="col-md-6">
                    <p><strong>No HP:</strong> 08819283471</p>
                    <p><strong>Tanggal:</strong> 2025-01-15</p>
                </div>
            </div>
            <hr>
            <h6><strong>Deskripsi Aduan:</strong></h6>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium non, ullam tempore nihil, aliquid qui magnam fugit distinctio nostrum reprehenderit perspiciatis? Facilis veritatis, error, animi rerum ad deleniti aut quis cum perspiciatis officia velit molestiae eos iste adipisci quos ex pariatur maxime beatae atque! Excepturi nam optio eos nobis sint.
            </p>
        </div>
    </div>

</div>
@endsection
