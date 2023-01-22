<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendors/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />
    <?php $active[14] = 'active'; ?>
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
                        <h1 class="font-large-1">Instant Quote</h1>
                    </div>
                    <div class="section-body">
                        <div class="card col-8">
                            <div class="card-body p-0">
                                <input type="hidden" name="id_quote" value="{{ $price->id_quote }}">
                                <!-- form update -->
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-md-1 col-form-label">POL :</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="POL" name="POL"
                                            value="{{ $price->POL }}" readonly>
                                    </div>
                                    <label for="" class="col-md-2 col-form-label">POL Date :</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="VDF" name="VDF"
                                            value="{{ $price->VDF }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-md-1 col-form-label">POD :</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="POD" name="POD"
                                            value="{{ $price->POD }}" readonly>
                                    </div>
                                    @if(isset($price->VDT))
                                    <label for="" class="col-md-2 col-form-label">POD Date :</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="VDT" name="VDT"
                                            value="{{ $price->VDT }}" readonly>
                                    </div>
                                    @endif
                                </div>
                                @if(isset($price->rate))
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-md-1 col-form-label">Price :</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="rate" name="rate"
                                            value="{{ $price->rate }}" readonly>
                                    </div>
                                    <font color="blue">USD/CONTAINER</font>
                                </div>
                                @endif
                                @if(isset($price->privilege))
                                <div class="form-group row ml-1 mt-5">
                                    <label for="" class="col-md-2 col-form-label">Privilege :</label>
                                    <div class="col-md-4">
                                        <input type="checkbox" id="privilege" name="privilege"
                                            value="{{ $price->privilege }}"
                                            {{ ($price->privilege == 1)? 'checked' : '' }} readonly>
                                        Valid : 24Hrs & Mega Sale
                                    </div>
                                </div>
                                <div class="form-group row ml-1 mt-5">
                                    @if(isset($price->special_rate))
                                    <label for="" class="col-md-2 col-form-label">Special Price :</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="special_rate" name="special_rate"
                                            value="{{ $price->special_rate }}" readonly>
                                    </div>
                                    <font color="blue">USD/CONTAINER</font>
                                    @endif
                                </div>
                                @endif
                                <div class="form-group row ml-4 mt-5">
                                    <h3>Container Details</h3>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-md-2 col-form-label">Equipment
                                        type :</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="equipment_type"
                                            name="equipment_type" value="{{ $price->equipment_type }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-md-3 col-form-label">Max Net weight
                                        (KGM) :</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="weight" name="weight"
                                            value="{{ $price->weight }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-md-3 col-form-label">Number of
                                        container(s) :</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="productQty" name="productQty"
                                            value="{{ $price->productQty }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-md-2 col-form-label">Commodity :</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="commodity" name="commodity"
                                            value="{{ $price->commodity }}" readonly>
                                    </div>
                                    <label for="" class="col-md-2 col-form-label">Other Details :</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="other" name="other"
                                            value="{{ $price->other }}" readonly>
                                    </div>
                                </div>
                                <!-- End : form update -->
                                <div class="form-group mb-0 row">
                                    <div class="col-md-6">
                                        <a class="btn btn-secondary btn-sm waves-effect"
                                            href="{{ url("/backend/price") }}">
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
