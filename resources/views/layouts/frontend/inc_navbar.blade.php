<div class="sticky-top">
    <div class="bg-navy" id="head-top">
        <div class="container-fluid cf-50">
            <div class="row">
                <div class="col-6">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="http://line.me/ti/p/@infinitythai "><i class="	fab fa-line"></i>
                                <span class="d-none d-md-inline">@infinitythai</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tel:+6626340610"><i class="	fas fa-phone"></i> <span
                                    class="d-none d-md-inline">+662 634 0610</span></a>
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            @if (!isset(Auth::guard('Member')->user()->id))
                            <a class="nav-link" href="{{ url('/login') }}"><i class="	fas fa-user-circle"></i>
                                Login /
                                Register</a>
                            @else
                            <font color="white" size="1">
                                <div class="dropdowns">
                                    <button class="dropbtn"><i class="fas fa-user-circle"></i>
                                        {{ Auth::guard('Member')->user()->first_name }}
                                        {{ Auth::guard('Member')->user()->last_name }}
                                        <i class="fa fa-caret-down"></i>
                                    </button>
                                    <div class="dropdowns-content">
                                        <a href="{{ url('/account') }}"><i class="fas fa-user-circle"></i>&nbsp;
                                            Account</a>
                                        <a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i>&nbsp; Log out</a>
                                    </div>
                                </div>
                            </font>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white" id="menu-top">
        <div class="container-fluid cf-50">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('frontend/images/logo.svg') }}" alt="" class="mw-100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="linkMenuTop">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/service') }}">SERVICES</a>
                    </li>
                    @if (!isset(Auth::guard('Member')->user()->id))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">PRICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">BOOKING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">SCHEDULES</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/price') }}">PRICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/booking') }}">BOOKING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/schedule') }}">SCHEDULES</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">CONTACT US</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="flBtnCntr">
        <button class="flBtnBox big"><i class='bx bx-conversation'></i></button>
        <div class="flBtns">
            <a class="flBtnBox small" href="http://line.me/ti/p/@infinitythai"><img
                    src="{{ asset('frontend/images/line-icon.png') }}" alt=""></a>
            <a class="flBtnBox small" href="tel:+6626340610"><i class='bx bxs-phone-call'></i></a>
            <a class="flBtnBox small" href="mailto:sales5@infinity.co.th"><i class='bx bxs-envelope'></i></a>
        </div>
    </div>
</div>
