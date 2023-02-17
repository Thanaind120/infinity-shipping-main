@if(isset(Auth::guard('Member')->user()->id))
<!doctype html>
<html lang="th">

<head>
    <title>Prices - Infinity Shipping (Thailand)Co.,Ltd.</title>
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
    <form id="formQuote" action="{{ route('quote.get') }}" enctype="multipart/form-data" method="GET"
        autocomplete="off">
        <div class="bg-light">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-12 col-lg-10 offset-lg-1">
                        <div class="box-white p-3 p-md-5">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 class="fw-bold text-navy">Instant Quote</h1>
                                    <div class="lineR-left"></div>
                                    <ul class="timeline">
                                        <li class="timeline-item">
                                            <div class="timeline-marker dot-none"><i
                                                    class='bx-xs bx bxs-circle text-red'></i></div>
                                            <div class="timeline-content">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="" class="form-label text-navy">Port of
                                                            loading</label>
                                                        <div class="box-location">
                                                            <div class="autocomplete">
                                                                <input type="text" class="form-control borderR-6 filter"
                                                                    placeholder="Location" id="POL" name="POL"
                                                                    value="" />
                                                                <span class="icon-input bx bx-anchor text-navy"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item img">
                                            <div class="timeline-marker dot-none"><img
                                                    src="{{ asset('frontend/images/icon-harbor.png') }}" alt=""></div>
                                            <div class="timeline-content">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-8"></div>
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="" class="form-label text-navy">Vessal Departure
                                                            from</label>
                                                        <div class="box-location">
                                                            <input type="text" class="form-control borderR-6 filter"
                                                                id="datepicker" name="VDF" value="" />
                                                            <span class="icon-input fa fa-calendar text-navy"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="timeline-marker dot-none"><i
                                                    class='bx-sm bx bxs-map text-red'></i></div>
                                            <div class="timeline-content">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="" class="form-label text-navy">Port of
                                                            discharge</label>
                                                        <div class="box-location">
                                                            <div class="autocomplete">
                                                                <input type="text" class="form-control borderR-6 filter"
                                                                    placeholder="Location" id="POD" name="POD"
                                                                    value="" />
                                                                <span class="icon-input bx bx-anchor text-navy"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="row g-3 pb-2">
                                        <div class="col-12">
                                            <h5 class="text-navy fw-semibold">Container Details</h5>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="" class="form-label">Equipment type <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select borderR-6 filter"
                                                aria-label="Default select example" id="equipment_type"
                                                name="equipment_type">
                                                <option value="" selected>Open this select menu</option>
                                                @foreach ($EquipmentType as $key => $val)
                                                <option value="{{ $val->device_name }}">{{ $val->device_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="" class="form-label">Max Net weight (KGM) <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control borderR-6 filter" id="weight"
                                                name="weight" value="">
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="" class="form-label">Number of container(s) <span
                                                    class="text-danger">*</span></label>
                                            <div class="plusminus horiz">
                                                <button type="button" class="btnquantity"></button>
                                                <input type="number" id="productQty" name="productQty"
                                                    class="numQty filters" value="0" min="0">
                                                <button type="button" class="btnquantity sp-plus"></button>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-12">
                                            <label for="" class="form-label">Commodity <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select borderR-6 filter" id="commodity"
                                                name="commodity">
                                                <option value="" hidden>Select Commodity</option>
                                                @foreach ($Commodity as $key => $val)
                                                <option value="{{ $val->commodity_name }}">
                                                    {{ $val->commodity_name }}</option>
                                                @endforeach
                                                <option value="other">Other</option>
                                            </select>
                                            <div id="boxOther" class="other box mt-3">
                                                <input type="text" class="form-control filter" id="other" name="other"
                                                    placeholder="Enter text..." value="">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        @if(isset(Auth::guard('Member')->user()->id))
                                        <button type="button" class="btn btn-navy rounded-pill px-4 mb-3"
                                            id="submitBtn_quote">Get a
                                            quote
                                        </button>
                                        <button type="button" class="btn btn-navy rounded-pill px-4 mb-3"
                                            id="submitBtn_Quote" style="display: none">Get a
                                            quote
                                        </button>
                                        @endif
                                        <button type="button" class="btn btn-outline-navy rounded-pill px-4 mb-3"
                                            onclick="clear_filter()">Reset
                                        </button>
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
                            <button type="submit" class="btn btn-navy rounded-pill px-4"
                                data-bs-dismiss="modal">OK</button><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : Modal -->
    </form>
    @include('layouts.frontend.inc_footer')
    <script>
        $('#linkMenuTop .nav-item').eq(3).addClass('active');

        const clear_filter = () => {
            $('.filter').val('');
            $('.filters').val('0');
            $('#other').hide();
        }

        $(function () {
            $("#datepicker").datepicker({
                dateFormat: 'dd/mm/yy',
                minDate: "today",
                maxDate: "+20d",
                setDate: "+1d"
            });
        });

    </script>
    <script>
        $(".btnquantity").on("click", function () {
            var $button = $(this);
            var oldValue = $button.closest('.plusminus').find("input.numQty").val();
            if ($button.hasClass("sp-plus")) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            $button.closest('.plusminus').find("input.numQty").val(newVal);
        });

        $(document).ready(function () {

            $('#POL').on('change', function () {

                if ($('#VDF').val() != '' && $('#POD').val() != '' && $('#equipment_type').val() !=
                    '' && $(
                        '#weight').val() != '' && $('#productQty').val() != '' && $('#commodity')
                    .val() != '') {

                    $('#submitBtn_Quote').show();
                    $('#submitBtn_quote').hide();

                }

            });

            $('#VDF').on('change', function () {

                if ($('#POL').val() != '' && $('#POD').val() != '' && $('#equipment_type').val() !=
                    '' && $(
                        '#weight').val() != '' && $('#productQty').val() != '' && $('#commodity')
                    .val() != '') {

                    $('#submitBtn_Quote').show();
                    $('#submitBtn_quote').hide();

                }

            });

            $('#equipment_type').on('change', function () {

                if ($('#POL').val() != '' && $('#POD').val() != '' && $('#VDF').val() !=
                    '' && $(
                        '#weight').val() != '' && $('#productQty').val() != '' && $('#commodity')
                    .val() != '') {

                    $('#submitBtn_Quote').show();
                    $('#submitBtn_quote').hide();

                }

            });

            $('#weight').on('change', function () {

                if ($('#POL').val() != '' && $('#POD').val() != '' && $('#VDF').val() !=
                    '' && $(
                        '#equipment_type').val() != '' && $('#productQty').val() != '' && $(
                        '#commodity')
                    .val() != '') {

                    $('#submitBtn_Quote').show();
                    $('#submitBtn_quote').hide();

                }

            });

            $('#productQty').on('change', function () {

                if ($('#POL').val() != '' && $('#POD').val() != '' && $('#VDF').val() !=
                    '' && $(
                        '#equipment_type').val() != '' && $('#weight').val() != '' && $(
                        '#commodity')
                    .val() != '') {

                    $('#submitBtn_Quote').show();
                    $('#submitBtn_quote').hide();

                }

            });

            $('#commodity').on('change', function () {

                if ($('#POL').val() != '' && $('#POD').val() != '' && $('#VDF').val() !=
                    '' && $(
                        '#equipment_type').val() != '' && $('#weight').val() != '' && $(
                        '#productQty')
                    .val() != '') {

                    $('#submitBtn_Quote').show();
                    $('#submitBtn_quote').hide();

                }

            });

        });

        $("#submitBtn_quote").on("click", function () {

            if ($('#equipment_type').val() == '' || $('#equipment_type').val() == null) {
                Swal.fire(
                    'Please select!',
                    'Equipment type.',
                    'warning'
                )
            } else if ($('#weight').val() == '' || $('#weight').val() == null) {
                Swal.fire(
                    'Please fill out!',
                    'Maximum net weight (KGM).',
                    'warning'
                )
            } else if ($('#productQty').val() == '0' || $('#productQty').val() == null) {
                Swal.fire(
                    'Please fill out!',
                    'Number of container (s).',
                    'warning'
                )
            } else if ($('#commodity').val() == '' || $('#commodity').val() == null) {
                Swal.fire(
                    'Please select!',
                    'Commodity.',
                    'warning'
                )
            } else if ($('#POL').val() == '' || $('#POL').val() == null) {
                Swal.fire(
                    'Please fill out!',
                    'Port of loading.',
                    'warning'
                )
            } else if ($('#VDF').val() == '' || $('#VDF').val() == null) {
                Swal.fire(
                    'Please fill out!',
                    'Vessal Departure from.',
                    'warning'
                )
            } else if ($('#POD').val() == '' || $('#POD').val() == null) {
                Swal.fire(
                    'Please fill out!',
                    'Port of discharge.',
                    'warning'
                )
            } else {
                // $('#finishQuoteModal').modal('show');
                // document.getElementById("formQuote").submit();
                $('#submitBtn_Quote').show();
                $('#submitBtn_quote').hide();
            }
        });

        $("#submitBtn_Quote").on("click", function () {
            
            swal.fire({
                icon:'success',
                title:'Success!',
                text:"Save Data Success",
                type:'success'
            }).then((value) => {
                document.getElementById("formQuote").submit();

            }).catch(swal.noop);

        });
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
