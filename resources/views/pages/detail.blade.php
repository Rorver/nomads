@extends('layout.app')

@section('title', 'Detail Travel')

@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
            <div class="row">
                <div class="col p-0">
                <nav>
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        Paket Travel
                    </li>
                    <li class="breadcrumb-item active">
                        Details
                    </li>
                    </ol>
                </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                <div class="card card-details">
                    <h1>Nusa Peninda</h1>
                    <P>
                    Republic of Indonesia Raya
                    </P>
                    <div class="gallery">
                    <div class="xzoom-container">
                        <img src="{{ url('FrontEnd/images/detail.jpg')}}" alt="Detail Gambar" class="xzoom" id="xzoom-default" xoriginal="FrontEnd/images/detail.jpg">
                    </div>
                    <div class="xzoom-thumbs">
                        <a href="{{ url('FrontEnd/images/detail.jpg')}}">
                        <img src="{{ url('FrontEnd/images/gambar1.jpg')}}" class="xzoom-gallery" width="151" xpreview="FrontEnd/images/detail.jpg">
                        </a>
                        <a href="{{ url('FrontEnd/images/detail.jpg')}}">
                        <img src="{{ url('FrontEnd/images/gambar2.jpg')}}" class="xzoom-gallery" width="151" xpreview="FrontEnd/images/detail.jpg">
                        </a>
                        <a href="{{ url('FrontEnd/images/detail.jpg')}}">
                        <img src="{{ url('FrontEnd/images/gambar3.jpg')}}" class="xzoom-gallery" width="151" xpreview="FrontEnd/images/detail.jpg">
                        </a>
                        <a href="{{ url('FrontEnd/images/detail.jpg')}}">
                        <img src="{{ url('FrontEnd/images/gambar4.jpg')}}" class="xzoom-gallery" width="151" xpreview="FrontEnd/images/detail.jpg">
                        </a>
                        <a href="{{ url('FrontEnd/images/detail.jpg')}}">
                        <img src="{{ url('FrontEnd/images/gambar5.jpg')}}" class="xzoom-gallery" width="151" xpreview="FrontEnd/images/detail.jpg">
                        </a>
                    </div>
                    </div>
                    <h2>Tentang Wisata</h2>
                    <p>
                    Nusa Penida is an island southeast of Indonesia’s island Bali and a district of Klungkung
                    Regency that includes the neighbouring small island of Nusa Lembongan. The Badung
                    Strait separates the island and Bali. The interior of Nusa Penida is hilly with a maximum
                    altitude of 524 metres. It is drier than the nearby island of Bali.
                    </p>
                    <p>
                    Bali and a district of Klungkung Regency that includes the neighbouring small island of
                    Nusa Lembongan. The Badung Strait separates the island and Bali.
                    </p>
                    <div class="features row">
                    <div class="col-md-4">
                        <div class="description">
                        <img src="{{ url('FrontEnd/images/ic_event.png')}}" alt="" class="features-image">
                        <div class="description">
                            <h3>Feature Event</h3>
                            <p>Tari Kecak</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4 border-start">
                        <div class="description">
                        <img src="{{ url('FrontEnd/images/ic_language.png')}}" alt="" class="features-image">
                        <div class="description">
                            <h3>Language</h3>
                            <p>Bahasa Indonesia</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4 border-start">
                        <div class="description">
                        <img src="{{ url('FrontEnd/images/ic_foods.png')}}" alt="" class="features-image">
                        <div class="description">
                            <h3>Foods</h3>
                            <p>Local Foods</p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-4">
                <div class="card card-details card-right">
                    <h2>Member are going</h2>
                    <div class="members my-2">
                    <img src="{{ url('FrontEnd/images/user1.jpg')}}" alt="" class="member-image mr-1">
                    <img src="{{ url('FrontEnd/images/user2.jpg')}}" alt="" class="member-image mr-1">
                    <img src="{{ url('FrontEnd/images/user3.jpg')}}" alt="" class="member-image mr-1">
                    <img src="{{ url('FrontEnd/images/user4.jpg')}}" alt="" class="member-image mr-1">
                    <img src="{{ url('FrontEnd/images/user5.jpg')}}" alt="" class="member-image mr-1">
                    </div>

                    <hr>
                    <h2>Trip information</h2>
                    <table class="trip-information">
                    <tr>
                        <th width="50%">Date of Departure</th>
                        <td width="50%" class="text-right">
                        22 Aug, 2019
                        </td>
                    </tr>
                    <tr>
                        <th width="50%">Duration</th>
                        <td width="50%" class="text-right">
                        4D 3N
                        </td>
                    </tr>
                    <tr>
                        <th width="50%">Type</th>
                        <td width="50%" class="text-right">
                        Open Trip
                        </td>
                    </tr>
                    <tr>
                        <th width="50%">Price</th>
                        <td width="50%" class="text-right">
                        $80,00 / person
                        </td>
                    </tr>
                    </table>
                </div>
                <div class="join-container">
                    <a href="{{ route('checkout')}}" class="btn d-grid gap-2 btn-join-now mt-3 my-2">
                    Join Now
                    </a>
                </div>
                </div>
            </div>
            </div>
        </section>
    </main>

@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('FrontEnd/libraries/xzoom/xzoom.css')}}">
@endpush

@push('addon-script')
    <script src="{{ url('FrontEnd/libraries/xzoom/xzoom.min.js')}}"></script>
    <script>
    $(document).ready(function () {
        $('.xzoom, .xzoom-gallery').xzoom ({
        zoomWidth: 500,
        title: false,
        tint: '#333',
        xoffset: 15
        });
    });
    </script>
@endpush
