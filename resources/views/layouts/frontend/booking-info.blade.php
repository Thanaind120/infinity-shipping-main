<!doctype html>
<html lang="th">

<head>
    <title>Booking Information - Infinity Shipping (Thailand)Co.,Ltd.</title>
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
                                <h1 class="fw-bold text-navy">Booking Information</h1>
                                <div class="lineR-left"></div>
                                <form class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="" class="form-label"><b>Company</b></label>
                                        <input type="text" class="form-control borderR-6" id="" placeholder="Enter company name">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label"><b>Customer name</b></label>
                                        <input type="text" class="form-control borderR-6" id="" placeholder="Enter name">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label"><b>Booking Party</b></label>
                                        <input type="text" class="form-control borderR-6" id="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label"><b>Actual Shipper</b></label>
                                        <input type="text" class="form-control borderR-6" id="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label"><b>POL</b></span></label>
                                        <div class="box-location">
                                            <input type="text" class="form-control borderR-6"
                                                placeholder="LAEM CHABANG, TH" disabled/>
                                            <span class="icon-input bx bx-anchor text-navy"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label"><b>POD</b></span></label>
                                        <div class="box-location">
                                            <input type="text" class="form-control borderR-6"
                                                placeholder="LOME, TG" disabled/>
                                            <span class="icon-input bx bx-anchor text-navy"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label"><b>Commodity</b></label>
                                        <select class="form-select borderR-6" id="selectCommodity">
                                            <option hidden>Select Commodity</option>
                                            <option>value 1</option>
                                            <option>value 2</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <div id="boxOther" class="other box mt-3">
                                            <input type="text" class="form-control" placeholder="Enter text...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label"><b>ETD</b></label>
                                        <input type="date" class="form-control borderR-6" id="" disabled>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label"><b>Pick up date</b></label>
                                        <input type="date" class="form-control borderR-6" id="" value="2022-10-03">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label"><b>Return date</b></label>
                                        <input type="date" class="form-control borderR-6" id="" value="2022-10-26">
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="text-danger fw-bold mb-0">** REMARK : FREE DETENTION 3 DAYS (PICK UP DATE UNTILL RETURN DATE) FREE DEMURRAGE 3 DAYS (RETURN DATE UNTILL CUT OFF DATE) **</p>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label"><b>Term</b></label>
                                        <select class="form-select  borderR-6">
                                            <option value="1">CY</option>
                                            <option value="2">CFS</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label"><b>Type/Size</b></label>
                                        <select class="form-select  borderR-6">
                                            <option value="1">20’ Dry Standard</option>
                                            <option value="2">20’ Dry High Cube</option>
                                            <option value="3">40’ Dry High Cube</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label"><b>Gross Weight</b></label>
                                        <input type="text" class="form-control borderR-6" id="" >
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label"><b>Ocean Freight</b></label>
                                        <input type="text" class="form-control borderR-6" id="" >
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="alert alert-warning">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                CANCELLATION / POSTPONEMENT MUST BE INFORMED WITHIN 7 DAYS BEFORE THE CLOSING TIME. OTHERWISE, WE WILL COLLECT THE PENALTY CHARGE AT THB 3,000.00 PER CONTAINER FOR CY SHIPMENT AND THB 5,000.00 PER CONTAINER FOR CFS SHIPMENT.
                                                </label>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-navy rounded-pill px-4 mb-3"
                                            data-bs-toggle="modal" data-bs-target="#finishBookModal">Booking</button>
                                        <button type="reset"
                                            class="btn btn-outline-navy rounded-pill px-4 mb-3">Reset</button>
                                            <br>
                                            <a href="{{ url('/booking') }}" class="btn btn-link text-navy">&lt; Back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="finishBookModal" tabindex="-1" aria-labelledby="finishBookModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content borderR-25 p-4">
                <div class="modal-body text-center">
                    <img src="{{ asset('frontend/images/finish-book.png') }}" alt="" class="mw-100 mb-3">
                    <p>A booking confirmation will be sent via email.<br>Please wait for an email.</p>
                    <div class="text-center pt-4">
                        <button type="button" class="btn btn-navy rounded-pill px-5"
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
    <script>
        $(document).ready(function(){
            $("#selectCommodity").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue){
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else{
                        $(".box").hide();
                    }
                });
            }).change();
        });
    </script>
</body>

</html>