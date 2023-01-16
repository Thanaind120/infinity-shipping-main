<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <?php $active[15] = 'active'; ?>
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
                        <h1>Booking</h1>
                    </div>
                    <div class="section-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="simpletable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center">Shipment Ref.</th>
                                                <th scope="col" class="text-center">Company</th>
                                                <th scope="col" class="text-center"><i class="fa fa-user"></i>
                                                    Customer name</th>
                                                <th scope="col" class="text-center"><i class="fa fa-book"></i>
                                                    Booking Party
                                                </th>
                                                <th scope="col" class="text-center">Actual Shipper</th>
                                                <th scope="col" class="text-center"><i class="fa fa-check"></i> Status
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-user"></i> Member
                                                </th>
                                                <th scope="col" class="text-center" width="11%"><i
                                                        class="fa fa-cog"></i> Tools</th>
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
                                                <td class="text-center">{{ $val->shipment_code }}</td>
                                                <td class="text-center">{{ $val->company_name }}</td>
                                                <td class="text-center">{{ $val->customer_name }}</td>
                                                <td class="text-center">{{ $val->booking_party }}</td>
                                                <td class="text-center">{{ $val->actual_shipper }}</td>
                                                <td class="text-center">
                                                    @if($val->status == 5)
                                                    <span class="text-success">Booking Complete</span>
                                                    @elseif($val->status == 4)
                                                    <span class="text-info">SI Processing</span>
                                                    @elseif($val->status == 3)
                                                    <span class="text-primary">Final SI issued</span>
                                                    @elseif($val->status == 2)
                                                    <span class="text-primary">Submit SI</span>
                                                    @elseif($val->status == 1)
                                                    <span class="text-primary">Draft BL</span>
                                                    @elseif($val->status == 0)
                                                    <span class="text-danger">Cancel</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $val->created_by }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-info"
                                                        onclick="view_booking({{ $val->id_booking }})">
                                                        View More
                                                    </button>
                                                </td>
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

        function view_booking(id) {
            var _url = "{{ url('backend/booking/view') }}" + '/' + id;
            window.location.href = _url;
        };

    </script>
</body>

</html>
