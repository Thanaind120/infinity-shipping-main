<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendors/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />
    <?php $active[17] = 'active'; ?>
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
                        @if (!isset($Schedules))
                        <h1 class="font-large-1">Create Add Transport</h1>
                        @else
                        <h1 class="font-large-1">Edit Add Transport</h1>
                        @endif
                    </div>

                    <div class="section-body">
                        <div class="card col-8">
                            <div class="card-body p-0">
                                @if (!isset($Schedules))
                                <form action="{{ url('/backend/schedules/add-detail/store/'.$Book->id_booking) }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_booking" value="{{ $Book->id_booking }}">
                                    <input type="hidden" name="type" value="1">
                                    @else
                                    <form
                                        action="{{ url('/backend/schedules/add-detail/update/'.$Book->id_booking.'/'.$Schedules->id_schedules) }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id_booking" value="{{ $Book->id_booking }}">
                                        <input type="hidden" name="id_schedules" value="{{ $Schedules->id_schedules }}">
                                        <input type="hidden" name="type" value="2">
                                        @endif
                                        <!-- form insert -->
                                        @if (!isset($Schedules))
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-1 col-form-label">City :</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="city_name" name="city_name"
                                                    value="">
                                            </div>
                                            <label for="" class="col-md-2 col-form-label">Location :</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="location" name="location"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-3 col-form-label">Transport Status :</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="transport_status"
                                                    id="transport_status">
                                                    <option value="">Please Select Transport Status</option>
                                                    <option value="GATE OUT">GATE OUT</option>
                                                    <option value="ESTIMATE OF DEPARTURE">ESTIMATE OF DEPARTURE</option>
                                                    <option value="TRANSHIP">TRANSHIP</option>
                                                    <option value="ESTIMATE ARRIVAL">ESTIMATE ARRIVAL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Ship Name :</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="ship_code" name="ship_code"
                                                    value="">
                                            </div>
                                        </div>
                                        @else
                                        <!-- End : form insert -->
                                        <!-- form update -->
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-1 col-form-label">City :</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="city_name" name="city_name"
                                                    value="{{ $Schedules->city_name }}">
                                            </div>
                                            <label for="" class="col-md-2 col-form-label">Location :</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="location" name="location"
                                                    value="{{ $Schedules->location }}">
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-3 col-form-label">Transport Status :</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="transport_status"
                                                    id="transport_status">
                                                    <option value="">Please Select Transport Status</option>
                                                    <option {{ ($Schedules->transport_status == 'GATE OUT') ? 'selected' : '' }} value="{{ ($Schedules->transport_status == 'GATE OUT') ? $Schedules->transport_status : 'GATE OUT' }}">GATE OUT</option>
                                                    <option {{ ($Schedules->transport_status == 'ESTIMATE OF DEPARTURE') ? 'selected' : '' }} value="{{ ($Schedules->transport_status == 'ESTIMATE OF DEPARTURE') ? $Schedules->transport_status : 'ESTIMATE OF DEPARTURE' }}">ESTIMATE OF DEPARTURE</option>
                                                    <option {{ ($Schedules->transport_status == 'TRANSHIP') ? 'selected' : '' }} value="{{ ($Schedules->transport_status == 'TRANSHIP') ? $Schedules->transport_status : 'TRANSHIP' }}">TRANSHIP</option>
                                                    <option {{ ($Schedules->transport_status == 'ESTIMATE ARRIVAL') ? 'selected' : '' }} value="{{ ($Schedules->transport_status == 'ESTIMATE ARRIVAL') ? $Schedules->transport_status : 'ESTIMATE ARRIVAL' }}">ESTIMATE ARRIVAL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Ship Name :</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="ship_code" name="ship_code"
                                                    value="{{ $Schedules->ship_code }}">
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label class="col-md-2 col-form-label">Status :</label>
                                            <div class="col-md-10 mt-2">
                                                <div class="custom-control custom-switch">
                                                    @if (empty($Schedules))
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1" checked>
                                                    @else
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1"
                                                        {{ @$Schedules->status == '1' ? 'checked' : '' }}>
                                                    @endif
                                                    <label class="custom-control-label" for="customSwitch"> Active /
                                                        Deactive</label>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <!-- End : form update -->
                                        <div class="form-group mb-0 row">
                                            <div class="col-md-6">
                                                <a class="btn btn-secondary btn-sm waves-effect"
                                                    href="{{ url('/backend/schedules/add-detail/'.$Book->id_booking) }}">
                                                    <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                                                </a>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button type="submit" class="btn btn-success btn-sm waves-effect">
                                                    <i class="fa fa-save font-size-16 align-middle mr-1"></i>
                                                    @if (!isset($Schedules))
                                                    Save
                                                    @else
                                                    Update
                                                    @endif
                                                </button>
                                            </div>
                                        </div><br>
                                        @if (!isset($Schedules))
                                    </form>
                                    @else
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @include('include.footer')
        </div>
    </div>

    @include('include.script')
</body>

</html>
