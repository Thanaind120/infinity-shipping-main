<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendors/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />
    <?php $active[15] = 'active'; ?>
    <style>
        input[type="checkbox"][readonly] {
            pointer-events: none;
        }

    </style>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('include.nav')
            @include('include.menu')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1 class="font-large-1">Booking</h1>
                    </div>
                    <div class="section-body">
                        <div class="card col-8">
                            <div class="card-body p-0">
                                <input type="hidden" name="id_booking" value="{{ $Book->id_booking }}">
                                <!-- form update -->
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-md-2 col-form-label">Company</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="company_name" name="company_name"
                                            value="{{ $Book->company_name }}" readonly>
                                    </div>
                                    <label for="" class="col-md-2 col-form-label">Customer name</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="customer_name" name="customer_name"
                                            value="{{ $Book->customer_name }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-md-2 col-form-label">Booking Party</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="booking_party" name="booking_party"
                                            value="{{ $Book->booking_party }}" readonly>
                                    </div>
                                    <label for="" class="col-md-2 col-form-label">Actual Shipper</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="actual_shipper"
                                            name="actual_shipper" value="{{ $Book->actual_shipper }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-md-1 col-form-label">POL</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="POL" name="POL"
                                            value="{{ $Book->POL }}" readonly>
                                    </div>
                                    <label for="" class="col-md-1 col-form-label">POD</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="POD" name="POD"
                                            value="{{ $Book->POD }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-md-2 col-form-label">Commodity</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="commodity" name="commodity"
                                            value="{{ $Book->commodity }}" readonly>
                                    </div>
                                    <label for="" class="col-md-1 col-form-label">Other</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="other" name="other"
                                            value="{{ $Book->other }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-md-1 col-form-label">ETD</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="ETD" name="ETD"
                                            value="{{ $Book->ETD }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-md-2 col-form-label">Pick up date</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="pickup_date" name="pickup_date"
                                            value="{{ $Book->pickup_date }}" readonly>
                                    </div>
                                    <label for="" class="col-md-2 col-form-label">Return date</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="return_date" name="return_date"
                                            value="{{ $Book->return_date }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-md-2 col-form-label">Term</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="term" name="term"
                                            value="{{ $Book->term }}" readonly>
                                    </div>
                                    <label for="" class="col-md-2 col-form-label">Type/Size</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="container_type"
                                            name="container_type" value="{{ $Book->container_type }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-md-2 col-form-label">Gross Weight</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="gross_weight" name="gross_weight"
                                            value="{{ $Book->gross_weight }}" readonly>
                                    </div>
                                    <label for="" class="col-md-2 col-form-label">Ocean Freight</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="ocean_freight" name="ocean_freight"
                                            value="{{ $Book->ocean_freight }}" readonly>
                                    </div>
                                </div>
                                <!-- End : form update -->
                                <div class="form-group mb-0 row">
                                    <div class="col-md-6">
                                        <a class="btn btn-secondary btn-sm waves-effect"
                                            href="{{ url("/backend/booking") }}">
                                            <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                                        </a>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            @include('include.footer')
        </div>
    </div>
    @include('include.script')
    <!--datepicker-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/ui/1.13.0-rc.2/jquery-ui.min.js"></script>
</body>

</html>
