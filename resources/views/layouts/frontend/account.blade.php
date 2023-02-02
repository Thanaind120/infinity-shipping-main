<!doctype html>
<html lang="th">

<head>
    <title>Profile - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

</head>

<body>
    @include('layouts.frontend.inc_navbar')
    <div class="bg-light">
        <div class="container py-5">
            <div class="box-white p-3 mb-3 borderR-6">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('frontend/images/profile-img.png') }}" alt="..." class="account-img">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h4 class="text-navy mb-0 fw-semibold text-break">
                            {{ Auth::guard('Member')->user()->first_name }}
                            {{ Auth::guard('Member')->user()->last_name }} <button type="button"
                                class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editAccountModal"><i class='bx bxs-edit-alt'></i></button></h4>
                        <p class="small text-muted">Company: {{ Auth::guard('Member')->user()->company_name }}</p>
                        <p class="mb-0"><i
                                class='bx bx-envelope text-red me-2'></i>{{ Auth::guard('Member')->user()->email }}</p>
                    </div>
                </div>
            </div>
            <ul class="nav nav-pills mb-3" id="account-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">History Booking</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="box-white p-3 mb-3 borderR-6">
                        <table id="historyBook" class="display nowrap" style="width:100%">
                            <thead>
                                <tr class="align-top">
                                    <th>Shipment Ref.</th>
                                    <th>POL<br><span class="fw-light">(ETD)</span></th>
                                    <th>Export Voyage Vessel</th>
                                    <th>POD<br><span class="fw-light">(ETA)</span></th>
                                    <th>Status</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Book as $key=>$val)
                                <tr>
                                    <td class="text-navy">{{ $val->shipment_code }}</td>
                                    <td class="text-uppercase">
                                        {{ $val->POL }}
                                        <br>
                                        <span class="text-muted fs-12">
                                            <?php
                                                $date = new DateTime($val->ETD);
                                                $dates = $val->ETD;
                                                $newdate = $date->format(DateTime::RFC822); 
                                                $explode = explode(" ",$newdate);
                                                $explodes = explode("-",$dates);
                                                echo $explode[1]."-".$explode[2]."-".$explodes[0];
                                            ?>
                                        </span>
                                    </td>
                                    <td class="text-uppercase">
                                        {{ $val->EVV }}
                                        <br>
                                        <?php 
                                        $schedules = DB::table('schedules')->where('ref_id_booking',$val->id_booking)->orderby('id_schedules', 'DESC')->limit(1)->get(); 
                                        ?>
                                        @foreach ($schedules as $key=>$val2)
                                        <span class="text-muted fs-12">{{ $val2->city_name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-uppercase">
                                        {{ $val->POD }}
                                        <br>
                                        <span class="text-muted fs-12">
                                            <?php
                                                $date = new DateTime($val->ETA);
                                                $dates = $val->ETA;
                                                $newdate = $date->format(DateTime::RFC822); 
                                                $explode = explode(" ",$newdate);
                                                $explodes = explode("-",$dates);
                                                echo $explode[1]."-".$explode[2]."-".$explodes[0];
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        @if ($val->status == 1)
                                        <span class="badge rounded-pill bg-primary fw-light">Booking Complete</span>
                                        @elseif($val->status == 2)
                                        <span class="badge rounded-pill bg-primary fw-light">Submit SI</span>
                                        @elseif($val->status == 3)
                                        <span class="badge rounded-pill bg-primary fw-light">Final SI issued</span>
                                        @elseif($val->status == 4)
                                        <span class="badge rounded-pill bg-primary fw-light">SI Processing</span>
                                        @elseif($val->status == 5)
                                        <span class="badge rounded-pill bg-success fw-light">Draft BL</span>
                                        @elseif($val->status == 0 || $val->status == 6)
                                        <span class="badge rounded-pill bg-danger fw-light">Cancel</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($val->status == 1 || $val->status == 2 || $val->status == 3 || $val->status
                                        == 4)
                                        <div class="dropdown">
                                            <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#cancelModal_{{ $val->id_booking }}">Cancel</a>
                                                </li>
                                            </ul>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <!-- Cancel Modal -->
                                <div class="modal fade" id="cancelModal_{{ $val->id_booking }}" tabindex="-1"
                                    aria-labelledby="cancelModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <form id="FormCancel" action="{{ url('/account/updates/'.$val->id_booking) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" class="id_booking" name="id_booking"
                                                value="{{ $val->id_booking }}">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="cancelModalLabel">Cancel booking</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <img src="{{ asset('frontend/images/finish-book.png') }}" alt=""
                                                            class="mw-100 mb-3">
                                                        <p>Please wait for the cancellation confirmation by email.</p>
                                                    </div>
                                                    <div class="alert alert-warning">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault" required>
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                CANCELLATION / POSTPONEMENT MUST BE INFORMED WITHIN 7
                                                                DAYS BEFORE THE CLOSING TIME.
                                                                OTHERWISE, WE WILL COLLECT THE PENALTY CHARGE AT THB
                                                                3,000.00 PER CONTAINER FOR CY
                                                                SHIPMENT AND THB 5,000.00 PER CONTAINER FOR CFS
                                                                SHIPMENT.
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger error-text text-center" id="checkalert"
                                                        style="display: none">Please fill
                                                        out this field</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-dark"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger"
                                                        id="ConfirmBtn_Cancel">Confirm cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editAccountModal" aria-labelledby="editAccountModalLabel" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="editAccountModalLabel">Edit profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/account/Allupdate/'.Auth::guard('Member')->user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h5 class="text-navy fw-semibold">Account Setting</h5>
                        <div class="row g-3 pb-2">
                            <div class="col-md-6">
                                <label for="" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control borderR-6" id="email" name="email"
                                    placeholder="Email" value="{{ Auth::guard('Member')->user()->email }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="**********"
                                        @if(Cookie::has('newpassword')) value="{{ Cookie::get('newpassword') }}" @else
                                        value="{{ Cookie::get('password') }}" @endif aria-describedby="button-addon2"
                                        readonly>
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                                        data-bs-target="#changePasswordModal" data-bs-toggle="modal">Change</button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="text-navy fw-semibold">User Information</h5>
                        <div class="row g-3 pb-2">
                            <div class="col-md-6">
                                <label for="" class="form-label">First name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control borderR-6" id="first_name" name="first_name"
                                    placeholder="Enter your first name"
                                    value="{{ Auth::guard('Member')->user()->first_name }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Last name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control borderR-6" id="last_name" name="last_name"
                                    placeholder="Enter your last name"
                                    value="{{ Auth::guard('Member')->user()->last_name }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Phone number <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">02 -</span>
                                    <input type="text" class="form-control" placeholder="xxxxxxx"
                                        aria-label="Phonenumber" aria-describedby="basic-addon1" id="phone_number"
                                        name="phone_number" value="{{ Auth::guard('Member')->user()->phone_number }}"
                                        required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="text-navy fw-semibold">Company Information</h5>
                        <div class="row g-3 pb-2">
                            <div class="col-md-6">
                                <label for="" class="form-label">Company name</label>
                                <input type="text" class="form-control borderR-6" id="company_name" name="company_name"
                                    placeholder="Enter Company name"
                                    value="{{ Auth::guard('Member')->user()->company_name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Company Type</label>
                                <select class="form-select mb-3" aria-label="Default select example" id="company_type"
                                    name="company_type">
                                    <option value="" selected>Choose company type</option>
                                    <option
                                        {{ (Auth::guard('Member')->user()->company_type == 'Supplier / Explorter')? 'selected' : '' }}
                                        value="1">Supplier / Explorter</option>
                                    <option
                                        {{ (Auth::guard('Member')->user()->company_type == 'Freight Forwarder"')? 'selected' : '' }}
                                        value="2">Freight Forwarder</option>
                                    <option
                                        {{ (Auth::guard('Member')->user()->company_type == 'Other')? 'selected' : '' }}
                                        value="3">Other</option>
                                </select>
                                <div id="boxOther" class="3 box">
                                    <input type="text" class="form-control" placeholder="Enter text..."
                                        id="company_type_other" name="company_type_other"
                                        value="{{ Auth::guard('Member')->user()->company_type_other }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Address</label>
                                <input type="text" class="form-control borderR-6" id="address" name="address"
                                    placeholder="Enter Address" value="{{ Auth::guard('Member')->user()->address }}">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">For more information <i
                                        class="text-muted fw-light">(Optional)</i></label>
                                <input type="text" class="form-control borderR-6" id="address_more" name="address_more"
                                    placeholder="Enter more address"
                                    value="{{ Auth::guard('Member')->user()->address_more }}">
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">City</label>
                                <input type="text" class="form-control borderR-6" id="city" name="city"
                                    placeholder="Enter City" value="{{ Auth::guard('Member')->user()->city }}">
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Zip code</label>
                                <input type="text" class="form-control borderR-6" id="zip_code" name="zip_code"
                                    placeholder="Enter zip code" value="{{ Auth::guard('Member')->user()->zip_code }}">
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Country / Region</label>
                                <select class="form-select" aria-label="Default select example" id="country_region"
                                    name="country_region">
                                    <option value="" selected>Choose your country</option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="" class="form-label">Colleague's email <i
                                        class="text-muted fw-light">(Optional)</i></label>
                                <input type="text" class="form-control borderR-6 mb-3" id="colleague_email"
                                    name="colleague_email"
                                    placeholder="Enter his/her email address or booking reference"
                                    value="{{ Auth::guard('Member')->user()->colleague_email }}">
                                <div class="alert alert-warning" role="alert">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class='bx bx-info-circle bx-sm'></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            Your data will be validated faster if you enter the email
                                            address of a colleague who has already registered with us or
                                            a booking reference.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="changePasswordModal" aria-hidden="true" aria-labelledby="changePasswordModal2">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="changePasswordModalLabel2">Change password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/account/update/'.Auth::guard('Member')->user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="" class="form-label">Old Password <span class="text-danger">*</span></label>
                                <div class="box-password">
                                    <input id="password-field" type="password" class="form-control borderR-6"
                                        name="old_password" placeholder="Password" @if(Cookie::has('newpassword'))
                                        value="{{ Cookie::get('newpassword') }}" @else
                                        value="{{ Cookie::get('password') }}" @endif required>
                                    <span toggle="#password-field"
                                        class="far fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">New Password <span class="text-danger">*</span></label>
                                <div class="box-password">
                                    <input id="passwordN-field" type="password" class="form-control borderR-6"
                                        name="new_password" placeholder="Password" value="" required>
                                    <span toggle="#passwordN-field"
                                        class="far fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Confirm Password <span
                                        class="text-danger">*</span></label>
                                <div class="box-password">
                                    <input id="passwordC-field" type="password" class="form-control borderR-6"
                                        name="confirm_password" placeholder="Confirm Password" value="" required>
                                    <span toggle="#passwordC-field"
                                        class="far fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" data-bs-target="#changePasswordModal"
                            data-bs-toggle="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Change
                            password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.frontend.inc_footer')
    <script>
        $(document).ready(function () {
            $('#historyBook').DataTable({
                scrollX: true,
            });
        });

    </script>
    <script>
        $(".toggle-password").click(function () {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

    </script>
    <script>
        $(document).ready(function () {
            var CLASS_DISABLED = "disabled",
                CLASS_ACTIVE = "active",
                CLASS_SIBLING_ACTIVE = "active-sibling",
                DATA_KEY = "pagination";

            $(".pagination").each(initPagination);

            function initPagination() {
                var $this = $(this);

                $this.data(DATA_KEY, $this.find("li").index(".active"));

                $this.find(".prev").on("click", navigateSinglePage);
                $this.find(".next").on("click", navigateSinglePage);
                $this.find("li").on("click", function () {
                    var $parent = $(this).closest(".pagination");
                    $parent.data(DATA_KEY, $parent.find("li").index(this));
                    changePage.apply($parent);
                });
            }

            function navigateSinglePage() {
                if (!$(this).hasClass(CLASS_DISABLED)) {
                    var $parent = $(this).closest(".pagination"),
                        currActive = parseInt($parent.data("pagination"), 10);

                    currActive += 1 * ($(this).hasClass("prev") ? -1 : 1);
                    $parent.data(DATA_KEY, currActive);

                    changePage.apply($parent);
                }
            }

            function changePage(currActive) {
                var $list = $(this).find("li"),
                    currActive = parseInt($(this).data(DATA_KEY), 10);

                $list.filter("." + CLASS_ACTIVE).removeClass(CLASS_ACTIVE);
                $list.filter("." + CLASS_SIBLING_ACTIVE).removeClass(CLASS_SIBLING_ACTIVE);

                $list.eq(currActive).addClass(CLASS_ACTIVE);

                if (currActive === 0) {
                    $(this).find(".prev").addClass(CLASS_DISABLED);
                } else {
                    $list.eq(currActive - 1).addClass(CLASS_SIBLING_ACTIVE);
                    $(this).find(".prev").removeClass(CLASS_DISABLED);
                }

                if (currActive == ($list.length - 1)) {
                    $(this).find(".next").addClass(CLASS_DISABLED);
                } else {
                    $(this).find(".next").removeClass(CLASS_DISABLED);
                }
            }
        });

    </script>
    <script>
        $(document).ready(function () {
            $("#company_type").change(function () {
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
