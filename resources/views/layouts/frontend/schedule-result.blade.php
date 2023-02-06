@if(isset(Auth::guard('Member')->user()->id))
<!doctype html>
<html lang="th">

<head>
    <title>Schedules - Infinity Shipping (Thailand)Co.,Ltd.</title>
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

    </style>
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
                                <form class="row" action="{{ route('schedule.result') }}" method="get"
                                    autocomplete="off">
                                    <div class="col-12 col-md-4 col-xl-12 mb-3">
                                        <label for="" class="form-label"><b>Port of loading</b><br><span
                                                class="text-muted fw-light small">(POL)</span></label>
                                        <div class="box-location">
                                            <div class="autocomplete">
                                                @if(isset($POLS))
                                                <input type="text" class="form-control borderR-6" placeholder="Location"
                                                    id="POL" name="POL" value="{{ $POLS }}">
                                                @else
                                                <input type="text" class="form-control borderR-6" placeholder="Location"
                                                    id="POL" name="POL" value="">
                                                @endif
                                                <span class="icon-input bx bx-anchor text-navy"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-12">
                                        <label for="" class="form-label"><b>Port of discharge</b><br><span
                                                class="text-muted fw-light small">(POD)</span></label>
                                        <div class="box-location">
                                            <div class="autocomplete">
                                                @if(isset($PODS))
                                                <input type="text" class="form-control borderR-6" placeholder="Location"
                                                    id="POD" name="POD" value="{{ $PODS }}">
                                                @else
                                                <input type="text" class="form-control borderR-6" placeholder="Location"
                                                    id="POD" name="POD" value="">
                                                @endif
                                                <span class="icon-input bx bx-anchor text-navy"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-block d-md-none d-xl-block">
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-12">
                                        <label for="" class="form-label"><b>Date</b></label>
                                        @if(isset($type_form))
                                        <select class="form-select mb-2" id="type" name="type">
                                            <option {{ ($type_form == 'departure') ? 'selected' : '' }}
                                                value="departure">Departing</option>
                                            <option {{ ($type_form == 'arrival') ? 'selected' : '' }} value="arrival">
                                                Arriving by</option>
                                        </select>
                                        @else
                                        <select class="form-select mb-2" id="type" name="type">
                                            <option value="departure">Departing</option>
                                            <option value="arrival">Arriving by</option>
                                        </select>
                                        @endif
                                        @if(isset($date))
                                        <input type="date" class="form-control" id="date" name="date"
                                            value="{{ $date }}">
                                        @else
                                        <input type="date" class="form-control" id="date" name="date" value="">
                                        @endif
                                    </div>
                                    <div class="col-12 d-block d-md-none d-xl-block">
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-12">
                                        <label for="" class="form-label"><b>Container type</b></label>
                                        @if(isset($container))
                                        <select class="form-select mb-1" id="container" name="container">
                                            @foreach ($EquipmentType as $key => $val)
                                            <option {{ ($container == $val->id) ? 'selected' : '' }}
                                                value="{{ $val->id }}">{{ $val->device_name }}</option>
                                            @endforeach
                                        </select>
                                        @else
                                        <select class="form-select mb-1" id="container" name="container">
                                            @foreach ($EquipmentType as $key => $val)
                                            <option value="{{ $val->id }}">{{ $val->device_name }}</option>
                                            @endforeach
                                        </select>
                                        @endif
                                        <div class="form-check">
                                            @if(isset($cargo))
                                            <input type="checkbox" class="form-check-input" id="cargo_temperature"
                                                name="cargo_temperature" value="1" {{ $cargo == '1' ? 'checked' : '' }}>
                                            @else
                                            <input type="checkbox" class="form-check-input" id="cargo_temperature"
                                                name="cargo_temperature" value="1">
                                            @endif
                                            <label class="form-check-label" for="cargo_temperature">Cargo requires
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
                            <div class="row">
                                <div class="col-sm-9">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <p class="nav-link px-0 text-navy">Search result for <b>{{ $POLS }}</b> to
                                                <b>{{ $PODS }}</b></p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-3">
                                    <ul class="nav justify-content-end" id="share-icon">
                                        <li class="nav-item">
                                            <a class="nav-link" href="mailto:sales5@infinity.co.th"><i
                                                    class='bx bx-envelope bx-sm'></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" target="_blank" href="{{ url('/schedule-result/print?POL='.$POLS.'&POD='.$PODS.'&type='.$type_form.'&date='.$date.'&container='.$container) }}"><i class='bx bx-printer bx-sm'></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @foreach ($Book as $key => $val)
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
                                                    <b>
                                                        <?php
                                                        $date = new DateTime($val->departure);
                                                        $dates = $val->departure;
                                                        $newdate = $date->format(DateTime::RFC822); 
                                                        $explode = explode(" ",$newdate);
                                                        $explodes = explode("-",$dates);
                                                        echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                                        ?>
                                                    </b><br>
                                                    <u class="text-navy fw-bold">{{ $val->place_of_departure }}</u>
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
                                                    <b>
                                                        <?php
                                                        $date = new DateTime($val->arrival);
                                                        $dates = $val->arrival;
                                                        $newdate = $date->format(DateTime::RFC822); 
                                                        $explode = explode(" ",$newdate);
                                                        $explodes = explode("-",$dates);
                                                        echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                                        ?>
                                                    </b><br>
                                                    <u class="text-navy fw-bold">{{ $val->place_of_arrival }}</u>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset('frontend/images/icon-harbor.png') }}" alt=""
                                                        width="24px">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <p class="mb-0">Vessal/Voyage</p>
                                                    <?php
                                                    $books = DB::table('schedules')->where('ref_id_booking',$val->id_booking)->where('ship_code', '!=', null)->orderBy('id_schedules', 'ASC')->first();
                                                    ?>
                                                    <u class="text-navy fw-bold">
                                                        <?php 
                                                            $ships = $books->ship_code;
                                                            $explode = explode("/",$ships);
                                                            echo $explode[0];
                                                        ?>
                                                    </u>
                                                    <?php 
                                                        $ships = $books->ship_code;
                                                        $explode = explode("/",$ships);
                                                        echo $explode[1];
                                                    ?><br>
                                                    Transit Time :
                                                    <b>
                                                        <?php 
                                                            $transport1 = DB::table('schedules')->where('ref_id_booking',$val->id_booking)->orderBy('id_schedules', 'ASC')->first();
                                                            $transport2 = DB::table('schedules')->where('ref_id_booking',$val->id_booking)->orderBy('id_schedules', 'DESC')->first();
                                                            $date1 = date_create($transport1->save_datetime);
                                                            $date2 = date_create($transport2->save_datetime);
                                                            $diff = date_diff($date1,$date2);
                                                            $explode = $diff->format("%a days");
                                                            $explodes = explode(" ",$explode);
                                                            echo $explodes[0].' '.'Days';
                                                        ?>
                                                    </b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 text-center align-self-center">
                                            <a href="{{ url('/booking-info/'.$val->ref_quote_code) }}"
                                                class="btn btn-red rounded-pill btn-w130">Booking</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0"><i class="bx bx-time text-red bx-sm"></i> <b>Deadlines</b>
                                            </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <span class="fs-12">PORT CUT-OFF</span><br>
                                            <b class="small">
                                                <?php
                                                    $date = new DateTime($val->deadlines);
                                                    $dates = $val->deadlines;
                                                    $newdate = $date->format(DateTime::RFC822); 
                                                    $explode = explode(" ",$newdate);
                                                    $explodes = explode("-",$dates);
                                                    echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                                ?>
                                            </b>
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
                                            <?php 
                                            $transport = DB::table('schedules')->where('ref_id_booking',$val->id_booking)->get(); 
                                            ?>
                                            @foreach ($transport as $key => $val2)
                                            <li class="timeline-item">
                                                <div class="timeline-info">
                                                    <span>{{ $val2->city_name }}</span><br>
                                                    <span class="fs-12">{{ $val2->location }}</span>
                                                </div>
                                                <div class="timeline-marker dot-none">
                                                    @if ($val2->transport_status == 'ESTIMATE ARRIVAL')
                                                    <i class='bx-sm bx bxs-map text-red'></i>
                                                    @else
                                                    <i class='bx-xs bx bxs-circle text-red'></i>
                                                    @endif
                                                </div>
                                                <div class="timeline-content">
                                                    <label for=""
                                                        class="form-label mb-0 text-uppercase">{{ $val2->transport_status }}</label>
                                                    <p class="fs-12 mb-0">{{ $val2->save_datetime }}</p>
                                                    @if ($val2->ship_code != '')
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{ asset('frontend/images/icon-harbor.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            Departing on <u class="text-navy">{{ $val2->ship_code }}</u>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="py-3">
                                <div class="pagination justify-content-center">
                                    {{ $Book->appends(Request::all())->links() }}
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
