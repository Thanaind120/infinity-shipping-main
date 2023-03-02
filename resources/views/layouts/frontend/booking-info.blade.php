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

                                <form class="row g-3" action="{{ url('/booking-info/store/'.$Quote->quote_code) }}"

                                    enctype="multipart/form-data" method="POST" autocomplete="off">

                                    @csrf

                                    <input type="hidden" class="form-control borderR-6" id="ref_id_quote"

                                        name="ref_id_quote" value="{{ $Quote->id_quote }}">

                                    <div class="col-sm-6">

                                        <label for="" class="form-label"><b>Company</b></label>

                                        <input type="text" class="form-control borderR-6 filter" id="company_name"

                                            name="company_name" placeholder="Enter company name" value="" required>

                                    </div>

                                    <div class="col-sm-6">

                                        <label for="" class="form-label"><b>Customer name</b></label>

                                        <input type="text" class="form-control borderR-6 filter" id="customer_name"

                                            name="customer_name" placeholder="Enter name" value="" required>

                                    </div>

                                    <div class="col-sm-6">

                                        <label for="" class="form-label"><b>Booking Party</b></label>

                                        <input type="text" class="form-control borderR-6 filter" id="booking_party"

                                            name="booking_party" value="" required>

                                    </div>

                                    <div class="col-sm-6">

                                        <label for="" class="form-label"><b>Actual Shipper</b></label>

                                        <input type="text" class="form-control borderR-6 filter" id="actual_shipper"

                                            name="actual_shipper" value="" required>

                                    </div>

                                    <div class="col-sm-6">

                                        <label for="POL" class="form-label"><b>POL</b></span></label>

                                        <div class="box-location">

                                            <input type="text" class="form-control borderR-6"

                                                placeholder="{{ $Quote->POL }}" id="POL" name="POL"

                                                value="{{ $Quote->POL }}" readonly />

                                            <span class="icon-input bx bx-anchor text-navy"></span>

                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <label for="POD" class="form-label"><b>POD</b></span></label>

                                        <div class="box-location">

                                            <input type="text" class="form-control borderR-6"

                                                placeholder="{{ $Quote->POD }}" id="POD" name="POD"

                                                value="{{ $Quote->POD }}" readonly />

                                            <span class="icon-input bx bx-anchor text-navy"></span>

                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <label for="commodity" class="form-label"><b>Commodity</b></label>

                                        <select class="form-select borderR-6 filter" id="commodity" name="commodity" required>

                                            <option value="" hidden>Select Commodity</option>

                                            @foreach ($Commodity as $key => $val)

                                            <option value="{{ $val->commodity_name }}">

                                                {{ $val->commodity_name }}</option>

                                            @endforeach

                                            <option value="other">Other</option>

                                        </select>

                                        <div id="boxOther" class="other box mt-3">

                                            <input type="text" class="form-control filter" placeholder="Please input commodity of cargoes on remark column."

                                                id="other" name="other" value="">

                                        </div>

                                    </div>

                                    <?php 

                                    $date = $Quote->VDF;

                                    $explode = explode("-",$date);

                                    ?>

                                    <div class="col-sm-6">

                                        <label for="" class="form-label"><b>ETD</b></label>

                                        <input type="text" class="form-control borderR-6" id="ETD" name="ETD"

                                            value="{{ $explode[2]."/".$explode[1]."/".$explode[0] }}" readonly>

                                    </div>

                                    <div class="col-sm-6">

                                        <label for="" class="form-label"><b>Pick up date</b></label>

                                        <input type="date" class="form-control borderR-6 filter" id="pickup_date"

                                            name="pickup_date" value="" required>

                                    </div>

                                    <div class="col-sm-6">

                                        <label for="" class="form-label"><b>Return date</b></label>

                                        <input type="date" class="form-control borderR-6 filter" id="return_date"

                                            name="return_date" value="" required>

                                    </div>

                                    @foreach ($remark as $key => $val)

                                    <div class="col-sm-12">

                                        <p class="text-danger fw-bold mb-0">** REMARK : {{ $val->remark }} **</p>

                                    </div>

                                    @endforeach

                                    <div class="col-sm-3">

                                        <label for="" class="form-label"><b>Term</b></label>

                                        <select class="form-select borderR-6 filter" id="term" name="term" required>

                                            <option value="" selected>Open this select Term</option>

                                            @foreach ($Term as $key => $val)

                                            <option value="{{ $val->term }}">{{ $val->term }}</option>

                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="col-sm-3">

                                        <label for="" class="form-label"><b>Type/Size</b></label>

                                        <select class="form-select borderR-6 filter" id="container_type"

                                            name="container_type" required>

                                            <option value="1">20’ Dry Standard</option>

                                            <option value="2">20’ Dry High Cube</option>

                                            <option value="3">40’ Dry High Cube</option>

                                        </select>

                                    </div>

                                    <div class="col-sm-3">

                                        <label for="" class="form-label"><b>Gross Weight</b></label>

                                        <input type="text" class="form-control borderR-6 filter" id="gross_weight"

                                            name="gross_weight" value="" required>

                                    </div>

                                    <div class="col-sm-3">

                                        <label for="" class="form-label"><b>Ocean Freight</b></label>

                                        <input type="text" class="form-control borderR-6 filter" id="ocean_freight"

                                            name="ocean_freight" value="" required>

                                    </div>

                                    <div class="col-sm-12">

                                        <div class="alert alert-warning">

                                            <div class="form-check">

                                                <input class="form-check-input" type="checkbox" id="flexCheckDefault"

                                                    onclick="checkBoxButton()">

                                                @foreach ($remark as $key => $val)
                                                
                                                <label class="form-check-label" for="flexCheckDefault">

                                                    {{ $val->note }}

                                                </label>

                                                @endforeach

                                            </div>

                                        </div>

                                        <span class="text-danger error-text text-center" id="checkalert"

                                            style="display: none">Please fill out this field</span>

                                    </div>

                                    <div class="text-center">

                                        <button type="button" class="btn btn-navy rounded-pill px-4 mb-3"

                                            id="submitBtn_quote" onclick="myButtonFunction()">Booking</button>

                                        <button type="button" class="btn btn-navy rounded-pill px-4 mb-3"

                                            id="submitBtn_Quote" style="display: none">Booking</button>

                                        <button type="reset" class="btn btn-outline-navy rounded-pill px-4 mb-3"

                                            onclick="clear_filter()">Reset</button>

                                        <br>

                                        <a href="{{ url('/booking') }}" class="btn btn-link text-navy">&lt; Back</a>

                                    </div>

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

                        <button type="submit" class="btn btn-navy rounded-pill px-5"

                            data-bs-dismiss="modal">OK</button><br>

                    </div>

                </div>

            </div>

        </div>

    </div>

    </form>

    @include('layouts.frontend.inc_footer')

    <script>

        $('#linkMenuTop .nav-item').eq(4).addClass('active');



        const clear_filter = () => {

            $('.filter').val('');

            $('#other').hide();

        }



    </script>

    <script>

        $(document).ready(function () {

            $("#commodity").change(function () {

                $(this).find("option:selected").each(function () {

                    var optionValue = $(this).attr("value");

                    if (optionValue) {

                        $(".box").not("." + optionValue).hide();

                        $("." + optionValue).show();

                    } else {

                        $(".box").hide();

                    }

                });

            }).change();



            $("#commodity").on("change", function () {

                var val = $('#commodity').val();

                if (val == 'other') {

                    $('#other').show();

                }

            });

        });



        function checkBoxButton() {

            var checkBox = document.getElementById("flexCheckDefault");

            if (checkBox.checked == true) {

                $('#checkalert').hide();

                $('#submitBtn_Quote').show();

                $('#submitBtn_quote').hide();

            } else {

                $('#submitBtn_Quote').hide();

                $('#submitBtn_quote').show();

            }

        }



        function myButtonFunction() {

            var x = document.getElementById("flexCheckDefault").required;

            $('#checkalert').show();

        }



        $("#submitBtn_Quote").on("click", function () {

            $('#finishBookModal').modal('show');

        });



    </script>

</body>



</html>

