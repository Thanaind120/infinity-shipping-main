<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendors/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />
    <?php $active[14] = 'active'; ?>
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
                        <h1 class="font-large-1">Add Quote Details Instantly</h1>
                    </div>
                    <div class="section-body">
                        <div class="card col-8">
                            <div class="card-body p-0">
                                <form action="{{ url('backend/price/add-detail/' . $price->id_quote) }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id_quote" value="{{ $price->id_quote }}">
                                    <input type="hidden" name="type" value="2">
                                    <!-- form update -->
                                    <div class="form-group row ml-4 mt-5">
                                        <label for="" class="col-md-2 col-form-label">POD Date <font color="red">*
                                            </font> :</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="VDT" name="VDT" value=""
                                                required>
                                        </div>
                                        <label for="" class="col-md-2 col-form-label">All in rate <font color="red">
                                                *
                                            </font> :</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="rate" name="rate" value=""
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row ml-4 mt-5">
                                        <label for="" class="col-md-2 col-form-label">Privilege :</label>
                                        <div class="col-md-4">
                                            <input type="checkbox" id="privilege" name="privilege" value="1">
                                            Valid : 24Hrs & Mega Sale
                                        </div>
                                    </div>
                                    <div class="form-group row ml-4 mt-5">
                                        <label for="" class="col-md-2 col-form-label">Special Price
                                            :</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="special_rate"
                                                name="special_rate" value="">
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
                                        <div class="col-md-6 text-right">
                                            <button type="submit" class="btn btn-success btn-sm waves-effect">
                                                <i class="fa fa-save font-size-16 align-middle mr-1"></i>Save
                                            </button>
                                        </div>
                                    </div><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            
            @include('include.footer')
        </div>
    </div>
    @include('include.script')
    <!-- datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/ui/1.13.0-rc.2/jquery-ui.min.js"></script>
    <script>
        $(function () {
            $("#VDT").datepicker({
                dateFormat: 'dd/mm/yy',
                minDate: "today",
                setDate: "+1d"
            });
        });

    </script>
</body>

</html>
