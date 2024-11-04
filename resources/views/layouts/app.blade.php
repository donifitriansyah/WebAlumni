<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @include('includes.frontend.style')
    <title>@yield('title')</title>
</head>

<body>
    <!-- INI BAGIAN NAVBAR ATAS -->
    @include('includes.frontend.navbar')

    @yield('content')

    <!-- Tambahkan Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- INI BAGIAN FOOTER -->
    @include('includes.frontend.footer')
    @include('includes.frontend.script')

    <!-- Stack untuk scripts -->
    @stack('scripts')
</body>

</html>
