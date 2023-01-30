<!doctype html>
<html lang="th">

<head>
    <title>Prices - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
</head>

<body>
    @include('layouts.frontend.inc_navbar')
    <div class="bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12 col-lg-10 offset-lg-1">
                    <div class="box-white p-3 p-md-5">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="fw-bold text-navy">Result Quote</h1>
                                <div class="lineR-left"></div>
                                <div class="card card-body bg-navy text-white mb-3 rounded-3">
                                    <p class="text-uppercase mb-2 fw-medium"><i
                                            class='bx bx-anchor'></i>@if(isset($POL)) {{ $POL }} @endif<i
                                            class='bx bx-right-arrow-alt mx-2'></i> <i
                                            class='bx bx-anchor'></i>@if(isset($POD)) {{ $POD }} @endif</p>
                                    <p class="fs-12 mb-0">@if(isset($productQty)) {{ $productQty }} @endif Container •
                                        @if(isset($equipment_type)) {{ $equipment_type }} @endif • @if(isset($weight))
                                        {{ $weight }} @endif Kilograms •
                                        <?php
                                            $date = new DateTime($VDF_result);
                                            $dates = $VDF_result;
                                            $newdate = $date->format(DateTime::RFC822); 
                                            $explode = explode(" ",$newdate);
                                            $explodes = explode("-",$dates);
                                            echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                        ?> • Freight all kinds
                                    </p>
                                </div>
                                <h6 class="text-navy fw-bold">Please find next voyage departures with associated price
                                </h6>
                                @foreach ($Quote as $key => $val)
                                <div class="card card-body mb-3 rounded-3">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <ul class="timeline">
                                                <li class="timeline-item">
                                                    <div class="timeline-marker dot-none"><i
                                                            class='bx-xs bx bxs-circle text-red'></i></div>
                                                    <div class="timeline-content pb-4">
                                                        <label for="" class="form-label text-navy fs-12">
                                                            <b>
                                                                <?php
                                                                $date = new DateTime($val->VDF);
                                                                $dates = $val->VDF;
                                                                $newdate = $date->format(DateTime::RFC822); 
                                                                $explode = explode(" ",$newdate);
                                                                $explodes = explode("-",$dates);
                                                                echo $explode[0]." ".$explode[1]." ".$explode[2]." ".$explodes[0].",";
                                                                ?>
                                                            </b>
                                                            {{ $val->POL }}
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-marker dot-none"><i
                                                            class='bx-sm bx bxs-map text-red'></i>
                                                    </div>
                                                    <div class="timeline-content pb-0">
                                                        <label for="" class="form-label text-navy fs-12">
                                                            <b>
                                                                <?php
                                                                $date = new DateTime($val->VDT);
                                                                $dates = $val->VDT;
                                                                $newdate = $date->format(DateTime::RFC822); 
                                                                $explode = explode(" ",$newdate);
                                                                $explodes = explode("-",$dates);
                                                                echo $explode[0]." ".$explode[1]." ".$explode[2]." ".$explodes[0].",";
                                                                ?>
                                                            </b>
                                                            {{ $val->POD }}
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        @php
                                        $date = date('Y-m-d H:i:s');
                                        $day = $val->save_datetime;
                                        $stop_date = date('Y-m-d H:i:s', strtotime($day . ' +1 day'));
                                        @endphp
                                        @if($stop_date >= $date)
                                        <div class="col-md-6 col-lg-3 bd-lr">
                                            <p class="fs-12 text-muted mb-0">All in rate</p>
                                            <div class="d-inline-flex">
                                                <div class="me-1">
                                                    @if($val->privilege == 1)
                                                    <h3 class="text-navy fw-bold">{{ $val->special_rate }}</h3>
                                                    @else
                                                    <h3 class="text-navy fw-bold">{{ $val->rate }}</h3>
                                                    @endif
                                                </div>
                                                <div class="fs-12 text-uppercase text-navy"><b>USD</b><br>/Container
                                                </div>
                                            </div>
                                            <p class="fs-12 text-muted mb-0">Rate for general cargo <font color="red">(Non-DG)</font></p>
                                        </div>
                                        <div class="col-sm-3 text-center">
                                            @if($val->privilege == 1)
                                            <span class="badge bg-danger w-100 rounded-0">VALID : 24Hrs</span>
                                            <span
                                                class="badge bg-warning w-100 rounded-0 text-dark mb-2 position-relative">
                                                <div class="scrollDown">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </div>
                                                MEGA SALE
                                            </span>
                                            @endif
                                            <a type="button" class="btn btn-navy rounded-pill px-5"
                                                href="{{ url('/booking-info/'.$val->quote_code) }}">Booking</a>
                                        </div>
                                        @else
                                        <div class="col-md-6 col-lg-3 bd-lr">
                                            <p class="fs-12 text-muted mb-0">All in rate</p>
                                            <div class="d-inline-flex">
                                                <div class="me-1">
                                                    <h3 class="text-navy fw-bold">{{ $val->rate }}</h3>
                                                </div>
                                                <div class="fs-12 text-uppercase text-navy"><b>USD</b><br>/Container
                                                </div>
                                            </div>
                                            <p class="fs-12 text-muted mb-0">Rate for general cargo <font color="red">(Non-DG)</font></p>
                                        </div>
                                        <div class="col-sm-3 text-center">
                                            <a type="button" class="btn btn-navy rounded-pill px-5"
                                                href="{{ url('/booking-info/'.$val->quote_code) }}">Booking</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                                <div class="py-3">
                                    <div class="pagination justify-content-center">
                                        {{ $Quote->appends(Request::all())->links() }}
                                    </div>
                                </div>
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
        $('#linkMenuTop .nav-item').eq(3).addClass('active');

    </script>
</body>

</html>
