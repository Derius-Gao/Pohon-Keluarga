@php
    $headerTitle = \App\Models\Setting::getValue('header_title', 'Sigma');
    $logoPath = \App\Models\Setting::getValue('logo_path', null);
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', \App\Models\Setting::getValue('site_title', 'Custom Auth Laravel'))</title>
  
    <!-- Google Fonts & Vendor CSS -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    <style>
      body {
        background-color: #cce7ff; /* Biru muda */
        padding-top: 70px; /* Tinggi navbar fixed */
      }
      /* Logo + Title Navbar Alignment */
      .navbar-brand {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        font-size: 1.25rem;
        white-space: nowrap;
      }
      .navbar-brand img {
        max-height: 32px;
      }
      /* Responsive tweak: hide text if very narrow */
      @media (max-width: 350px) {
        .navbar-brand span {
          display: none;
        }
      }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/dashboard') }}">
      @if($logoPath)
        <img src="{{ asset('storage/' . $logoPath) }}" alt="Logo" />
      @endif
      <span>{{ $headerTitle }}</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      @include('includee.header')
    </div>
  </div>
</nav>
    <main class="container-fluid px-5 mt-4">
        @yield('content')
    </main>

    @include('includee.footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>