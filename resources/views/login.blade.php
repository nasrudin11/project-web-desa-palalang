@extends('layouts.main2')

@section('content')

    <section class="login d-flex">
        <div class="login-left w-50 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-6">
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

                            <button type="submit" class="login mt-3">Login</button> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="login-right w-50 h-100">   
            <div id="carouselLoginFade" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/login/2.svg" class="d-block w-100" style="height: 100vh;" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="img/login/3.svg" class="d-block w-100" style="height: 100vh;" alt="Slide 2">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

