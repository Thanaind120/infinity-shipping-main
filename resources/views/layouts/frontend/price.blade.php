<!doctype html>
<html lang="th">

<head>
    <title>Prices - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
</head>

<body>
    @include('layouts.frontend.inc_navbar')
    <form action="{{ route('quote.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
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
                                        {{-- <li class="timeline-item">
                                            <div class="timeline-marker dot-none"><i
                                                    class='bx-sm bx bx-plus-circle text-navy'></i></div>
                                            <div class="timeline-content">
                                                <a class="text-navy" data-bs-toggle="collapse" href="#collapseExample"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">Add a place of Receipt</a>
                                                <div class="collapse mt-2" id="collapseExample">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="box-location">
                                                                <input type="text" class="form-control borderR-6 filter"
                                                                    placeholder="Location" id="location"
                                                                    name="location" />
                                                                <span class="icon-input bx bxs-map text-navy"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li> --}}
                                        <li class="timeline-item">
                                            <div class="timeline-marker dot-none"><i
                                                    class='bx-xs bx bxs-circle text-red'></i></div>
                                            <div class="timeline-content">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="" class="form-label text-navy">Port of
                                                            loading</label>
                                                        {{-- <div class="box-location"> --}}
                                                        {{-- <input type="text" class="form-control borderR-6 filter"
                                                                placeholder="Location" id="POL" name="POL" /> --}}
                                                        <select class="form-select borderR-6 filter"
                                                            placeholder="Location" aria-label="Default select example"
                                                            id="POL" name="POL">
                                                            <option value="" selected>Open this select POL</option>
                                                            @foreach ($POL as $key => $val)
                                                            <option value="{{ $val->POL_name }}">{{ $val->POL_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        {{-- <span class="icon-input bx bx-anchor text-navy"></span> --}}
                                                        {{-- </div> --}}
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
                                                                id="datepicker" name="ETD" />
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
                                                        {{-- <div class="box-location"> --}}
                                                        {{-- <input type="text" class="form-control borderR-6 filter"
                                                                placeholder="Location" id="POD" name="POD" /> --}}
                                                        <select class="form-select borderR-6 filter"
                                                            aria-label="Default select example" placeholder="Location"
                                                            id="POD" name="POD">
                                                            <option value="" selected>Open this select POD</option>
                                                            @foreach ($POD as $key => $val)
                                                            <option value="{{ $val->POD_name }}">{{ $val->POD_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        {{-- <span class="icon-input bx bx-anchor text-navy"></span> --}}
                                                        {{-- </div> --}}
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
                                                <input type="text" class="form-control" id="other" name="other"
                                                    placeholder="Enter text...">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        @if(isset(Auth::user()->id))
                                        {{-- data-bs-toggle="modal" data-bs-target="#finishQuoteModal" --}}
                                        <button type="button" class="btn btn-navy rounded-pill px-4 mb-3"
                                            id="submitBtn_quote">Get a
                                            quote</button>
                                        @else
                                        <a class="btn btn-navy rounded-pill px-4 mb-3" id="submitBtn_quotes">Get a
                                            quote
                                        </a>
                                        @endif
                                        <button type="button" class="btn btn-outline-navy rounded-pill px-4 mb-3"
                                            onclick="clear_filter()">Reset</button>
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
        $('#linkMenuTop .nav-item').eq(3).addClass('active');

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

        const clear_filter = () => {
            $('.filter').val('');
            $('.filters').val('0');
        }

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
            } else {
                $('#finishQuoteModal').modal('show');
            }

        });

        $("#submitBtn_quotes").on("click", function () {

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
            } else {
                window.location.href = "{{ url('/login') }}"
            }

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
        });

    </script>
</body>

</html>
