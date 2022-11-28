<!doctype html>
<html lang="th">

<head>
    <title>Register - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
</head>

<body>
    @include('layouts.frontend.inc_navbar')
    <div class="bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12 col-lg-10 offset-lg-1">
                    <div class="box-white">
                        <div class="row gx-0">
                            <div class="col-sm-12">
                                <div class="p-2 p-md-5">
                                    <h1 class="fw-bold text-navy text-center">Register</h1>
                                    <div class="lineR-center"></div>
                                    <form class="" id="main_form" action="{{ url('member/store') }}"
                                        method="post">
                                        @csrf
                                        <h5 class="text-navy fw-semibold">Account Setting</h5>
                                        <div class="row g-3 pb-2">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Email <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control borderR-6" name="email"
                                                    id="" placeholder="Email">
                                                <span class="text-danger error-text email_error"></span>

                                            </div>
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="box-password">
                                                    <input id="password-field" type="password"
                                                        class="form-control borderR-6" name="password" value="hello"
                                                        placeholder="Password" required>
                                                    <span toggle="#password-field"
                                                        class="far fa-fw fa-eye field-icon toggle-password"></span>
                                                    <span class="text-danger error-text password_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Confirm Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="box-password">
                                                    <input id="passwordC-field" type="password"
                                                        class="form-control borderR-6" name="confirm_password"
                                                        value="hello" placeholder="Confirm Password" required>
                                                    <span toggle="#passwordC-field"
                                                        class="far fa-fw fa-eye field-icon toggle-password"></span>
                                                    <span class="text-danger error-text confirm_password_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5 class="text-navy fw-semibold">User Information</h5>
                                        <div class="row g-3 pb-2">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">First name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control borderR-6" name="first_name"
                                                    id="" placeholder="Enter your first name">
                                                <span class="text-danger error-text first_name_error"></span>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Last name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control borderR-6" name="last_name"
                                                    id="" placeholder="Enter your last name">
                                                <span class="text-danger error-text last_name_error"></span>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Phone number <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">02 -</span>
                                                    <input type="text" class="form-control" name="phone_number"
                                                        placeholder="xxxxxxx" aria-label="Username"
                                                        aria-describedby="basic-addon1">

                                                </div>
                                                <span class="text-danger error-text phone_number_error"></span>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5 class="text-navy fw-semibold">Company Information</h5>
                                        <div class="row g-3 pb-2">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Company name</label>
                                                <input type="text" class="form-control borderR-6" id=""
                                                    placeholder="Enter Company name">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Company Type</label>
                                                <select class="form-select mb-3" aria-label="Default select example"
                                                    id="selectCompanyT">
                                                    <option selected>Choose company type</option>
                                                    <option value="1">Supplier / Explorter</option>
                                                    <option value="2">Freight Forwarder</option>
                                                    <option value="3">Other</option>
                                                </select>
                                                <div id="boxOther" class="3 box">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter text...">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Address</label>
                                                <input type="text" class="form-control borderR-6" id=""
                                                    placeholder="Enter Address">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">For more information <i
                                                        class="text-muted fw-light">(Optional)</i></label>
                                                <input type="text" class="form-control borderR-6" id=""
                                                    placeholder="Enter more address">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="form-label">City</label>
                                                <input type="text" class="form-control borderR-6" id=""
                                                    placeholder="Enter City">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="form-label">Zip code</label>
                                                <input type="text" class="form-control borderR-6" id=""
                                                    placeholder="Enter zip code">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="form-label">Country / Region</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="">
                                                    <option selected>Choose your country</option>
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
                                                <input type="text" class="form-control borderR-6 mb-3"
                                                    id=""
                                                    placeholder="Enter his/her email address or booking reference">
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
                                            <div class="col-md-12">

                                            </div>
                                            <div class="col-md-8 offset-md-2 text-center">
                                                <div class="card card-body mb-3">Recaptcha</div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input float-none" type="checkbox"
                                                        value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        I have read and agreed to the <a
                                                            href="{{ url('/terms') }}">"Membership
                                                            terms and conditions"</a>
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn btn-navy rounded-pill mb-5 px-5"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#finishRegisterModal">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $("#main_form").on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                        if (data.status == 1 && data.statusCheck == 2) {
                            Swal.fire({
                                title: "สำเร็จ",
                                text: `Load completed ` + data.loadcompleted + ` Record 
                                Load reject ` + data.loadreject + ` Record`,
                                icon: "success",
                                allowOutsideClick: false,
                            }).then((result) => {
                                window.location.href = window.location.origin + '/' +
                                    'perfect' + '/' +
                                    data.segment +
                                    '/' + data.folder;
                            })
                        }
                        if (data.status == 1 && data.statusCheck == 3) {
                            Swal.fire({
                                title: "สำเร็จ",
                                text: `ระบบได้ทำการบันทึกข้อมูลเรียบร้อย`,
                                icon: "success",
                                allowOutsideClick: false,
                            }).then((result) => {
                                window.location.href = window.location.origin + '/' +
                                    'perfect' + '/' +
                                    data.segment +
                                    '/' + data.folder;
                            })
                        }

                    }

                });
            });
        });
    </script>
    @include('layouts.frontend.inc_footer')
    <!-- Modal -->
    {{-- <div class="modal fade" id="finishRegisterModal" tabindex="-1" aria-labelledby="finishRegisterModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content borderR-25 p-4">
                <div class="modal-body text-center">
                    <i class='bx bx-check-circle text-green fs-9 mb-3'></i>
                    <h5 class="fw-bold" id="finishRegisterModalLabel">REGISTERATION SUCCESS</h5>
                    <p>Thank you. You will receive an email to verification account. <br>Please wait for confirmation
                        via email within 1 hour.</p>
                    <div class="text-center pt-4">
                        <button type="button" class="btn btn-navy rounded-pill px-4"
                            data-bs-dismiss="modal">OK</button><br>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <script>
        $('#linkMenuTop .nav-item').eq(0).addClass('active');
    </script>
    <script>
        $(".toggle-password").click(function() {

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
        $(document).ready(function() {
            $("#selectCompanyT").change(function() {
                $(this).find("option:selected").each(function() {
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
