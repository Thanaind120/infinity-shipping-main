<!doctype html>
<html lang="th">

<head>
    <title>Login - Infinity Shipping (Thailand)Co.,Ltd.</title>
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
                            <div class="col-sm-6 bg-login">
                                <div class="box-login-left text-center">
                                    <h2 class="fw-bold text-navy mt-0 mt-md-5">Welcome to infinity</h2>
                                    <p class="text-navy">New Here ?</p>
                                    <a href="{{ url('/register') }}" class="btn btn-navy rounded-pill px-4">Create
                                        account</a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box-login-right">
                                    <h2 class="fw-bold text-navy text-center">Login</h2>
                                    <div class="lineR-center"></div>
                                    <form class="row g-3" action="{{ url('/member/in_progress') }}" method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <label for="" class="form-label">Email</label>
                                            <input type="email" class="form-control borderR-6" id=""
                                                placeholder="Email" name="email">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="" class="form-label">Password</label>
                                            <input type="password" class="form-control borderR-6" id=""
                                                placeholder="Password" name="password">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <a href="#" class="link-primary" data-bs-toggle="modal"
                                                data-bs-target="#forgotModal">Forgot Password?</a>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit"
                                                class="btn btn-navy rounded-pill w-100 mb-5">Login</button>
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
    <!-- Modal -->
    <div class="modal fade" id="forgotModal" tabindex="-1" aria-labelledby="forgotModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content borderR-25 p-4">
                <div class="modal-body">
                    <h5 class="modal-title fw-bold" id="forgotModalLabel">Forgot your password?</h5>
                    <p class="small">Please enter the email you use to sign in to Infinity shipping</p>
                    <label for="" class="form-label">Your email</label>
                    <input type="email" class="form-control borderR-6" id="" placeholder="Email">
                    <div class="text-center pt-4">
                        <button type="button" class="btn btn-navy rounded-pill px-4">Request password
                            reset</button><br>
                        <button type="button" class="btn btn-link text-navy" data-bs-dismiss="modal">Back to
                            login</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.frontend.inc_footer')
    <script>
        $('#linkMenuTop .nav-item').eq(0).addClass('active');
    </script>
</body>

</html>
