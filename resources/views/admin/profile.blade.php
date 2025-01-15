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
                    Profile
                </li>
            </ol>
        </nav>
    </div>

    <div class="row mt-4">
        <div class="col-md-5 mb-4">
          <div class="card shadow border-0 text-center">
            <div class="card-body d-flex flex-column align-items-center">
                  <img src="" alt="" width="180px" height="180px" class="rounded-circle border border-primary mb-2">
                  <span class="poppins-bold mt-2">Admin</span>
                  <span class="poppins-medium mt-1">Operator Desa</span>
            </div>
          </div>
        </div>
    
        <div class="col-md-7">
            <div class="card shadow border-0">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reset-tab" data-bs-toggle="tab" data-bs-target="#reset" type="button" role="tab" aria-controls="reset" aria-selected="false">Reset Password</button>
                        </li>
                    </ul>
    
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                            
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="inputNama" class="col-form-label">Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputNama" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail" class="col-form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="inputNoTelp" class="col-form-label">No Telp</label>
                                        <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" id="inputNoTelp" name="no_tlp" value="{{ old('no_tlp') }}">
                                        @error('no_tlp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputFoto" class="col-form-label">Foto</label>
                                        <input type="file" class="form-control @error('gambar_profil') is-invalid @enderror" id="inputFoto" name="gambar_profil">
                                        @error('gambar_profil')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="reset" role="tabpanel" aria-labelledby="reset-tab">
                            <form action="" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Password Baru</label>
                                    <div class="col">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputConfirmPassword" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                    <div class="col">
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputConfirmPassword" name="password_confirmation">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Reset Password</button>
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
   

</div>
@endsection

