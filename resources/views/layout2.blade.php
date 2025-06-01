<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Custom Auth Laravel')</title>
    <!-- NiceAdmin CSS -->
    <link href="{{ asset('vendor/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Tambahkan vendor CSS lain jika perlu -->
</head>
<body>
    @yield('content')
    <!-- NiceAdmin JS -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/js/main.js') }}"></script>
</body>
</html>