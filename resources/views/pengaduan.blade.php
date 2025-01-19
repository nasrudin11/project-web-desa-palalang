@extends('layouts.main2')

@section('content')

  <div class="container my-3">
    <div class="container py-3 px-4 rounded text-dark" style="background-color: #D3F1DF;">
      <nav
        style="--bs-breadcrumb-divider: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%228%22 height=%228%22%3E%3Cpath d=%22M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z%22 fill=%22%23000000%22/%3E%3C/svg%3E');"
        aria-label="breadcrumb"
      >
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item">
            <a href="/" class="text-decoration-none text-dark">Home</a>
          </li>
          <li class="breadcrumb-item active fw-bold" aria-current="page">
            {{ $title }}
          </li>
        </ol>
      </nav>
    </div>
  </div>


  <!-- Konten Pengaduan -->
  <div class="container mb-4">
    <h2>Form Pengajuan Desa</h2>
    <div class="card border-0 py-3 px-3 shadow mx-auto" style="max-width: 600px;">
        <div class="card-body">
          <form id="formPengajuan">
              <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" required>
                  <div id="namaError" class="invalid-feedback">
                      Nama harus diisi.
                  </div>
              </div>
              <div class="mb-3">
                  <label for="nik" class="form-label">NIK</label>
                  <input type="text" class="form-control" id="nik" placeholder="Nomor Induk Kependudukan" required>
                  <div id="nikError" class="invalid-feedback">
                      NIK harus diisi dengan 16 digit.
                  </div>
              </div>
              <div class="mb-3">
                  <label for="no-kk" class="form-label">Nomor KK</label>
                  <input type="text" class="form-control" id="no-kk" placeholder="Nomor Kartu Keluarga" required>
                  <div id="noKkError" class="invalid-feedback">
                      Nomor KK harus diisi dengan 16 digit.
                  </div>
              </div>
              <div class="mb-3">
                  <label for="jenis-pengajuan" class="form-label">Jenis Pengajuan</label>
                  <select class="form-select" id="jenis-pengajuan" required>
                      <option value="" disabled selected>-- Pilih Jenis Pengajuan --</option>
                      <option value="Pembuatan KTP">Pembuatan KTP</option>
                      <option value="Pembuatan KK">Pembuatan KK</option>
                      <option value="Pembuatan Akta Kelahiran">Pembuatan Akta Kelahiran</option>
                      <option value="Pengajuan Lainnya">Pengajuan Lainnya</option>
                  </select>
                  <div id="jenisPengajuanError" class="invalid-feedback">
                      Pilih Jenis Pengajuan.
                  </div>
              </div>
              <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
        </div>
    </div>
</div>


<script>
  document.getElementById("formPengajuan").addEventListener("submit", function (event) {
      event.preventDefault(); // Mencegah reload halaman

      // Reset error messages and invalid class
      document.getElementById("namaError").style.display = "none";
      document.getElementById("nikError").style.display = "none";
      document.getElementById("noKkError").style.display = "none";
      document.getElementById("jenisPengajuanError").style.display = "none";
      document.getElementById("nama").classList.remove("is-invalid");
      document.getElementById("nik").classList.remove("is-invalid");
      document.getElementById("no-kk").classList.remove("is-invalid");
      document.getElementById("jenis-pengajuan").classList.remove("is-invalid");

      // Ambil data dari form
      const nama = document.getElementById("nama").value.trim();
      const nik = document.getElementById("nik").value.trim();
      const noKk = document.getElementById("no-kk").value.trim();
      const jenisPengajuan = document.getElementById("jenis-pengajuan").value;

      let isValid = true;

      // Validasi Nama
      if (nama === "") {
          document.getElementById("nama").classList.add("is-invalid");
          document.getElementById("namaError").style.display = "block";
          isValid = false;
      }

      // Validasi NIK (harus 16 digit)
      if (nik === "" || !/^\d{16}$/.test(nik)) {
          document.getElementById("nik").classList.add("is-invalid");
          document.getElementById("nikError").style.display = "block";
          isValid = false;
      }

      // Validasi Nomor KK (harus 16 digit)
      if (noKk === "" || !/^\d{16}$/.test(noKk)) {
          document.getElementById("no-kk").classList.add("is-invalid");
          document.getElementById("noKkError").style.display = "block";
          isValid = false;
      }

      // Validasi Jenis Pengajuan
      if (jenisPengajuan === "") {
          document.getElementById("jenis-pengajuan").classList.add("is-invalid");
          document.getElementById("jenisPengajuanError").style.display = "block";
          isValid = false;
      }

      // Jika form valid, kirim ke WhatsApp
      if (isValid) {
          // Format pesan WhatsApp dengan markdown
          const message = `
*Pengajuan Desa Baru*

Halo, saya ingin melakukan pengajuan dengan rincian sebagai berikut:

- *Nama*: ${nama}
- *NIK*: ${nik}
- *Nomor KK*: ${noKk}
- *Jenis Pengajuan*: *${jenisPengajuan}*

Mohon untuk ditindaklanjuti. Terima kasih!
          `;

          // Nomor WhatsApp tujuan (ganti dengan nomor tujuan Anda)
          const waNumber = "62859106504333"; // Format nomor: tanpa "+" dan awali dengan kode negara

          // Buat URL WhatsApp
          const waUrl = `https://wa.me/${waNumber}?text=${encodeURIComponent(message)}`;

          // Redirect ke WhatsApp
          window.open(waUrl, "_blank");
      }
  });
</script>


    
@endsection
<!-- 6285606136076 -->