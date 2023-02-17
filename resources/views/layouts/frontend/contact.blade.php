<!doctype html>
<html lang="th">

<head>
    <title>Contact us - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
</head>

<body>
    @include('layouts.frontend.inc_navbar')
    <div class="bg-white">
        <div class="container py-5">
            <div class="row">
                <div class="col-xl-6">
                    <div class="pe-xxl-5">
                        <h2 class="text-navy fw-bold">Contact Us</h2>
                        <div class="lineL-red mb-4"></div>

                        <p class=""><?php echo nl2br($contact->contact_description); ?></p>
                        <div class="alert alert-primary mb-3">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <i class='bx bx-map bx-md'></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fw-bold">INFINITY SHIPPING (THAILAND) CO.,LTD</h6>
                                    <p class="mb-0"><?php echo nl2br($contact->contact_address); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="tel:+6626340610">
                                    <div class="alert alert-primary mb-3">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <i class='bx bx-phone bx-md'></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fw-bold">PHONE NUMBER </h6>
                                                <p class="mb-0">{{ $contact->contact_phone }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="tel:+6626340610">
                                    <div class="alert alert-primary mb-3">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <i class='bx bx-printer bx-md'></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fw-bold">FAX</h6>
                                                <p class="mb-0">{{ $contact->contact_fax }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="mailto:sales5@infinity.co.th">
                                    <div class="alert alert-primary mb-3">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <i class='bx bx-envelope bx-md'></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fw-bold">EMAIL</h6>
                                                <p class="mb-0">{{ $contact->contact_email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="http://line.me/ti/p/{{ $contact->contact_line }}">
                                    <div class="alert alert-primary mb-3">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <i class='fab fa-line fa-2x'></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fw-bold">LINE</h6>
                                                <p class="mb-0">{{ $contact->contact_line }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="alert alert-primary mb-3">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <i class='bx bx-mobile-vibration bx-md'></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fw-bold">SALES & MARKETING TEAM</h6>
                                    <div class="list-group">
                                        @foreach ($contact_sale as $val)
                                            <a href="tel:{{ $val->tel }}"
                                                class="list-group-item list-group-item-action list-group-item-primary border-0">
                                                <dl class="row mb-0">
                                                    <dt class="col-sm-6">{{ $val->sales_name }}</dt>
                                                    <dd class="col-sm-6 mb-0">{{ $val->tel }}</dd>
                                                </dl>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <?php echo nl2br($contact->link_map); ?>

                </div>
            </div>
        </div>
    </div>
    @include('layouts.frontend.inc_footer')
    <script>
        $('#linkMenuTop .nav-item').eq(6).addClass('active');
    </script>
</body>

</html>
