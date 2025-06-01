@extends('layout2')

@section('title', 'Login')

@section('content')
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4"
    style="background: url('{{ asset('vendor/img/bg-loginn.jpeg') }}') no-repeat center center fixed; background-size: cover;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                    <a href="#" class="logo d-flex align-items-center w-auto">
                        <img src="{{ asset('vendor/img/logo.png') }}" alt="">
                        <span class="d-none d-lg-block">Pohon Keluarga</span>
                    </a>
                </div>

                <div class="card mb-3" style="background: rgba(255, 255, 255, 0.5); backdrop-filter: blur(10px); border-radius: 15px; box-shadow: 0 0 15px rgba(0,0,0,0.3);">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                            <p class="text-center small">Enter your email & password to login</p>
                        </div>

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('login.action') }}" method="POST" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-12">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email" required autofocus>
                                <div class="invalid-feedback">Please enter your email.</div>
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Password" required>
                                <div class="invalid-feedback">Please enter your password!</div>
                            </div>

                            <div class="col-12">
                                {!! NoCaptcha::display() !!}
                                @error('g-recaptcha-response')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Login</button>
                            </div>

                            {!! NoCaptcha::renderJs() !!}
                        </form>

                        <div class="text-center mt-3">
                            <p class="small">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                        </div>
                         <div class="text-center mt-3">
                            <p class="small">Lupa Password? <a href="{{ route('password.request') }}">Reset Password</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
