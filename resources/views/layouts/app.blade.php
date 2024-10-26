<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @include('includes.frontend.style')
    <title>@yield('title')</title>
</head>

<body>
    <!-- INI BAGIAN NAVBAR ATAS -->
    @include('includes.frontend.navbar')

    @yield('content')


</body>

</html>

<!-- INI BAGIAN CONTACT -->


<!-- INI BAGIAN FOOTER -->
@include('includes.frontend.footer')
@include('includes.frontend.script')



</body>

</html>
