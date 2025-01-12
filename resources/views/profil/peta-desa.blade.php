@extends('layouts.main2')

@section('content')

<div class="container my-3">
  <div class="container py-3 px-4 rounded text-dark" style="background-color: #d4edda;">
    <nav
      style="--bs-breadcrumb-divider: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%228%22 height=%228%22%3E%3Cpath d=%22M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z%22 fill=%22%23000000%22/%3E%3C/svg%3E');"
      aria-label="breadcrumb"
    >
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a href="/" class="text-decoration-none text-dark">Home</a>
        </li>
        <li class="breadcrumb-item active fw-bold" aria-current="page">
          Peta Desa
        </li>
      </ol>
    </nav>
  </div>
</div>

  <!-- Konten Berita -->

  <div class="container my-4">
    <div class="card border-0 py-3 px-3 shadow">
      <div class="card-body ">
        <h2 class="card-title">Peta Desa</h2>
        <div class="map-container">
          <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15839.329388277785!2d113.56453474478158!3d-7.028983437564136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd9da78e909d85b%3A0x91423c8c2fa9491e!2sPalalang%2C%20Pakong%2C%20Pamekasan%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1735818161467!5m2!1sen!2sid" 
              allowfullscreen="" 
              loading="lazy"    
              referrerpolicy="no-referrer-when-downgrade"
              style="width: 100%; height: 60vh; border: 0;">
          </iframe>
        </div>   
      </div>
    </div>

  </div>

    
@endsection
