<!DOCTYPE html>
<html lang="en" dir="ltr"></html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @method('prepend-style')
    @include('includes.link')
    @method('addon-style')
</head>
<body>
    <!--Navbar-->
    @include('includes.navbar')

    <!--Main Content-->
    @yield('content')

    <!--Footer-->
    @include('includes.footer')

    <!--Script-->
    @method('prepend-script')
    @include('includes.scripts')
    @method('addon-script')
</body>
</html>
