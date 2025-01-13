@extends('layouts.main-login')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Card Utama -->
            <div class="col mb-6 order-0">
                <div class="card">
                    <div class="d-flex align-items-start row">
                        <!-- Konten Selamat Datang -->
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h4 class="card-title text-primary mb-3">Selamat Datang Kembali! 🎉</h4>
                                <p class="mb-6">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic, beatae?
                                </p>
                            </div>
                        </div>
                        <!-- Gambar -->
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-6">
                                <img
                                    src="../assets/img/illustrations/man-with-laptop.png"
                                    height="120"
                                    class="scaleX-n1-rtl"
                                    alt="man with laptop" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row untuk 5 Cards -->
        <div class="row">
            <!-- Pengunjung Hari Ini -->
            <div class="col mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pengunjung</h5>
                        <h2 class="text-primary mb-0">0</h2>
                    </div>
                </div>
            </div>

            <!-- Pengunjung Total -->
            <div class="col mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pengunjung Total</h5>
                        <h2 class="text-success mb-0">0</h2>
                    </div>
                </div>
            </div>

            <!-- Berita -->
            <div class="col mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Berita</h5>
                        <h2 class="text-info mb-0">0</h2>
                    </div>
                </div>
            </div>

            <!-- Pengumuman -->
            <div class="col mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pengumuman</h5>
                        <h2 class="text-warning mb-0">0</h2>
                    </div>
                </div>
            </div>

            <!-- Total Pengaduan -->
            <div class="col mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Pengaduan</h5>
                        <h2 class="text-danger mb-0">0</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk mendapatkan nama hari
        function getDayName(dayIndex) {
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            return days[dayIndex];
        }
    
        // Fungsi untuk mendapatkan nama bulan
        function getMonthName(monthIndex) {
            const months = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];
            return months[monthIndex];
        }
    
        // Mendapatkan tanggal saat ini
        const currentDate = new Date();
        const dayName = getDayName(currentDate.getDay());
        const day = currentDate.getDate();
        const monthName = getMonthName(currentDate.getMonth());
        const year = currentDate.getFullYear();
    
        // Menampilkan hari dan tanggal di elemen HTML
        document.getElementById('day-name').textContent = dayName;
        document.getElementById('full-date').textContent = `${day}/${monthName}/${year}`;
    </script>

@endsection