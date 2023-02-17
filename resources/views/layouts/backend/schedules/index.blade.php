<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <?php $active[17] = 'active'; ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('include.nav')
            @include('include.menu')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Schedules</h1>
                    </div>
                    <div class="section-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="simpletable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center" width="11%">Shipment Ref.</th>
                                                <th scope="col" class="text-center">Company</th>
                                                <th scope="col" class="text-center"><i class="fa fa-user"></i>
                                                    Customer name</th>
                                                <th scope="col" class="text-center"><i class="fa fa-book"></i>
                                                    Booking Party
                                                </th>
                                                <th scope="col" class="text-center">Actual Shipper</th>
                                                <th scope="col" class="text-center" width="12%"><i
                                                        class="fa fa-check"></i> Status
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-user"></i> Member
                                                </th>
                                                @if($check->schedules_create == 1)
                                                <th scope="col" class="text-center" width="12%"><i
                                                        class="fa fa-cog"></i> More Details</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                foreach ($Book as $key=>$val){
                                                $i++     
                                            ?>
                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td class="text-left">{{ $val->shipment_code }}</td>
                                                <td class="text-left">{{ $val->company_name }}</td>
                                                <td class="text-left">{{ $val->customer_name }}</td>
                                                <td class="text-left">{{ $val->booking_party }}</td>
                                                <td class="text-left">{{ $val->actual_shipper }}</td>
                                                <td class="text-center">
                                                    @if ($val->status == 0)
                                                    <span style="color:#dc3545">Cancel</span>
                                                    @elseif ($val->status == 5)
                                                    <span style="color:#4bc013">Draft BL</span>
                                                    @elseif ($val->status == 6)
                                                    <span style="color:#ffa426">Pending Cancel</span>
                                                    @elseif ($val->status == 1)
                                                    <span style="color:#4b7cc1">Booking Complete</span>
                                                    @elseif ($val->status == 2)
                                                    <span style="color:#4b7cc1">Submit SI</span>
                                                    @elseif ($val->status == 3)
                                                    <span style="color:#4b7cc1">Final SI issued</span>
                                                    @elseif ($val->status == 4)
                                                    <span style="color:#4b7cc1">SI Processing</span>
                                                    @endif
                                                </td>
                                                <td class="text-left">{{ $val->created_by }}</td>
                                                @if($check->schedules_create == 1)
                                                <td class="text-center">
                                                    @if ($val->ref_transport_status != 'ESTIMATE ARRIVAL')
                                                    @if ($val->status == 1 || $val->status == 2 || $val->status == 3 || $val->status == 4)
                                                    <button class="btn btn-success"
                                                        onclick="add_transport({{ $val->id_booking }})">
                                                        Add Transport
                                                    </button>
                                                    @endif
                                                    @endif
                                                </td>
                                                @endif
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @include('include.footer')
        </div>
    </div>

    @include('include.script')

    <script>
        $('#simpletable').dataTable();

        function add_transport(id) {
            var _url = "{{ url('backend/schedules/add-detail') }}" + '/' + id;
            window.location.href = _url;
        };

    </script>

</body>

</html>
