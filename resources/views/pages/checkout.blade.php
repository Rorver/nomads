@extends('layout.checkout')

@section('title', 'Checkout')

@section('content')
    <!--content utama-->
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
                        <li class="breadcrumb-item">
                        Details
                        </li>
                        <li class="breadcrumb-item active">
                        Checkout
                        </li>
                    </ol>
                    </nav>
                </div>
                </div>
                <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        @if ($errors -> any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors -> all() as $error )
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h1>Who is going ?</h1>
                        <P>
                            Trip to {{ $item -> travel_package -> title}}, {{ $item -> travel_package -> location}}
                        </P>
                        <div class="attendee">
                            <table class="table table-responesive-sm text-center">
                                <thead class="table-group-divider">
                                    <tr>
                                    <td>Picture</td>
                                    <td>Name</td>
                                    <td>Nationality</td>
                                    <td>VISA</td>
                                    <td>Passport</td>
                                    <td> </td>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @forelse ($item -> details as $detail)
                                        <tr>
                                            <td>
                                                <img src="https://ui-avatars.com/api/?name={{ $detail -> username }}" height="60" alt="" class="rounded-circle">
                                            </td>
                                            <td class="align-middle">
                                                {{ $detail -> username }}
                                            </td>
                                            <td class="align-middle">
                                                {{ $detail -> nationality }}
                                            </td>
                                            <td class="align-middle">
                                                {{ $detail -> is_visa ? '30 Days' : 'N/A' }}
                                            </td>
                                            <td class="align-middle">
                                                {{ \Carbon\Carbon::createFromDate($detail -> doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive'}}
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('checkout_remove', $detail -> id) }}">
                                                <img src="{{ url('FrontEnd/images/ic_remove.png')}}" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                No Visitor
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                    </div>
                    <div class="member mt-3">
                        <h2>Add Member</h2>
                        <form class="row row-cols-lg-auto g-3 align-items-center" method="POST" action="{{ route('checkout_create', $item -> id)}}">
                            @csrf
                            <div class="col-12">
                                <label for="username" class="visually-hidden">Name</label>
                                <input name="username" type="text" class="form-control mb-2 me-sm-2" id="username" placeholder="Username" required>
                            </div>

                            <div class="col-12">
                                <label for="nationality" class="visually-hidden">Nationality</label>
                                <input name="nationality" type="text" class="form-control mb-2 me-sm-2" style="width: 50px" id="nationality" required placeholder="Nationality">
                            </div>

                            <div class="col-12">
                                <label for="is_visa" class="visually-hidden">Visa</label>
                                <select name="is_visa" id="is_visa" class="form-select mb-2 me-sm-2" required>
                                    <Option value="" selected hidden>VISA</Option>
                                    <Option value="1">30 Days</Option>
                                    <Option value="0">N/A</Option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="doe_passport" class="visually-hidden">Doe Passport</label>
                                <div class="input-group mb-2 me-sm-2">
                                    <input type="text" name="doe_passport" class="form-control datepicker" id="doePassport" placeholder="DOE Passport">
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-add-now mb-2 px-4">
                                    Add Now
                                </button>
                            </div>
                        </form>
                        <h3 class="mt-2 mb-0">Note</h3>
                        <p class="disclaimer mb-0">
                        You are only able to invite member that has registered in Nomads.
                        </p>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                    <h2>Member are going</h2>
                    <h2>Checkout information</h2>
                    <table class="trip-information">
                        <tr>
                        <th width="50%">Members</th>
                        <td width="50%" class="text-right">
                            {{ $item -> details -> count() }} person
                        </td>
                        </tr>
                        <tr>
                        <th width="50%">Additional VISA</th>
                        <td width="50%" class="text-right">
                            $ {{ $item -> additional_visa }},00
                        </td>
                        </tr>
                        <tr>
                        <th width="50%">Trip Price</th>
                        <td width="50%" class="text-right">
                            $ {{ $item -> travel_package -> price}},00 / person
                        </td>
                        </tr>
                        <tr>
                        <th width="50%">Sub Total</th>
                        <td width="50%" class="text-right">
                            $ {{ $item -> transactions_total }},00
                        </td>
                        </tr>
                        <tr>
                        <th width="50%">Total (+Unique Code)</th>
                        <td width="50%" class="text-right text-total">
                            <Span class="text-blue">$ {{ $item -> transactions_total}},</Span>
                            <span class="text-orange">{{ mt_rand(0,99) }}</span>
                        </td>
                        </tr>
                    </table>
                    <hr>
                    <h2>Payment Instructions</h2>
                    <p class="payment-instructions">
                        Please complete your payment before to continue the wonderful trip
                    </p>
                    <div class="bank">
                        <div class="bank-item pb-3">
                        <img src="{{ url('FrontEnd/images/ic_bank.png')}}" alt="" class="bank-image">
                        <div class="description">
                            <h3>PT Nomads ID</h3>
                            <p>
                            0881 8829 8800
                            <br>
                            Bank Central Asia
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        </div>
                        <div class="bank-item pb-3">
                        <img src="{{ url('FrontEnd/images/ic_bank.png')}}" alt="" class="bank-image">
                        <div class="description">
                            <h3>PT Nomads ID</h3>
                            <p>
                            0881 8829 8800
                            <br>
                            Bank Central Asia
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        </div>
                    </div>
                    </div>
                    <div class="join-container">
                    <a href="{{ route('checkout_success', $item -> id)}}" class="btn d-grid gap-2 btn-join-now mt-3 my-2">
                        I Have Made Payment
                    </a>
                    </div>
                    <div class="text-center mt-3">
                    <a href="{{ route('detail', $item -> travel_package -> slug)}}" class="text-muted">
                        Cancel Booking
                    </a>
                </div>
                </div>
                </div>
            </div>
            </section>
        </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('FrontEnd/libraries/gijgo/css/gijgo.min.css')}}">
@endpush

@push('addon-script')
    <script src="{{ url('FrontEnd/libraries/gijgo/js/gijgo.min.js')}}"></script>
    <script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap5',
            icons: {
                rightIcon: '<img src="{{ url('FrontEnd/images/ic_doe.png')}}"/>'
                }
            })
    });
    </script>
@endpush
