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
        /* box-shadow: 0 0 10px #719ECE; */
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
                        @if (!isset($members))
                        <h1 class="font-large-1">Create Members</h1>
                        @else
                        <h1 class="font-large-1">Edit Members</h1>
                        @endif
                    </div>

                    <div class="section-body">
                        <div class="card col-8">
                            <div class="card-body p-0">
                                @if (!isset($members))
                                <form action="{{ route('member.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input type="hidden" name="type" value="1">
                                    @else
                                    <form action="{{ url('backend/member/update/' . $members->id) }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $members->id }}">
                                        <input type="hidden" name="type" value="2">
                                        @endif
                                        <!-- form insert -->
                                        @if (!isset($members))
                                        @else
                                        <!-- End : form insert -->
                                        <!-- form update -->
                                        <div class="ml-3 mt-3">
                                            <h6 class="text-navy fw-semibold">Account Setting</h6>
                                            <div class="row ml-2">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Email <span
                                                            class="text-danger">*</span> :</label>
                                                    <input type="email" class="form-control borderR-6" name="email"
                                                        id="" placeholder="Email" value="{{ $members->email }}"
                                                        readonly>
                                                    <span class="text-danger error-text email_error"></span>

                                                </div>
                                            </div>
                                            <hr>
                                            <h6 class="text-navy fw-semibold mt-3">User Information</h6>
                                            <div class="row ml-2">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">First name<span
                                                            class="text-danger">*</span> :</label>
                                                    <input type="text" class="form-control borderR-6" name="first_name"
                                                        id="" placeholder="Enter your first name"
                                                        value="{{ $members->first_name }}">
                                                    <span class="text-danger error-text first_name_error"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Last name <span
                                                            class="text-danger">*</span> :</label>
                                                    <input type="text" class="form-control borderR-6" name="last_name"
                                                        id="" placeholder="Enter your last name"
                                                        value="{{ $members->last_name }}">
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
                                                            value="{{ $members->phone_number }}">
                                                    </div>
                                                    <span class="text-danger error-text phone_number_error"></span>
                                                </div>
                                            </div>
                                            <hr>
                                            <h6 class="text-navy fw-semibold">Company Information</h6>
                                            <div class="row ml-2">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Company name :</label>
                                                    <input type="text" class="form-control borderR-6"
                                                        name="company_name" id="" placeholder="Enter Company name "
                                                        value="{{ $members->company_name }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Company Type :</label>
                                                    <select class="form-control mb-3"
                                                        aria-label="Default select example" id="selectCompanyT"
                                                        name="company_type">
                                                        <option value="" selected>Choose company type</option>
                                                        <option value="Supplier / Explorter"
                                                            {{ "Supplier / Explorter" == $members->company_type ? 'selected' : '' }}>
                                                            Supplier / Explorter</option>
                                                        <option value="Freight Forwarder"
                                                            {{ "Freight Forwarder" == $members->company_type ? 'selected' : '' }}>
                                                            Freight
                                                            Forwarder</option>
                                                        <option value="Other"
                                                            {{ "Other" == $members->company_type ? 'selected' : '' }}>
                                                            Other
                                                        </option>
                                                    </select>
                                                    @if ($members->company_type == "Other")
                                                    <div id="boxOther" class="Other box">
                                                        <input type="text" class="form-control" id=""
                                                            name="company_type_other" placeholder=""
                                                            value="{{ $members->company_type_other }}">
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label for="" class="form-label">Address :</label>
                                                    <input type="text" class="form-control borderR-6" name="address"
                                                        id="" placeholder="Enter Address"
                                                        value="{{ $members->address }}">
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label for="" class="form-label">For more information <i
                                                            class="text-muted fw-light">(Optional)</i> :</label>
                                                    <input type="text" class="form-control borderR-6"
                                                        name="address_more" id="" placeholder="Enter more address"
                                                        value="{{ $members->address_more }}">
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label for="" class="form-label">City :</label>
                                                    <input type="text" class="form-control borderR-6" name="city" id=""
                                                        placeholder="Enter City" value="{{ $members->city }}">
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label for="" class="form-label">Zip code :</label>
                                                    <input type="text" class="form-control borderR-6" name="zip_code"
                                                        id="" placeholder="Enter zip code"
                                                        value="{{ $members->zip_code }}">
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <label for="" class="form-label">Country / Region :</label>
                                                    <input type="text" class="form-control borderR-6"
                                                        name="address_more" id="" placeholder="Country / Region"
                                                        value="{{ $members->country_region }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label class="col-md-2 col-form-label">Status :</label>
                                            <div class="col-md-10 mt-2">
                                                <div class="custom-control custom-switch">
                                                    @if (empty($members))
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1" checked>
                                                    @else
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1"
                                                        {{ @$members->status == '1' ? 'checked' : '' }}>
                                                    @endif
                                                    <label class="custom-control-label" for="customSwitch"> Active /
                                                        Deactive</label>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <!-- End : form update -->

                                        <div class="form-group mb-0 row mt-5">
                                            <div class="col-md-6">
                                                <a class="btn btn-secondary btn-sm waves-effect"
                                                    href="{{ url('/backend/member') }}">
                                                    <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                                                </a>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button type="submit" class="btn btn-success btn-sm waves-effect">
                                                    <i class="fa fa-save font-size-16 align-middle mr-1"></i>
                                                    @if (!isset($members))
                                                    Save
                                                    @else
                                                    Update
                                                    @endif
                                                </button>
                                            </div>
                                        </div><br>
                                        @if (!isset($members))
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
