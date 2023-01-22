<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <?php $active[14] = 'active'; ?>
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
                        <h1>Instant Quote</h1>
                    </div>
                    <div class="section-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="simpletable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center" width="10%">Quote Code</th>
                                                <th scope="col" class="text-center"><i class="fa fa-location-arrow"></i>
                                                    POL</th>
                                                <th scope="col" class="text-center" width="10%"><i
                                                        class="fa fa-calendar"></i>
                                                    POL Date</th>
                                                <th scope="col" class="text-center"><i class="fa fa-map-marker"></i> POD
                                                </th>
                                                <th scope="col" class="text-center" width="10%"><i
                                                        class="fa fa-calendar"></i>
                                                    POD Date</th>
                                                <th scope="col" class="text-center" width="8%"><i
                                                        class="fa fa-check"></i> Status
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-user"></i> Member
                                                </th>
                                                <th scope="col" class="text-center" width="12%"> More Details</th>
                                                <th scope="col" class="text-center"> Reject</th>
                                                <th scope="col" class="text-center" width="11%"><i
                                                        class="fa fa-cog"></i> Tools</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                foreach ($price as $key=>$val){
                                                $i++
                                            ?>
                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td class="text-center">{{ $val->quote_code }}</td>
                                                <td class="text-center">{{ $val->POL }}</td>
                                                <td class="text-center">
                                                    @if($val->VDF != '')
                                                    <?php 
                                                    $date = date_create($val->VDF);
                                                    echo date_format($date,"d/m/Y");
                                                    ?>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $val->POD }}</td>
                                                <td class="text-center">
                                                    @if($val->VDT != '')
                                                    <?php 
                                                    $date = date_create($val->VDT);
                                                    echo date_format($date,"d/m/Y");
                                                    ?>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($val->status == 1)
                                                    <span class="text-success">Confirm</span>
                                                    @else
                                                    <span class="text-danger">Pending</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $val->created_by }}</td>
                                                <td class="text-center">
                                                    @if($val->status == 0)
                                                    <button class="btn btn-success"
                                                        onclick="add_booking({{ $val->id_quote }})">
                                                        <i class="fa fa-plus" title="Create"></i> Add Details
                                                    </button>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($val->status == 0)
                                                    <button class="btn btn-danger"
                                                        onclick="reject_prices({{ $val->id_quote }})">
                                                        Reject
                                                    </button>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-info"
                                                        onclick="view_prices({{ $val->id_quote }})">
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

        function add_booking(id) {
            var _url = "{{ url('backend/price/add-detail') }}" + '/' + id;
            window.location.href = _url;
        };

        function reject_prices(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to reject this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    var _url = "{{ url('backend/price/reject') }}" + '/' + id;
                    window.location.href = _url;
                }
            });
        }

        function view_prices(id) {
            var _url = "{{ url('backend/price/view') }}" + '/' + id;
            window.location.href = _url;
        };

    </script>
</body>

</html>
