<!doctype html>
<html lang="th">

<head>
    <title>{{ $services->service_name }} - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
</head>

<body>
    @include('layouts.frontend.inc_navbar')
    <div class="bg-white">
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-6">
                    <div class="pe-5">
                        <h2 class="text-navy fw-bold">{{ $services->service_name }}</h2>
                        <div class="lineL-red mb-4"></div>
                        <p class="text-justify">
                            <?php echo nl2br($services->service_description); ?>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('backend/assets/img/services/' . $services->service_images1) }}"
                        class="w-100 mw-100 mb-2">
                    <img src="{{ asset('backend/assets/img/services/' . $services->service_images2) }}"
                        class="w-100 mw-100">
                </div>
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
                    <a href="tel:{{ $contact->contact_phone }}" class="btn btn-navy rounded-pill px-4 py-2"><i
                            class="fas fa-phone"></i>
                        Contact here</a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.frontend.inc_footer')
    <script>
        $('#linkMenuTop .nav-item').eq(2).addClass('active');
    </script>
</body>

</html>
