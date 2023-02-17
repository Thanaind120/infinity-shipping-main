<!DOCTYPE html>

<html lang="en">



<head>

    @include('include.style')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link rel="stylesheet"

        href="{{ asset('backend/assets/vendors/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />

    <?php $active[9] = 'active'; ?>

</head>

<style>

    textarea {

        outline: none !important;

        border-color: #e4e6fc;

        border-radius: 4px;

        width: 100%;

    }



</style>



<body>

    <div id="app">

        <div class="main-wrapper">

            @include('include.nav')

            @include('include.menu')

            <!-- Main Content -->

            <div class="main-content">

                <section class="section">

                    <div class="section-header">

                        <h1 class="font-large-1">View Members</h1>

                    </div>



                    <div class="section-body">

                        <div class="card col-8">

                            <div class="card-body p-0">

                                <!-- form View -->

                                <div class="ml-3 mt-3">

                                    <h6 class="text-navy fw-semibold">Account Setting</h6>

                                    <div class="row ml-2">

                                        <div class="col-md-6">

                                            <label for="" class="form-label">Email <span class="text-danger">*</span>

                                                :</label>

                                            <input type="email" class="form-control borderR-6" name="email" id=""

                                                placeholder="Email" value="{{ $members->email }}" readonly>

                                            <span class="text-danger error-text email_error"></span>



                                        </div>

                                    </div>

                                    <hr>

                                    <h6 class="text-navy fw-semibold mt-3">User Information</h6>

                                    <div class="row ml-2">

                                        <div class="col-md-6">

                                            <label for="" class="form-label">First name<span

                                                    class="text-danger">*</span> :</label>

                                            <input type="text" class="form-control borderR-6" name="first_name" id=""

                                                placeholder="Enter your first name" value="{{ $members->first_name }}" readonly>

                                            <span class="text-danger error-text first_name_error"></span>

                                        </div>

                                        <div class="col-md-6">

                                            <label for="" class="form-label">Last name <span

                                                    class="text-danger">*</span> :</label>

                                            <input type="text" class="form-control borderR-6" name="last_name" id=""

                                                placeholder="Enter your last name" value="{{ $members->last_name }}" readonly>

                                            <span class="text-danger error-text last_name_error"></span>

                                        </div>

                                        <div class="col-md-6 mt-2">

                                            <label for="" class="form-label">Phone number <span

                                                    class="text-danger">*</span> :</label>

                                            <div class="input-group">

                                                <span class="input-group-text" id="basic-addon1">02 -</span>

                                                <input type="text" class="form-control" name="phone_number"

                                                    placeholder="xxxxxxx" aria-label="Username"

                                                    aria-describedby="basic-addon1"

                                                    value="{{ $members->phone_number }}" readonly>

                                            </div>

                                            <span class="text-danger error-text phone_number_error"></span>

                                        </div>

                                    </div>

                                    <hr>

                                    <h6 class="text-navy fw-semibold">Company Information</h6>

                                    <div class="row ml-2">

                                        <div class="col-md-6">

                                            <label for="" class="form-label">Company name :</label>

                                            <input type="text" class="form-control borderR-6" name="company_name" id=""

                                                placeholder="Enter Company name " value="{{ $members->company_name }}" readonly>

                                        </div>

                                        <div class="col-md-6">

                                            <label for="" class="form-label">Company Type :</label>

                                            <select class="form-control mb-3" aria-label="Default select example"

                                                id="company_type" name="company_type" readonly>

                                                <option value="" selected>Choose company type</option>

                                                <option value="1"

                                                    {{ "Supplier / Explorter" == $members->company_type ? 'selected' : '' }}>

                                                    Supplier / Explorter</option>

                                                <option value="2"

                                                    {{ "Freight Forwarder" == $members->company_type ? 'selected' : '' }}>

                                                    Freight

                                                    Forwarder</option>

                                                <option value="3"

                                                    {{ "Other" == $members->company_type ? 'selected' : '' }}>

                                                    Other

                                                </option>

                                            </select>

                                            @if ($members->company_type == "Other")

                                            <div id="boxOther" class="3 box">

                                                <input type="text" class="form-control" id="" name="company_type_other"

                                                    placeholder="" value="{{ $members->company_type_other }}" readonly>

                                            </div>

                                            @endif

                                        </div>

                                        <div class="col-md-6 mt-2">

                                            <label for="" class="form-label">Address :</label>

                                            <input type="text" class="form-control borderR-6" name="address" id=""

                                                placeholder="Enter Address" value="{{ $members->address }}" readonly>

                                        </div>

                                        <div class="col-md-6 mt-2">

                                            <label for="" class="form-label">For more information <i

                                                    class="text-muted fw-light">(Optional)</i> :</label>

                                            <input type="text" class="form-control borderR-6" name="address_more" id=""

                                                placeholder="Enter more address" value="{{ $members->address_more }}" readonly>

                                        </div>

                                        <div class="col-md-4 mt-2">

                                            <label for="" class="form-label">City :</label>

                                            <input type="text" class="form-control borderR-6" name="city" id=""

                                                placeholder="Enter City" value="{{ $members->city }}" readonly>

                                        </div>

                                        <div class="col-md-4 mt-2">

                                            <label for="" class="form-label">Zip code :</label>

                                            <input type="text" class="form-control borderR-6" name="zip_code" id=""

                                                placeholder="Enter zip code" value="{{ $members->zip_code }}" readonly>

                                        </div>

                                        <div class="col-md-4 mt-2">

                                            <label for="" class="form-label">Country / Region :</label>

                                            <select class="form-control mb-3" aria-label="Default select example"

                                                id="country_region" name="country_region" readonly>

                                                <option value="" selected>Choose your country</option>

                                                <option value="Thailand"

                                                    {{ "Thailand" == $members->country_region ? 'selected' : '' }}>

                                                    Thailand</option>

                                                <option value="Other"

                                                    {{ "Other" == $members->country_region ? 'selected' : '' }}>

                                                    Other</option>

                                            </select>

                                            @if ($members->country_region == "Other")

                                            <div id="boxOther2" class="Other box2">

                                                <input type="text" class="form-control" id="country_region_other" name="country_region_other"

                                                    placeholder="" value="{{ $members->country_region_other }}" readonly>

                                            </div>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                                <!-- End : form View -->

                                <div class="form-group mb-0 row mt-5">

                                    <div class="col-md-6">

                                        <a class="btn btn-secondary btn-sm waves-effect"

                                            href="{{ url('/backend/member') }}">

                                            <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return

                                        </a>

                                    </div>

                                </div><br>

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

