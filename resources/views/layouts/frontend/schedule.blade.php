<!doctype html>
<html lang="th">

<head>
    <title>Schedules - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
</head>

<body>
    @include('layouts.frontend.inc_navbar')
    <div class="bg-light">
        <div class="container-fluid cf-50 py-5">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h1 class="fw-bold text-navy">Schedules</h1>
                    <div class="lineR-left"></div>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card p-3 mb-3">
                                <form class="row" action="schedule-result.php">
                                    <div class="col-12 col-md-4 col-xl-12">
                                        <label for="" class="form-label"><b>Place of receipt</b></label>
                                        <div class="box-location">
                                            <input type="text" class="form-control borderR-6" placeholder="Location" />
                                            <span class="icon-input bx bx-map text-muted"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-block d-md-none d-xl-block">
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-12 mb-3">
                                        <label for="" class="form-label"><b>From</b><span
                                                class="text-muted fw-light">(City, Country/Region)</span></label>
                                        <div class="box-location mb-1">
                                            <input type="text" class="form-control borderR-6" placeholder="Location" />
                                            <span class="icon-input bx bx-map text-muted"></span>
                                        </div>
                                        <!-- <div class="form-check">
                                            <input class="form-check-input" type="radio" name="from" id="from1" checked>
                                            <label class="form-check-label" for="from1">
                                                Merchant Haulage (CY)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="from" id=from2">
                                            <label class="form-check-label" for="from2">
                                                Carrier Haulage (SD)
                                            </label>
                                        </div> -->
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-12">
                                        <label for="" class="form-label"><b>To</b><span
                                                class="text-muted fw-light">(City, Country/Region)</span></label>
                                        <div class="box-location mb-1">
                                            <input type="text" class="form-control borderR-6" placeholder="Location" />
                                            <span class="icon-input bx bx-map text-muted"></span>
                                        </div>
                                        <!-- <div class="form-check">
                                            <input class="form-check-input" type="radio" name="to" id="to1" checked>
                                            <label class="form-check-label" for="to1">
                                                Merchant Haulage (CY)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="to" id=to2">
                                            <label class="form-check-label" for="to2">
                                                Carrier Haulage (SD)
                                            </label>
                                        </div> -->
                                    </div>
                                    <div class="col-12 d-block d-md-none d-xl-block">
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-12">
                                        <label for="" class="form-label"><b>Date</b></label>
                                        <select class="form-select mb-2">
                                            <option value="1">Departing</option>
                                            <option value="2">Arriving by</option>
                                        </select>
                                        <input type="date" class="form-control" id="">
                                    </div>
                                    <div class="col-12 d-block d-md-none d-xl-block">
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-12">
                                        <label for="" class="form-label"><b>Container type</b></label>
                                        <select class="form-select mb-1">
                                            <option value="1">20' Dry Standard</option>
                                            <option value="2">20' Dry High Cube</option>
                                            <option value="3">40' Dry High Cube</option>
                                        </select>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Cargo requires
                                                temperature control</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-12 pt-3">
                                        <button type="submit" class="btn btn-navy rounded-pill w-100"><i
                                            class="fas fa-search"></i> Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            <h6>Wait for searching ...</h6>
                            <div class="animation-wrapper">
                                <div class="water">
                                    <ul class="waves">
                                        <!-- <li class="wave-one" style="background-image: url('https://i.postimg.cc/7LtCC11Y/wave1.png');"></li> -->
                                        <!-- <li class="wave-two" style="background-image: url('images/cloud.png');"></li> -->
                                        <li class="wave-three" style="background-image: url('frontend/images/wave-2.png');"></li>
                                        <li class="wave-four" style="background-image: url('frontend/images/wave-3.png');"></li>
                                    </ul>
                                </div>
                                <div class="boat" style="background-image: url('frontend/images/animate-ship.png');"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="finishQuoteModal" tabindex="-1" aria-labelledby="finishQuoteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content borderR-25 p-4">
                <div class="modal-body text-center">
                    <i class='bx bx-check-circle text-green fs-9 mb-3'></i>
                    <h5 class="fw-bold" id="finishQuoteModalLabel">We have successfully received your request for
                        quotation.</h5>
                    <p>When we have already evaluated, you can check the price information on <a href=""
                            class="text-navy">your account page.</a></p>
                    <div class="text-center pt-4">
                        <button type="button" class="btn btn-navy rounded-pill px-4"
                            data-bs-dismiss="modal">OK</button><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
     @include('layouts.frontend.inc_footer') 
    <script>
        $('#linkMenuTop .nav-item').eq(5).addClass('active');
    </script>
    <script>
        $(".btn-more").click(function () {
            if ($(".btn-more").hasClass("collapsed")) {
                $(this).html("<i class='fas fa-chevron-down me-1'></i> Show route details");
            } else {
                $(this).html("<i class='fas fa-chevron-up me-1'></i> Hide route details");
            }

            $(".btn-more").toggleClass("collapsed");
        });
    </script>
</body>

</html>