@extends('layout2')

@section('title', 'Register')

@section('content')
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4"
    style="background: url('{{ asset('vendor/img/bg-loginn.jpeg') }}') no-repeat center center fixed; background-size: cover;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                    <a href="#" class="logo d-flex align-items-center w-auto">
                        <img src="{{ asset('vendor/img/logo.png') }}" alt="">
                        <span class="d-none d-lg-block">Register</span>
                    </a>
                </div>

                <div class="card mb-3" style="background: rgba(255, 255, 255, 0.5); backdrop-filter: blur(10px); border-radius: 15px; box-shadow: 0 0 15px rgba(0,0,0,0.3);">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Register A New Account</h5>
                            <p class="text-center small">Enter A New Email And Password</p>
                        </div>

                        <form action="{{ route('register.action') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-12">
                                <label for="name" class="form-label">Username</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" required autofocus>
                                <div class="invalid-feedback">Please enter Your Name.</div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email" required>
                                <div class="invalid-feedback">Please enter a new email.</div>
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Password" required>
                                <div class="invalid-feedback">Please enter your password!</div>
                            </div>

                            <div class="col-12">
                                <label>Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="laki-laki" required>
                                    <label class="form-check-label" for="laki">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" required>
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                                <div class="invalid-feedback">Please choose your gender.</div>
                            </div>

                            <div class="col-12">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" name="foto" class="form-control" accept="image/*" required>
                                <div class="invalid-feedback">Please upload a photo.</div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Register</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <p class="small">Sudah Punya Akun? <a href="{{ route('login') }}">Login</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
