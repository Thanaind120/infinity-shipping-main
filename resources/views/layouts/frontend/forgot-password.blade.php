<!doctype html>
<html lang="th">

<head>
    <title>Login - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')

</head>

<body>
    <div class="bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12 col-lg-10 offset-lg-1">
                    <div class="box-white">
                        <div class="row gx-0">
                            <div class="col-sm-6 bg-login">
                                <div class="box-login-left text-center">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <img src="{{ asset('frontend/images/logo.svg') }}" alt="" class="mw-100">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box-login-right">
                                    <h2 class="fw-bold text-navy text-center">Confirm Password</h2>
                                    <div class="lineR-center"></div>
                                    <form class="row g-3" action="{{ url('/member/Forgotpassword/update/' . $member->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $member->id }}">
                                        <div class="col-md-12">
                                            <label for="" class="form-label">Password</label>
                                            <input type="password" class="form-control borderR-6" id="password_1"
                                                placeholder="Password" name="password_1" value="" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control borderR-6" id="password_2"
                                                placeholder="Confirm Password" name="password_2" value="" required>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit"
                                                class="btn btn-navy rounded-pill w-100 mb-5">Submit</button>
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
    <!--sweetalert2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert')
</body>

</html>
