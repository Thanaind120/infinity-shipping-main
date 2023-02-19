@if(isset(Auth::guard('Member')->user()->id))

<!doctype html>

<html lang="th">



<head>

    <title>Booking - Infinity Shipping (Thailand)Co.,Ltd.</title>

    @include('layouts.frontend.inc_header')

    <style>

        .autocomplete {

            position: relative;

        }



        .autocomplete-items {

            position: absolute;

            border: 1px solid #d4d4d4;

            border-bottom: none;

            border-top: none;

            z-index: 99;

            top: 100%;

            left: 0;

            right: 0;

        }



        .autocomplete-items div {

            padding: 10px;

            cursor: pointer;

            background-color: #fff;

            border-bottom: 1px solid #d4d4d4;

        }



        .autocomplete-items div:hover {

            background-color: #e9e9e9;

        }



        .autocomplete-active {

            background-color: DodgerBlue !important;

            color: #ffffff;

        }



        .myClass {

            background-color: #fd5f32;

        }

    </style>

</head>



<body>

    @include('layouts.frontend.inc_navbar')

    <div class="bg-light">

        <div class="container py-5">

            <div class="row">

                <div class="col-md-12 col-lg-10 offset-lg-1">

                    <h1 class="fw-bold text-navy"><img src="{{ asset('frontend/images/icon-harbor.png') }}" alt=""

                            class="me-2">Booking</h1>

                    <div class="lineR-left"></div>

                    <form class="row g-3" action="{{ route('search.result') }}" method="get" autocomplete="off">

                        <div class="col-md-6">

                            <label for="" class="form-label"><b>Port of loading</b> <span

                                    class="text-muted fw-light">(POL)</span></label>

                            <div class="box-location">

                                <div class="autocomplete">

                                    @if(isset($POLS))

                                    <input type="text" class="form-control borderR-6" placeholder="Location" id="POL"

                                        name="POL" value="{{ $POLS }}" />

                                    @else

                                    <input type="text" class="form-control borderR-6" placeholder="Location" id="POL"

                                        name="POL" value="" />

                                    @endif

                                    <span class="icon-input bx bx-map text-muted"></span>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label for="" class="form-label"><b>Port of discharge</b> <span

                                    class="text-muted fw-light">(POD)</span></label>

                            <div class="box-location">

                                <div class="autocomplete">

                                    @if(isset($PODS))

                                    <input type="text" class="form-control borderR-6" placeholder="Location" id="POD"

                                        name="POD" value="{{ $PODS }}" />

                                    @else

                                    <input type="text" class="form-control borderR-6" placeholder="Location" id="POD"

                                        name="POD" value="" />

                                    @endif

                                    <span class="icon-input bx bx-map text-muted"></span>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <label for="" class="form-label"><b>Date</b></label>

                            @if(isset($date))

                            <input type="date" class="form-control borderR-6" id="date" name="date" value="{{ $date }}">

                            @else

                            <input type="date" class="form-control borderR-6" id="date" name="date" value="">

                            @endif

                        </div>

                        <div class="col-md-4">

                            <label for="" class="form-label"><b>Duration</b></label>

                            @if(isset($week_form))

                            <select class="form-select borderR-6" id="week" name="week">

                                <option {{ ($week_form == 1) ? 'selected' : '' }} value="1">1 week</option>

                                <option {{ ($week_form == 2) ? 'selected' : '' }} value="2">2 weeks</option>

                                <option {{ ($week_form == 3) ? 'selected' : '' }} value="3">3 weeks</option>

                                <option {{ ($week_form == 4) ? 'selected' : '' }} value="4">4 weeks</option>

                            </select>

                            @else

                            <select class="form-select borderR-6" id="week" name="week">

                                <option value="1">1 week</option>

                                <option value="2">2 weeks</option>

                                <option value="3">3 weeks</option>

                                <option value="4">4 weeks</option>

                            </select>

                            @endif

                        </div>

                        <div class="col-md-4">

                            <label for="" class="form-label w-100 d-none d-md-block">&nbsp;</label>

                            <button type="submit" class="btn btn-navy rounded-pill w-100"><i class="fas fa-search"></i>

                                Search</button>

                        </div>

                    </form>

                    <hr>

                    <h4 class="fw-bold">Result

                        <span class="fw-normal">

                            @foreach($Quotes as $key=>$val)

                            @if($val->total_quote != '')

                            ({{ $val->total_quote }})

                            @else

                            (0)

                            @endif

                            @endforeach

                        </span>

                    </h4>

                    @foreach ($Quote as $key => $val)

                    <div class="card card-body mb-3 rounded-3">

                        <div class="row align-items-center">

                            <div class="col-sm-6">

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

                                        <div class="timeline-marker dot-none"><i class='bx-sm bx bxs-map text-red'></i>

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

                            <div class="col-sm-3 bd-lr">

                                <p class="fs-12 text-muted mb-0">All in rate</p>

                                <div class="d-inline-flex">

                                    <div class="me-1">

                                        @if($val->privilege == 1)

                                        <h3 class="text-navy fw-bold">{{ $val->special_rate }}</h3>

                                        @elseif($val->privilege2 == 1)

                                        <h3 class="text-navy fw-bold">{{ $val->special_rate }}</h3>

                                        @else

                                        <h3 class="text-navy fw-bold">{{ $val->rate }}</h3>

                                        @endif

                                    </div>

                                    <div class="fs-12 text-uppercase text-navy"><b>USD</b><br>/Container</div>

                                </div>

                                <p class="fs-12 text-muted mb-0">Rate for general cargo <font color="red">(Non-DG)

                                    </font>

                                </p>

                                @if($val->additional_content == 1)

                                @if($val->announce_content != '')

                                <p class="fs-12 text-muted mb-0">

                                    <font color="red"><i class="fa fa-flag" aria-hidden="true"></i> ฮอตสุดๆ

                                        มีคนจองล่าสุดเมื่อ {{ $val->announce_content }} ชั่วโมงก่อน</font>

                                </p>

                                @endif

                                @endif

                            </div>

                            <div class="col-sm-3 text-center">

                                @if($val->privilege == 1)

                                <span class="badge bg-danger w-100 rounded-0">VALID : 24Hrs</span>

                                <span class="badge bg-warning w-100 rounded-0 text-dark mb-2 position-relative">

                                    <div class="scrollDown">

                                        <span></span>

                                        <span></span>

                                        <span></span>

                                    </div>

                                    MEGA SALE

                                </span>

                                @elseif($val->privilege2 == 1)

                                <span class="badge bg-danger w-100 rounded-0">VALID : 24Hrs</span>

                                <span class="badge w-100 myClass rounded-0 mb-2 position-relative">

                                    <div class="scrollDown">

                                        <span></span>

                                        <span></span>

                                        <span></span>

                                    </div>

                                    FLASH SALE

                                </span>

                                @endif

                                <a type="button" class="btn btn-navy rounded-pill px-5"

                                    href="{{ url('/booking-info/'.$val->quote_code) }}">Booking</a>

                            </div>

                            @else

                            <div class="col-sm-3 bd-lr">

                                <p class="fs-12 text-muted mb-0">All in rate</p>

                                <div class="d-inline-flex">

                                    <div class="me-1">

                                        <h3 class="text-navy fw-bold">{{ $val->rate }}</h3>

                                    </div>

                                    <div class="fs-12 text-uppercase text-navy"><b>USD</b><br>/Container</div>

                                </div>

                                <p class="fs-12 text-muted mb-0">Rate for general cargo <font color="red">(Non-DG)

                                    </font>

                                </p>

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

    <script>

        function autocomplete(inp, arr) {

            /*the autocomplete function takes two arguments,

            the text field element and an array of possible autocompleted values:*/

            var currentFocus;

            /*execute a function when someone writes in the text field:*/

            inp.addEventListener("input", function (e) {

                var a, b, i, val = this.value;

                /*close any already open lists of autocompleted values*/

                closeAllLists();

                if (!val) {

                    return false;

                }

                currentFocus = -1;

                /*create a DIV element that will contain the items (values):*/

                a = document.createElement("DIV");

                a.setAttribute("id", this.id + "autocomplete-list");

                a.setAttribute("class", "autocomplete-items");

                /*append the DIV element as a child of the autocomplete container:*/

                this.parentNode.appendChild(a);

                /*for each item in the array...*/

                for (i = 0; i < arr.length; i++) {

                    /*check if the item starts with the same letters as the text field value:*/

                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {

                        /*create a DIV element for each matching element:*/

                        b = document.createElement("DIV");

                        /*make the matching letters bold:*/

                        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";

                        b.innerHTML += arr[i].substr(val.length);

                        /*insert a input field that will hold the current array item's value:*/

                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";

                        /*execute a function when someone clicks on the item value (DIV element):*/

                        b.addEventListener("click", function (e) {

                            /*insert the value for the autocomplete text field:*/

                            inp.value = this.getElementsByTagName("input")[0].value;

                            /*close the list of autocompleted values,

                            (or any other open lists of autocompleted values:*/

                            closeAllLists();

                        });

                        a.appendChild(b);

                    }

                }

            });

            /*execute a function presses a key on the keyboard:*/

            inp.addEventListener("keydown", function (e) {

                var x = document.getElementById(this.id + "autocomplete-list");

                if (x) x = x.getElementsByTagName("div");

                if (e.keyCode == 40) {

                    /*If the arrow DOWN key is pressed,

                    increase the currentFocus variable:*/

                    currentFocus++;

                    /*and and make the current item more visible:*/

                    addActive(x);

                } else if (e.keyCode == 38) { //up

                    /*If the arrow UP key is pressed,

                    decrease the currentFocus variable:*/

                    currentFocus--;

                    /*and and make the current item more visible:*/

                    addActive(x);

                } else if (e.keyCode == 13) {

                    /*If the ENTER key is pressed, prevent the form from being submitted,*/

                    e.preventDefault();

                    if (currentFocus > -1) {

                        /*and simulate a click on the "active" item:*/

                        if (x) x[currentFocus].click();

                    }

                }

            });



            function addActive(x) {

                /*a function to classify an item as "active":*/

                if (!x) return false;

                /*start by removing the "active" class on all items:*/

                removeActive(x);

                if (currentFocus >= x.length) currentFocus = 0;

                if (currentFocus < 0) currentFocus = (x.length - 1);

                /*add class "autocomplete-active":*/

                x[currentFocus].classList.add("autocomplete-active");

            }



            function removeActive(x) {

                /*a function to remove the "active" class from all autocomplete items:*/

                for (var i = 0; i < x.length; i++) {

                    x[i].classList.remove("autocomplete-active");

                }

            }



            function closeAllLists(elmnt) {

                /*close all autocomplete lists in the document,

                except the one passed as an argument:*/

                var x = document.getElementsByClassName("autocomplete-items");

                for (var i = 0; i < x.length; i++) {

                    if (elmnt != x[i] && elmnt != inp) {

                        x[i].parentNode.removeChild(x[i]);

                    }

                }

            }

            /*execute a function when someone clicks in the document:*/

            document.addEventListener("click", function (e) {

                closeAllLists(e.target);

            });

        }



        /*An array containing all the country names in the world:*/

        var POL = {!! json_encode($result1->toArray()) !!};

        var POD = {!! json_encode($result2->toArray()) !!};



        var activePOL = POL;

        var activePOD = POD;



        /*initiate the autocomplete function on the "POL" element, and pass along the countries array as possible autocomplete values:*/

        autocomplete(document.getElementById("POL"), activePOL);

        autocomplete(document.getElementById("POD"), activePOD);



    </script>

</body>



</html>

@else

<script>

    var _url = "{{ url('/login') }}";

    window.location.href = _url;



</script>

@endif

