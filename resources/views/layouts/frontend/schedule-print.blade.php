<!DOCTYPE html>
<html lang="en">

<head>
    <title>Print - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
    <style>
        hr {
            border-top: solid 1px #000 !important;
        }

    </style>
</head>

<body>
    <div class="bg-light">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-12 col-lg-10 offset-lg-1">
                    <div class="box-white">
                        <div class="row gx-3">
                            <div class="col-sm-12">
                                @foreach ($Book as $key => $val)
                                <div class="card mb-1">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="d-flex">
                                                <div class="col-sm-3">
                                                    <div class="flex-shrink-0">
                                                        <i class="bx bxs-map text-red bx-sm"></i> Departure
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <p class="mb-0"></p>
                                                        &nbsp;&nbsp;<b>
                                                        <?php
                                                        $date = new DateTime($val->departure);
                                                        $dates = $val->departure;
                                                        $newdate = $date->format(DateTime::RFC822); 
                                                        $explode = explode(" ",$newdate);
                                                        $explodes = explode("-",$dates);
                                                        echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                                        ?>
                                                        </b><br>
                                                        &nbsp;&nbsp;&nbsp;<u
                                                            class="text-navy fw-bold">{{ $val->place_of_departure }}</u>
                                                    </div>
                                                </div>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="col-sm-3">
                                                    <div class="flex-shrink-0">
                                                        <i class="bx bxs-map text-red bx-sm"></i> Arrival
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        &nbsp;&nbsp;<b>
                                                    <?php
                                                    $date = new DateTime($val->arrival);
                                                    $dates = $val->arrival;
                                                    $newdate = $date->format(DateTime::RFC822); 
                                                    $explode = explode(" ",$newdate);
                                                    $explodes = explode("-",$dates);
                                                    echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                                    ?>
                                                        </b><br>
                                                        &nbsp;&nbsp;&nbsp;<u
                                                            class="text-navy fw-bold">{{ $val->place_of_arrival }}</u>
                                                    </div>
                                                </div>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="col-sm-3">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ asset('frontend/images/icon-harbor.png') }}" alt=""
                                                            width="24px">
                                                        Vessal/Voyage
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <?php
                                                        $books = DB::table('schedules')->where('ref_id_booking',$val->id_booking)->where('ship_code', '!=', null)->orderBy('id_schedules', 'ASC')->first();
                                                        ?>
                                                        &nbsp;&nbsp; <u class="text-navy fw-bold">
                                                        <?php 
                                                        $ships = $books->ship_code;
                                                        $explode = explode("/",$ships);
                                                        echo $explode[0];
                                                        ?>
                                                        </u>
                                                        <?php 
                                                        $ships = $books->ship_code;
                                                        $explode = explode("/",$ships);
                                                        echo $explode[1];
                                                        ?>
                                                        <br>
                                                        &nbsp;&nbsp;&nbsp;Transit Time :
                                                        <b>
                                                        <?php 
                                                        $transport1 = DB::table('schedules')->where('ref_id_booking',$val->id_booking)->orderBy('id_schedules', 'ASC')->first();
                                                        $transport2 = DB::table('schedules')->where('ref_id_booking',$val->id_booking)->orderBy('id_schedules', 'DESC')->first();
                                                        $date1 = date_create($transport1->save_datetime);
                                                        $date2 = date_create($transport2->save_datetime);
                                                        $diff = date_diff($date1,$date2);
                                                        $explode = $diff->format("%a days");
                                                        $explodes = explode(" ",$explode);
                                                        echo $explodes[0].' '.'Days';
                                                        ?>
                                                        </b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <i class="bx bx-time text-red bx-sm"></i> <b>Deadlines</b>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fs-12">PORT
                                                    CUT-OFF</span><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b
                                                    class="small">
                                                    <?php
                                                        $date = new DateTime($val->deadlines);
                                                        $dates = $val->deadlines;
                                                        $newdate = $date->format(DateTime::RFC822); 
                                                        $explode = explode(" ",$newdate);
                                                        $explodes = explode("-",$dates);
                                                        echo $explode[1]." ".$explode[2]." ".$explodes[0];
                                                    ?>
                                                </b>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="card-footer bg-white">
                                        <button class="btn btn-more" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseExample" aria-expanded="true"
                                            aria-controls="collapseExample">
                                            <i class='fas fa-chevron-down me-1'></i> Show route details
                                        </button>
                                        <div class="collapse pt-2 show" id="collapseExample">
                                            <ul class="timeline timeline-split">
                                                <?php 
                                                $transport = DB::table('schedules')->where('ref_id_booking',$val->id_booking)->get(); 
                                                ?>
                                                @foreach ($transport as $key => $val2)
                                                <li class="timeline-item">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ $val2->city_name }}</span>
                                                            @if($val2->transport_status == 'ESTIMATE ARRIVAL')
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <i class='bx-sm bx bxs-map text-red'></i>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for=""
                                                                class="form-label mb-0 text-uppercase">{{ $val2->transport_status }}</label>
                                                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                                class="fs-12">{{ $val2->location }}</span>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <font size=-1>{{ $val2->save_datetime }}</font>
                                                            @if ($val2->ship_code != '')
                                                            <div class="d-flex align-items-righ">
                                                                <div class="flex-shrink-0">
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img
                                                                        src="{{ asset('frontend/images/icon-harbor.png') }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    Departing on <u
                                                                        class="text-navy">{{ $val2->ship_code }}</u>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            <br>
                                                            @elseif($val2->transport_status == 'GATE OUT')
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <i class='bx-xs bx bxs-circle text-red'></i>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label
                                                                for=""
                                                                class="form-label mb-0 text-uppercase">{{ $val2->transport_status }}</label>
                                                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                                class="fs-12">{{ $val2->location }}</span>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <font size=-1>{{ $val2->save_datetime }}</font><br>
                                                            @if ($val2->ship_code != '')
                                                            <div class="d-flex align-items-righ">
                                                                <div class="flex-shrink-0">
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img
                                                                        src="{{ asset('frontend/images/icon-harbor.png') }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    Departing on <u
                                                                        class="text-navy">{{ $val2->ship_code }}</u>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            <br>
                                                            @elseif($val2->transport_status == 'ESTIMATE OF DEPARTURE')
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <i class='bx-xs bx bxs-circle text-red'></i>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label
                                                                for=""
                                                                class="form-label mb-0 text-uppercase">{{ $val2->transport_status }}</label>
                                                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                                class="fs-12">{{ $val2->location }}</span>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <font size=-1>{{ $val2->save_datetime }}</font><br>
                                                            @if ($val2->ship_code != '')
                                                            <div class="d-flex align-items-righ">
                                                                <div class="flex-shrink-0">
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img
                                                                        src="{{ asset('frontend/images/icon-harbor.png') }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    Departing on <u
                                                                        class="text-navy">{{ $val2->ship_code }}</u>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            <br>
                                                            @elseif($val2->transport_status == 'TRANSHIP')
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <i class='bx-xs bx bxs-circle text-red'></i>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label
                                                                for=""
                                                                class="form-label mb-0 text-uppercase">{{ $val2->transport_status }}</label>
                                                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                                class="fs-12">{{ $val2->location }}</span>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <font size=-1>{{ $val2->save_datetime }}</font><br>
                                                            @if ($val2->ship_code != '')
                                                            <div class="d-flex align-items-righ">
                                                                <div class="flex-shrink-0">
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img
                                                                        src="{{ asset('frontend/images/icon-harbor.png') }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    Departing on <u
                                                                        class="text-navy">{{ $val2->ship_code }}</u>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            <br>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                                <br>
                                @endforeach
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
    <script>
        window.print();

    </script>
</body>

</html>
