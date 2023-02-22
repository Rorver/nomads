<!--Navbar-->
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="{{ route('home')}}">
            <img src="{{ url('FrontEnd/images/logo_nomads.png')}}" alt="logo nomads">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navb">
        <span class="navbar-toggler-icon"></span>
        </button>

        <!--Navbar Menu-->
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ms-auto me-3">
            <li class="nav-item mx-md-2">
                <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item mx-md-2">
                <a class="nav-link" href="#">Paket Travel</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" id="navbardrop">
                Service
                </a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Link 1</a></li>
                <li><a class="dropdown-item" href="#">Link 2</a></li>
                <li><a class="dropdown-item" href="#">Link 3</a></li>
                </ul>
            </li>
            <li class="nav-item mx-md-2">
                <a class="nav-link" href="#">Testimonial</a>
            </li>
            </ul>

            @guest
            <!--Mobile Button-->
                <form action="" class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login my-2 my-sm-0" type="button"
                    onclick="event.preventDefault(); location.href='{{ url('login')}}';">
                    Masuk
                    </button>
                </form>

            <!--Desktop Button-->
                <form action="" class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login btn-navbar btn-navbar-right my-2 my-sm-0 px-4" type="button"
                    onclick="event.preventDefault(); location.href='{{ url('login')}}';">
                    Masuk
                    </button>
                </form>
            @endguest

            @auth
            <!--Mobile Button-->
                <form class="form-inline d-sm-block d-md-none" action="{{ url('logout')}}" method="POST">
                    @csrf
                    <button class="btn btn-login my-2 my-sm-0" type="submit">
                    Keluar
                    </button>
                </form>

            <!--Desktop Button-->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout')}}" method="POST">
                    @csrf
                    <button class="btn btn-login btn-navbar btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                    Keluar
                    </button>
                </form>
            @endauth

        </div>
    </nav>
</div>
