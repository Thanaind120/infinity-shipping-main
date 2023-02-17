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
        input[type="radio"][readonly] {
            pointer-events: none;
        }

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
                                    <label for="" class="col-form-label">POL
                                        :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="POL" name="POL"
                                            value="{{ $price->POL }}" readonly>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label for="" class="col-form-label">POL Date
                                        :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="VDF" name="VDF"
                                            value="{{ $price->VDF }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-form-label">POD
                                        :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="POD" name="POD"
                                            value="{{ $price->POD }}" readonly>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @if(isset($price->VDT))
                                    <label for="" class="col-form-label">POD Date
                                        :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="VDT" name="VDT"
                                            value="{{ $price->VDT }}" readonly>
                                    </div>
                                    @endif
                                </div>
                                @if(isset($price->rate))
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-form-label">Price
                                        :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="rate" name="rate"
                                            value="{{ $price->rate }}" readonly>
                                    </div>
                                    <font color="blue">USD/CONTAINER</font>
                                </div>
                                @endif
                                @if($price->privilege == 1 || $price->privilege2 == 1)
                                <div class="form-group row ml-1 mt-5">
                                    <label for="" class="col-form-label">Privilege
                                        :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="col-md-3">
                                        <input type="checkbox" id="privilege" name="privilege"
                                            value="{{ $price->privilege }}"
                                            {{ ($price->privilege == 1)? 'checked' : '' }} readonly>
                                        24Hrs & Mega Sale
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" id="privilege2" name="privilege2"
                                            value="{{ $price->privilege2 }}"
                                            {{ ($price->privilege2 == 1)? 'checked' : '' }} readonly>
                                        24Hrs & Flash Sale
                                    </div>
                                </div>
                                <div class="form-group row ml-1 mt-5">
                                    @if(isset($price->special_rate))
                                    <label for="" class="col-form-label">Special Price
                                        :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="special_rate" name="special_rate"
                                            value="{{ $price->special_rate }}" readonly>
                                    </div>
                                    <font color="blue">USD/CONTAINER</font>
                                    @endif
                                </div>
                                @endif
                                @if($price->additional_content == 1)
                                <div class="form-group row ml-1 mt-5">
                                    <label for="" class="col-form-label">Additional Content
                                        :</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="col-md-4">
                                        <input type="checkbox" id="additional_content" name="additional_content"
                                            value="{{ $price->additional_content }}"
                                            {{ ($price->additional_content == 1)? 'checked' : '' }} readonly>
                                    </div>
                                </div>
                                <div class="form-group row ml-1 mt-5">
                                    @if(isset($price->announce_content))
                                    <label for="" class="col-form-label"></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    ฮอตสุดๆ มีคนจองล่าสุดเมื่อ
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" id="announce_content" name="announce_content"
                                            value="{{ $price->announce_content }}" readonly>
                                    </div>
                                    ชั่วโมงก่อน
                                    @endif
                                </div>
                                @endif
                                <br>
                                <hr>
                                <div class="form-group row ml-4 mt-5">
                                    <h3>Container Details</h3>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-form-label">Equipment
                                        type
                                        :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="equipment_type"
                                            name="equipment_type" value="{{ $price->equipment_type }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-form-label">Max Net weight
                                        (KGM) :</label>&nbsp;&nbsp;
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="weight" name="weight"
                                            value="{{ $price->weight }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-form-label">Number of
                                        container(s) :</label>&nbsp;&nbsp;
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="productQty" name="productQty"
                                            value="{{ $price->productQty }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row ml-4 mt-5">
                                    <label for="" class="col-md-2 col-form-label">Commodity
                                        :</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="commodity" name="commodity"
                                            value="{{ $price->commodity }}" readonly>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label for="" class="col-form-label">Other Details :</label>
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
