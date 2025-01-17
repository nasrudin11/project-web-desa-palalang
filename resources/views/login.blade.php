@extends('layouts.main2')

@section('content')

    <section class="login d-flex flex-column flex-md-row">
        <div class="login-left col-12 col-md-6 h-100 d-flex justify-content-center align-items-center">
            <img src="img/login.png" class="img-fluid" alt="Login">
        </div>
    
        <div class="login-right col-12 col-md-6 h-100 d-flex justify-content-center align-items-center">
            <div class="row justify-content-center w-100 h-100 align-items-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="header">
                        <h1>Welcome Back</h1>
                        <p>Welcome back! Please enter your details</p>
                    </div>

                    @if(session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
        
                    <div class="login-form">
                        <!-- Form Login -->
                        <form method="post" action="/login">
                            @csrf
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" autofocus required> 
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required> 
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <button type="submit" class="login mt-3 w-100">Login</button> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
