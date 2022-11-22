<!doctype html>
<html lang="th">

<head>
    <title>Booking - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
</head>

<body>
    @include('layouts.frontend.inc_navbar')
    <div class="bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12 col-lg-10 offset-lg-1">
                    <h1 class="fw-bold text-navy"><img src="{{ asset('frontend/images/icon-harbor.png') }}" alt="" class="me-2">Booking</h1>
                    <div class="lineR-left"></div>
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="" class="form-label"><b>From</b> <span class="text-muted fw-light">(City, Country/Region)</span></label>
                            <div class="box-location">
                                <input type="text" class="form-control borderR-6"
                                    placeholder="Location" />
                                <span class="icon-input bx bx-map text-muted"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label"><b>To</b> <span class="text-muted fw-light">(City, Country/Region)</span></label>
                            <div class="box-location">
                                <input type="text" class="form-control borderR-6"
                                    placeholder="Location" />
                                <span class="icon-input bx bx-map text-muted"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label"><b>Date</b></label>
                            <input type="date" class="form-control borderR-6" id="">
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label"><b>Duration</b></label>
                            <select class="form-select borderR-6" id="">
                                <option>1 week</option>
                                <option>2 weeks</option>
                                <option>3 weeks</option>
                                <option>4 weeks</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label w-100 d-none d-md-block">&nbsp;</label>
                            <button type="submit" class="btn btn-navy rounded-pill w-100"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </form>
                    <hr>
                    <h4 class="fw-bold">Result <span class="fw-normal">(10)</span></h4>
                    <div class="card card-body mb-3 rounded-3">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <ul class="timeline">
                                    <li class="timeline-item">
                                        <div class="timeline-marker dot-none"><i
                                                class='bx-xs bx bxs-circle text-red'></i></div>
                                        <div class="timeline-content pb-4">
                                            <label for="" class="form-label text-navy fs-12"><b>Sun, 02 Oct 2022,</b>
                                                LAEM CHABANG TH</label>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-marker dot-none"><i class='bx-sm bx bxs-map text-red'></i>
                                        </div>
                                        <div class="timeline-content pb-0">
                                            <label for="" class="form-label text-navy fs-12"><b>Fri, 04 Nov 2022,</b>
                                                LOME TG</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-3 bd-lr">
                                <p class="fs-12 text-muted mb-0">All in rate</p>
                                <div class="d-inline-flex">
                                    <div class="me-1">
                                        <h3 class="text-navy fw-bold">3578</h3>
                                    </div>
                                    <div class="fs-12 text-uppercase text-navy"><b>USD</b><br>/Container</div>
                                </div>
                            </div>
                            <div class="col-sm-3 text-center">
                                <a type="button" class="btn btn-red rounded-pill px-5" href="{{ url('/booking-info') }}">Booking</a>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body mb-3 rounded-3">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <ul class="timeline">
                                    <li class="timeline-item">
                                        <div class="timeline-marker dot-none"><i
                                                class='bx-xs bx bxs-circle text-red'></i></div>
                                        <div class="timeline-content pb-4">
                                            <label for="" class="form-label text-navy fs-12"><b>Sun, 02 Oct 2022,</b>
                                                LAEM CHABANG TH</label>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-marker dot-none"><i class='bx-sm bx bxs-map text-red'></i>
                                        </div>
                                        <div class="timeline-content pb-0">
                                            <label for="" class="form-label text-navy fs-12"><b>Fri, 04 Nov 2022,</b>
                                                LOME TG</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-3 bd-lr">
                                <p class="fs-12 text-muted mb-0">All in rate</p>
                                <div class="d-inline-flex">
                                    <div class="me-1">
                                        <h3 class="text-navy fw-bold">3578</h3>
                                    </div>
                                    <div class="fs-12 text-uppercase text-navy"><b>USD</b><br>/Container</div>
                                </div>
                            </div>
                            <div class="col-sm-3 text-center">
                                <a type="button" class="btn btn-red rounded-pill px-5" href="{{ url('/booking-info') }}">Booking</a>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body mb-3 rounded-3">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <ul class="timeline">
                                    <li class="timeline-item">
                                        <div class="timeline-marker dot-none"><i
                                                class='bx-xs bx bxs-circle text-red'></i></div>
                                        <div class="timeline-content pb-4">
                                            <label for="" class="form-label text-navy fs-12"><b>Sun, 02 Oct 2022,</b>
                                                LAEM CHABANG TH</label>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-marker dot-none"><i class='bx-sm bx bxs-map text-red'></i>
                                        </div>
                                        <div class="timeline-content pb-0">
                                            <label for="" class="form-label text-navy fs-12"><b>Fri, 04 Nov 2022,</b>
                                                LOME TG</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-3 bd-lr">
                                <p class="fs-12 text-muted mb-0">All in rate</p>
                                <div class="d-inline-flex">
                                    <div class="me-1">
                                        <h3 class="text-navy fw-bold">3578</h3>
                                    </div>
                                    <div class="fs-12 text-uppercase text-navy"><b>USD</b><br>/Container</div>
                                </div>
                            </div>
                            <div class="col-sm-3 text-center">
                                <a type="button" class="btn btn-red rounded-pill px-5" href="{{ url('/booking-info') }}">Booking</a>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body mb-3 rounded-3">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <ul class="timeline">
                                    <li class="timeline-item">
                                        <div class="timeline-marker dot-none"><i
                                                class='bx-xs bx bxs-circle text-red'></i></div>
                                        <div class="timeline-content pb-4">
                                            <label for="" class="form-label text-navy fs-12"><b>Sun, 02 Oct 2022,</b>
                                                LAEM CHABANG TH</label>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-marker dot-none"><i class='bx-sm bx bxs-map text-red'></i>
                                        </div>
                                        <div class="timeline-content pb-0">
                                            <label for="" class="form-label text-navy fs-12"><b>Fri, 04 Nov 2022,</b>
                                                LOME TG</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-3 bd-lr">
                                <p class="fs-12 text-muted mb-0">All in rate</p>
                                <div class="d-inline-flex">
                                    <div class="me-1">
                                        <h3 class="text-navy fw-bold">3578</h3>
                                    </div>
                                    <div class="fs-12 text-uppercase text-navy"><b>USD</b><br>/Container</div>
                                </div>
                            </div>
                            <div class="col-sm-3 text-center">
                                <a type="button" class="btn btn-red rounded-pill px-5" href="{{ url('/booking-info') }}">Booking</a>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body mb-3 rounded-3">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <ul class="timeline">
                                    <li class="timeline-item">
                                        <div class="timeline-marker dot-none"><i
                                                class='bx-xs bx bxs-circle text-red'></i></div>
                                        <div class="timeline-content pb-4">
                                            <label for="" class="form-label text-navy fs-12"><b>Sun, 02 Oct 2022,</b>
                                                LAEM CHABANG TH</label>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-marker dot-none"><i class='bx-sm bx bxs-map text-red'></i>
                                        </div>
                                        <div class="timeline-content pb-0">
                                            <label for="" class="form-label text-navy fs-12"><b>Fri, 04 Nov 2022,</b>
                                                LOME TG</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-3 bd-lr">
                                <p class="fs-12 text-muted mb-0">All in rate</p>
                                <div class="d-inline-flex">
                                    <div class="me-1">
                                        <h3 class="text-navy fw-bold">3578</h3>
                                    </div>
                                    <div class="fs-12 text-uppercase text-navy"><b>USD</b><br>/Container</div>
                                </div>
                            </div>
                            <div class="col-sm-3 text-center">
                                <a type="button" class="btn btn-red rounded-pill px-5" href="{{ url('/booking-info') }}">Booking</a>
                            </div>
                        </div>
                    </div>
                    <div class="py-3">
                        <div class="pagination justify-content-center">
                            <a href="#" class="prev disabled"><i class='fas fa-angle-left' ></i></a>
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
                            <a href="#" class="next"><i class='fas fa-angle-right' ></i></a>
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
        $('#linkMenuTop .nav-item').eq(4).addClass('active');
    </script>
</body>

</html>