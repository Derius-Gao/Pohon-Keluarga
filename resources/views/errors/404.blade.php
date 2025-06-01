@extends('layout')

@section('title', 'Error-404')

@section('content')
<body>

  <main>
    <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>404</h1>
        <h2>The page you are looking for doesn't exist.</h2>
        <img src="href="{{ asset('vendor/img/not-found.svg') }} class="img-fluid py-5" alt="Page Not Found">
        <div class="credits">
          
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
        </div>
      </section>

    </div>
  </main><!-- End #main -->
  @endsection