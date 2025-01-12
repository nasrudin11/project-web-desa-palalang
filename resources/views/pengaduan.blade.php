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
            Pengaduan
          </li>
        </ol>
      </nav>
    </div>
  </div>


  <!-- Konten Pengaduan -->

  <div class="container my-4">
    <h2>Form Pengaduan Desa</h2>
    <div class="card border-0 py-3 px-3 shadow mx-auto" style="max-width: 600px;">
      <div class="card-body">
        <form>
          <div class="mb-3 row">
            <div class="col-md-6">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap">
            </div>
            <div class="col-md-6">
              <label for="jenis-aduan" class="form-label">Dusun</label>
              <select class="form-select" id="jenis-aduan">
                <option selected>-- Pilih Dusun --</option>
                <option value="1">Palalang</option>
                <option value="2">Pogag</option>
                <option value="3">Sorok</option>
                <option value="4">Pandiyan</option>
              </select>
            </div>
          </div>
  
          <div class="mb-3 row">
            <div class="col-md-6">
              <label for="jenis-aduan" class="form-label">Jenis Aduan</label>
              <select class="form-select" id="jenis-aduan">
                <option selected>-- Jenis Aduan --</option>
                <option value="1">Ringan</option>
                <option value="2">Berat</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="nomor-hp" class="form-label">Nomor HP</label>
              <input type="text" class="form-control" id="nomor-hp" placeholder="Nomor HP">
            </div>
          </div>
  
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Sesuai KTP</label>
            <input type="text" class="form-control" id="alamat" placeholder="Alamat">
          </div>
  
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" rows="4" placeholder="Deskripsi"></textarea>
          </div>
  
          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
  

    
@endsection
