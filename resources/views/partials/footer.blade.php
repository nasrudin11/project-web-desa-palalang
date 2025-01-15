<footer class="text-white pt-5 pb-3 px-4 mt-auto" style="background-color: #295e5e">
    <div class="container">
        <div class="row">
            <!-- Tentang Desa -->
            <div class="col-md-4 mb-3">
                <h5>Tentang Desa</h5>
                {!! $data->tentang_desa !!}
            </div>

            <!-- Link Cepat -->
            <div class="col-md-4 mb-3">
                <h5>Pelayanan Buka:</h5>
                <span class="fw-bold text-decoration-underline mb-4"></span>
                {!! $data->pelayanan !!}
            </div>

            <!-- Kontak -->
            <div class="col-md-4 mb-3">
                <h5>Official Info</h5>

                <!-- Menggunakan Font Awesome untuk ikon -->
                <p><i class="fas fa-map-marker-alt me-2"></i>{{ $data->alamat_desa }}</p>
                <p><i class="fas fa-phone-alt me-2"></i>{{ $data->no_kontak }}</p>
                <p><i class="fas fa-envelope me-2"></i>{{ $data->email_desa }}</p>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center mt-3">
            <p class="mb-0">&copy; 2025 Jamil. All Rights Reserved.</p>
        </div>
    </div>
</footer>
