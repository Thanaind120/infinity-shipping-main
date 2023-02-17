<!doctype html>
<html lang="th">

<head>
    <title>About us - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
</head>

<body>
    @include('layouts.frontend.inc_navbar')
    <div class="bg-white">
        <div class="container py-5">
            <div class="row">
                @foreach ($about as $key=>$val)
                <div class="col-sm-6">
                    <div class="pe-5">
                        <h2 class="text-navy fw-bold mb-0">About Us</h2>
                        <h4 class="text-navy fw-bold">INFINITY SHIPPING <span class="text-red">(THAILAND)</span> CO.,LTD
                        </h4>
                        <div class="lineL-red mb-4"></div>
                        {!! $val->description !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <img src="{{ $val->img_about != '' ? asset('backend/assets/img/about/' . $val->img_about) : asset('backend/assets/img/about/nopic.jpg') }}"
                        class="mw-100">
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-7">
                    <h4 class="text-navy fw-bold">If you want to ask for more information.</h4>
                    <p class="mb-0">Have questions or want to consult more information about transportation?</p>
                </div>
                <div class="col-sm-5 text-md-end">
                    <a href="tel:+6626340610" class="btn btn-navy rounded-pill px-4 py-2"><i class="fas fa-phone"></i>
                        Contact here </a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.frontend.inc_footer')
    <script>
        $('#linkMenuTop .nav-item').eq(1).addClass('active');

    </script>
</body>

</html>
