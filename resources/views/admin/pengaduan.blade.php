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
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Palalang</td>
                                <td>Berat</td>
                                <td>08819283471</td>
                                <td>Tanggal</td>
                                <td>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium non, ullam tempore nihil, aliquid qui magnam fugit distinctio nostrum reprehenderit perspiciatis? Facilis veritatis, error, animi rerum ad deleniti aut quis cum perspiciatis officia velit molestiae eos iste adipisci quos ex pariatur maxime beatae atque! Excepturi nam optio eos nobis sint.
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>John Doe</td>
                                <td>Palalang</td>
                                <td>Berat</td>
                                <td>08819283471</td>
                                <td>Tanggal</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus alias nisi fugit, illum laboriosam modi culpa ratione dicta rerum officia ex cupiditate facilis, tempore aliquam recusandae eos. Quasi molestias optio nesciunt velit voluptatem nostrum vitae inventore ut ducimus fugit. Saepe enim reiciendis mollitia omnis veniam tempore nesciunt sunt commodi ea!</td>
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