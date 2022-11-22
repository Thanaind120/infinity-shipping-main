<!doctype html>
<html lang="th">

<head>
    <title>Schedules - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
</head>

<body>
    @include('layouts.frontend.inc_navbar')
    <div class="bg-light">
        <div class="container-fluid cf-50 py-5">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h1 class="fw-bold text-navy">Schedules</h1>
                    <div class="lineR-left"></div>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card p-3 mb-3">
                                <form class="row">
                                    <div class="col-12 col-md-4 col-xl-12">
                                        <label for="" class="form-label"><b>Place of receipt</b></label>
                                        <div class="box-location">
                                            <input type="text" class="form-control borderR-6" placeholder="Location" />
                                            <span class="icon-input bx bx-map text-muted"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-block d-md-none d-xl-block">
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-12 mb-3">
                                        <label for="" class="form-label"><b>From</b><span
                                                class="text-muted fw-light">(City, Country/Region)</span></label>
                                        <div class="box-location mb-1">
                                            <input type="text" class="form-control borderR-6" placeholder="Location" />
                                            <span class="icon-input bx bx-map text-muted"></span>
                                        </div>
                                        <!-- <div class="form-check">
                                            <input class="form-check-input" type="radio" name="from" id="from1" checked>
                                            <label class="form-check-label" for="from1">
                                                Merchant Haulage (CY)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="from" id=from2">
                                            <label class="form-check-label" for="from2">
                                                Carrier Haulage (SD)
                                            </label>
                                        </div> -->
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-12">
                                        <label for="" class="form-label"><b>To</b><span
                                                class="text-muted fw-light">(City, Country/Region)</span></label>
                                        <div class="box-location mb-1">
                                            <input type="text" class="form-control borderR-6" placeholder="Location" />
                                            <span class="icon-input bx bx-map text-muted"></span>
                                        </div>
                                        <!-- <div class="form-check">
                                            <input class="form-check-input" type="radio" name="to" id="to1" checked>
                                            <label class="form-check-label" for="to1">
                                                Merchant Haulage (CY)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="to" id=to2">
                                            <label class="form-check-label" for="to2">
                                                Carrier Haulage (SD)
                                            </label>
                                        </div> -->
                                    </div>
                                    <div class="col-12 d-block d-md-none d-xl-block">
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-12">
                                        <label for="" class="form-label"><b>Date</b></label>
                                        <select class="form-select mb-2">
                                            <option value="1">Departing</option>
                                            <option value="2">Arriving by</option>
                                        </select>
                                        <input type="date" class="form-control" id="">
                                    </div>
                                    <div class="col-12 d-block d-md-none d-xl-block">
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-12">
                                        <label for="" class="form-label"><b>Container type</b></label>
                                        <select class="form-select mb-1">
                                            <option value="1">20' Dry Standard</option>
                                            <option value="2">20' Dry High Cube</option>
                                            <option value="3">40' Dry High Cube</option>
                                        </select>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Cargo requires
                                                temperature control</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-12 pt-3">
                                        <button type="submit" class="btn btn-navy rounded-pill w-100"><i
                                            class="fas fa-search"></i> Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            <p>Search result for <b>Bangkok, Thailand (CY)</b> to <b>Jakarta, Indonesia (CY)</b></p>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <i class="bx bxs-map text-red bx-sm"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <p class="mb-0">Departure</p>
                                                    <b>03 Oct 2022</b><br>
                                                    <u class="text-navy fw-bold">Lat Krabang</u>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <i class="bx bxs-map text-red bx-sm"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <p class="mb-0">Arrival</p>
                                                    <b>13 Oct 2022</b><br>
                                                    <u class="text-navy fw-bold">PT New Priok Container Terminal One</u>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset('frontend/images/icon-harbor.png') }}" alt="" width="24px">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <p class="mb-0">Vessal/Voyage</p>
                                                    <u class="text-navy fw-bold">BUXFAVOURITE</u> 240S<br>
                                                    Transit Time: <b>10 Days</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 text-center align-self-center">
                                            <a href="{{ url('/price') }}" class="btn btn-navy rounded-pill mb-2 btn-w130">Get a quote</a>
                                            <br>
                                            <a href="{{ url('/booking-info') }}" class="btn btn-red rounded-pill btn-w130">Booking</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p class="mb-0"><i class="bx bx-time text-red bx-sm"></i> <b>Deadlines</b>
                                            </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="fs-12">Container gate-in</span><br>
                                            <b class="small">02 Oct 2022, 05:00</b>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="fs-12">Shipping Instructions</span><br>
                                            <b class="small">N/A</b>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="fs-12">Shipping Instructions - AMS</span><br>
                                            <b class="small">N/A</b>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="fs-12">Verified Gross Mass</span><br>
                                            <b class="small">03 Oct 2022, 01:00</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <button class="btn btn-more" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseExample" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        <i class='fas fa-chevron-down me-1'></i> Show route details
                                    </button>
                                    <div class="collapse pt-2" id="collapseExample">
                                        <ul class="timeline timeline-split">
                                            <li class="timeline-item">
                                                <div class="timeline-info">
                                                    <span>Bangkok</span><br>
                                                    <span class="fs-12">Lat Krabang</span>
                                                </div>
                                                <div class="timeline-marker dot-none">
                                                    <i class='bx-xs bx bxs-circle text-red'></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Transport via truck</label>
                                                    <p class="fs-12 mb-0">03 Oct 2022, 05:00</p>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-info">
                                                    <span>Laem Chabang</span><br>
                                                    <span class="fs-12">Laem Chabang Port AO</span>
                                                </div>
                                                <div class="timeline-marker dot-none">
                                                    <i class='bx-xs bx bxs-circle text-red'></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Arrival</label>
                                                    <p class="fs-12 mb-0">03 Oct 2022, 09:00</p>
                                                </div>
                                            </li>
                                            <li class="timeline-item img">
                                                <div class="timeline-info"></div>
                                                <div class="timeline-marker dot-none">
                                                    <img src="{{ asset('frontend/images/icon-harbor.png') }}" alt="">
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Departing on <u class="text-navy">BUXFAVOURITE / 240S</u></label>
                                                    <p class="fs-12 mb-0">03 Oct 2022, 09:00</p>
                                                    <div class="table-responsive">
                                                        <table class="table border">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th>IMO Number</th>
                                                                    <th>Flag</th>
                                                                    <th>Built</th>
                                                                    <th>Service</th>
                                                                    <th>Call Sign</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="text-center">
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>THA1</td>
                                                                    <td>THA1</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-info">
                                                    <span>Tanjung Pelepas</span><br>
                                                    <span class="fs-12">Pelabuhan Tanjung Pelepas Terminal</span>
                                                </div>
                                                <div class="timeline-marker dot-none">
                                                    <i class='bx-xs bx bxs-circle text-red'></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Arrival</label>
                                                    <p class="fs-12 mb-0">06 Oct 2022, 14:00</p>
                                                </div>
                                            </li>
                                            <li class="timeline-item img">
                                                <div class="timeline-info"></div>
                                                <div class="timeline-marker dot-none">
                                                    <img src="{{ asset('frontend/images/icon-harbor.png') }}" alt="">
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Departing on <u class="text-navy">NAVIOS LAPIS / 2395</u></label>
                                                    <p class="fs-12 mb-0">10 Oct 2022, 09:00</p>
                                                    <div class="table-responsive">
                                                        <table class="table border">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th>IMO Number</th>
                                                                    <th>Flag</th>
                                                                    <th>Built</th>
                                                                    <th>Service</th>
                                                                    <th>Call Sign</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="text-center">
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>Intra Asia 3</td>
                                                                    <td>-</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-info">
                                                    <span>Jakarta</span><br>
                                                    <span class="fs-12">PT Mew Priok Container Terminal One</span>
                                                </div>
                                                <div class="timeline-marker dot-none">
                                                    <i class='bx-sm bx bxs-map text-red'></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Arrival</label>
                                                    <p class="fs-12 mb-0">13 Oct 2022, 01:00</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <i class="bx bxs-map text-red bx-sm"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <p class="mb-0">Departure</p>
                                                    <b>03 Oct 2022</b><br>
                                                    <u class="text-navy fw-bold">Lat Krabang</u>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <i class="bx bxs-map text-red bx-sm"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <p class="mb-0">Arrival</p>
                                                    <b>13 Oct 2022</b><br>
                                                    <u class="text-navy fw-bold">PT New Priok Container Terminal One</u>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset('frontend/images/icon-harbor.png') }}" alt="" width="24px">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <p class="mb-0">Vessal/Voyage</p>
                                                    <u class="text-navy fw-bold">BUXFAVOURITE</u> 240S<br>
                                                    Transit Time: <b>10 Days</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 text-center align-self-center">
                                            <a href="{{ url('/price') }}" class="btn btn-navy rounded-pill mb-2 btn-w130">Get a quote</a>
                                            <br>
                                            <a href="{{ url('/booking-info') }}" class="btn btn-red rounded-pill btn-w130">Booking</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p class="mb-0"><i class="bx bx-time text-red bx-sm"></i> <b>Deadlines</b>
                                            </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="fs-12">Container gate-in</span><br>
                                            <b class="small">02 Oct 2022, 05:00</b>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="fs-12">Shipping Instructions</span><br>
                                            <b class="small">N/A</b>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="fs-12">Shipping Instructions - AMS</span><br>
                                            <b class="small">N/A</b>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="fs-12">Verified Gross Mass</span><br>
                                            <b class="small">03 Oct 2022, 01:00</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <button class="btn btn-more" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseExample2" aria-expanded="false"
                                        aria-controls="collapseExample2">
                                        <i class='fas fa-chevron-down me-1'></i> Show route details
                                    </button>
                                    <div class="collapse pt-2" id="collapseExample2">
                                        <ul class="timeline timeline-split">
                                            <li class="timeline-item">
                                                <div class="timeline-info">
                                                    <span>Bangkok</span><br>
                                                    <span class="fs-12">Lat Krabang</span>
                                                </div>
                                                <div class="timeline-marker dot-none">
                                                    <i class='bx-xs bx bxs-circle text-red'></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Transport via truck</label>
                                                    <p class="fs-12 mb-0">03 Oct 2022, 05:00</p>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-info">
                                                    <span>Laem Chabang</span><br>
                                                    <span class="fs-12">Laem Chabang Port AO</span>
                                                </div>
                                                <div class="timeline-marker dot-none">
                                                    <i class='bx-xs bx bxs-circle text-red'></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Arrival</label>
                                                    <p class="fs-12 mb-0">03 Oct 2022, 09:00</p>
                                                </div>
                                            </li>
                                            <li class="timeline-item img">
                                                <div class="timeline-info"></div>
                                                <div class="timeline-marker dot-none">
                                                    <img src="{{ asset('frontend/images/icon-harbor.png') }}" alt="">
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Departing on <u class="text-navy">BUXFAVOURITE / 240S</u></label>
                                                    <p class="fs-12 mb-0">03 Oct 2022, 09:00</p>
                                                    <div class="table-responsive">
                                                        <table class="table border">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th>IMO Number</th>
                                                                    <th>Flag</th>
                                                                    <th>Built</th>
                                                                    <th>Service</th>
                                                                    <th>Call Sign</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="text-center">
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>THA1</td>
                                                                    <td>THA1</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-info">
                                                    <span>Tanjung Pelepas</span><br>
                                                    <span class="fs-12">Pelabuhan Tanjung Pelepas Terminal</span>
                                                </div>
                                                <div class="timeline-marker dot-none">
                                                    <i class='bx-xs bx bxs-circle text-red'></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Arrival</label>
                                                    <p class="fs-12 mb-0">06 Oct 2022, 14:00</p>
                                                </div>
                                            </li>
                                            <li class="timeline-item img">
                                                <div class="timeline-info"></div>
                                                <div class="timeline-marker dot-none">
                                                    <img src="{{ asset('frontend/images/icon-harbor.png') }}" alt="">
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Departing on <u class="text-navy">NAVIOS LAPIS / 2395</u></label>
                                                    <p class="fs-12 mb-0">10 Oct 2022, 09:00</p>
                                                    <div class="table-responsive">
                                                        <table class="table border">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th>IMO Number</th>
                                                                    <th>Flag</th>
                                                                    <th>Built</th>
                                                                    <th>Service</th>
                                                                    <th>Call Sign</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="text-center">
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>Intra Asia 3</td>
                                                                    <td>-</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-info">
                                                    <span>Jakarta</span><br>
                                                    <span class="fs-12">PT Mew Priok Container Terminal One</span>
                                                </div>
                                                <div class="timeline-marker dot-none">
                                                    <i class='bx-sm bx bxs-map text-red'></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Arrival</label>
                                                    <p class="fs-12 mb-0">13 Oct 2022, 01:00</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <i class="bx bxs-map text-red bx-sm"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <p class="mb-0">Departure</p>
                                                    <b>03 Oct 2022</b><br>
                                                    <u class="text-navy fw-bold">Lat Krabang</u>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <i class="bx bxs-map text-red bx-sm"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <p class="mb-0">Arrival</p>
                                                    <b>13 Oct 2022</b><br>
                                                    <u class="text-navy fw-bold">PT New Priok Container Terminal One</u>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset('frontend/images/icon-harbor.png') }}" alt="" width="24px">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <p class="mb-0">Vessal/Voyage</p>
                                                    <u class="text-navy fw-bold">BUXFAVOURITE</u> 240S<br>
                                                    Transit Time: <b>10 Days</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 text-center align-self-center">
                                            <a href="{{ url('/price') }}" class="btn btn-navy rounded-pill mb-2 btn-w130">Get a quote</a>
                                            <br>
                                            <a href="{{ url('/booking-info') }}" class="btn btn-red rounded-pill btn-w130">Booking</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p class="mb-0"><i class="bx bx-time text-red bx-sm"></i> <b>Deadlines</b>
                                            </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="fs-12">Container gate-in</span><br>
                                            <b class="small">02 Oct 2022, 05:00</b>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="fs-12">Shipping Instructions</span><br>
                                            <b class="small">N/A</b>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="fs-12">Shipping Instructions - AMS</span><br>
                                            <b class="small">N/A</b>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="fs-12">Verified Gross Mass</span><br>
                                            <b class="small">03 Oct 2022, 01:00</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <button class="btn btn-more" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseExample3" aria-expanded="false"
                                        aria-controls="collapseExample3">
                                        <i class='fas fa-chevron-down me-1'></i> Show route details
                                    </button>
                                    <div class="collapse pt-2" id="collapseExample3">
                                        <ul class="timeline timeline-split">
                                            <li class="timeline-item">
                                                <div class="timeline-info">
                                                    <span>Bangkok</span><br>
                                                    <span class="fs-12">Lat Krabang</span>
                                                </div>
                                                <div class="timeline-marker dot-none">
                                                    <i class='bx-xs bx bxs-circle text-red'></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Transport via truck</label>
                                                    <p class="fs-12 mb-0">03 Oct 2022, 05:00</p>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-info">
                                                    <span>Laem Chabang</span><br>
                                                    <span class="fs-12">Laem Chabang Port AO</span>
                                                </div>
                                                <div class="timeline-marker dot-none">
                                                    <i class='bx-xs bx bxs-circle text-red'></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Arrival</label>
                                                    <p class="fs-12 mb-0">03 Oct 2022, 09:00</p>
                                                </div>
                                            </li>
                                            <li class="timeline-item img">
                                                <div class="timeline-info"></div>
                                                <div class="timeline-marker dot-none">
                                                    <img src="{{ asset('frontend/images/icon-harbor.png') }}" alt="">
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Departing on <u class="text-navy">BUXFAVOURITE / 240S</u></label>
                                                    <p class="fs-12 mb-0">03 Oct 2022, 09:00</p>
                                                    <div class="table-responsive">
                                                        <table class="table border">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th>IMO Number</th>
                                                                    <th>Flag</th>
                                                                    <th>Built</th>
                                                                    <th>Service</th>
                                                                    <th>Call Sign</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="text-center">
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>THA1</td>
                                                                    <td>THA1</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-info">
                                                    <span>Tanjung Pelepas</span><br>
                                                    <span class="fs-12">Pelabuhan Tanjung Pelepas Terminal</span>
                                                </div>
                                                <div class="timeline-marker dot-none">
                                                    <i class='bx-xs bx bxs-circle text-red'></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Arrival</label>
                                                    <p class="fs-12 mb-0">06 Oct 2022, 14:00</p>
                                                </div>
                                            </li>
                                            <li class="timeline-item img">
                                                <div class="timeline-info"></div>
                                                <div class="timeline-marker dot-none">
                                                    <img src="{{ asset('frontend/images/icon-harbor.png') }}" alt="">
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Departing on <u class="text-navy">NAVIOS LAPIS / 2395</u></label>
                                                    <p class="fs-12 mb-0">10 Oct 2022, 09:00</p>
                                                    <div class="table-responsive">
                                                        <table class="table border">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th>IMO Number</th>
                                                                    <th>Flag</th>
                                                                    <th>Built</th>
                                                                    <th>Service</th>
                                                                    <th>Call Sign</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="text-center">
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>Intra Asia 3</td>
                                                                    <td>-</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-info">
                                                    <span>Jakarta</span><br>
                                                    <span class="fs-12">PT Mew Priok Container Terminal One</span>
                                                </div>
                                                <div class="timeline-marker dot-none">
                                                    <i class='bx-sm bx bxs-map text-red'></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <label for="" class="form-label mb-0">Arrival</label>
                                                    <p class="fs-12 mb-0">13 Oct 2022, 01:00</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="py-3">
                                <div class="pagination justify-content-center">
                                    <a href="#" class="prev disabled"><i class='fas fa-angle-left'></i></a>
                                    <ol>
                                        <li class="active"><a href="#1">1</a></li>
                                        <li><a href="#2">2</a></li>
                                        <li><a href="#3">3</a></li>
                                        <li><a href="#4">4</a></li>
                                        <li><a href="#5">5</a></li>
                                        <li><a href="#6">6</a></li>
                                        <li><a href="#7">7</a></li>
                                        <li><a href="#8">8</a></li>
                                    </ol>
                                    <a href="#" class="next"><i class='fas fa-angle-right'></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="finishQuoteModal" tabindex="-1" aria-labelledby="finishQuoteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content borderR-25 p-4">
                <div class="modal-body text-center">
                    <i class='bx bx-check-circle text-green fs-9 mb-3'></i>
                    <h5 class="fw-bold" id="finishQuoteModalLabel">We have successfully received your request for
                        quotation.</h5>
                    <p>When we have already evaluated, you can check the price information on <a href=""
                            class="text-navy">your account page.</a></p>
                    <div class="text-center pt-4">
                        <button type="button" class="btn btn-navy rounded-pill px-4"
                            data-bs-dismiss="modal">OK</button><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.frontend.inc_footer') 
    <script>
        $('#linkMenuTop .nav-item').eq(5).addClass('active');
    </script>
    <script>
        $(".btn-more").click(function () {
            if ($(".btn-more").hasClass("collapsed")) {
                $(this).html("<i class='fas fa-chevron-down me-1'></i> Show route details");
            } else {
                $(this).html("<i class='fas fa-chevron-up me-1'></i> Hide route details");
            }

            $(".btn-more").toggleClass("collapsed");
        });
    </script>
</body>

</html>