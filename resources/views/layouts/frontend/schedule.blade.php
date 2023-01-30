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
                                <form class="row" action="{{ route('schedule.result') }}" method="get" autocomplete="off">
                                    <div class="col-12 col-md-4 col-xl-12 mb-3">
                                        <label for="" class="form-label"><b>Port of loading</b><br><span
                                                class="text-muted fw-light small">(POL)</span></label>
                                        <div class="box-location">
                                            <div class="autocomplete">
                                                <input type="text" class="form-control borderR-6" placeholder="Location"
                                                    id="POL" name="POL">
                                                <span class="icon-input bx bx-anchor text-navy"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-12">
                                        <label for="" class="form-label"><b>Port of discharge</b><br><span
                                                class="text-muted fw-light small">(POD)</span></label>
                                        <div class="box-location">
                                            <div class="autocomplete">
                                                <input type="text" class="form-control borderR-6" placeholder="Location"
                                                    id="POD" name="POD">
                                                <span class="icon-input bx bx-anchor text-navy"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-block d-md-none d-xl-block">
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-12">
                                        <label for="" class="form-label"><b>Date</b></label>
                                        <select class="form-select mb-2" id="type" name="type">
                                            <option value="departure">Departing</option>
                                            <option value="arrival">Arriving by</option>
                                        </select>
                                        <input type="date" class="form-control" id="date" name="date"
                                            value="">
                                    </div>
                                    <div class="col-12 d-block d-md-none d-xl-block">
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-12">
                                        <label for="" class="form-label"><b>Container type</b></label>
                                        <select class="form-select mb-1" id="container" name="container">
                                            @foreach ($EquipmentType as $key => $val)
                                            <option value="{{ $val->id }}">{{ $val->device_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="cargo_temperature"
                                                name="cargo_temperature" value="1">
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
                            <h6>Wait for searching ...</h6>
                            <div class="animation-wrapper">
                                <div class="water">
                                    <ul class="waves">
                                        <!-- <li class="wave-one" style="background-image: url('https://i.postimg.cc/7LtCC11Y/wave1.png');"></li> -->
                                        <!-- <li class="wave-two" style="background-image: url('images/cloud.png');"></li> -->
                                        <li class="wave-three"
                                            style="background-image: url('frontend/images/wave-2.png');"></li>
                                        <li class="wave-four"
                                            style="background-image: url('frontend/images/wave-3.png');"></li>
                                    </ul>
                                </div>
                                <div class="boat" style="background-image: url('frontend/images/animate-ship.png');">
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
