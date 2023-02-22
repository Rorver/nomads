<!DOCTYPE html>
<html lang="en" dir="ltr"></html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @include('includes.link')

</head>
<body>
    <!--Navbar-->
    @include('includes.navbar-alternate')

    <!--Main Content-->
    @yield('content')

</body>
</html>
