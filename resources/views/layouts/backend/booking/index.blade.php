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
                                                @if($check->booking_edit == 1)
                                                <th scope="col" class="text-center"><i class="fa fa-check"></i> Status
                                                </th>
                                                @endif
                                                <th scope="col" class="text-center"><i class="fa fa-user"></i> Member
                                                </th>
                                                @if($check->booking_edit == 1 || $check->booking_view == 1)
                                                <th scope="col" class="text-center" width="11%"><i
                                                        class="fa fa-cog"></i> Tools</th>
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
                                                @if($check->booking_edit == 1)
                                                <td class="text-center">
                                                    @if ($val->status == 0)
                                                    <span class="text-danger">Cancel</span>
                                                    @elseif ($val->status == 5)
                                                    <span class="text-success">Draft BL</span>
                                                    @else
                                                    <form id="FormStatus">
                                                        <input type="hidden" class="form-control id_booking"
                                                            name="id_booking" id="id_booking"
                                                            value="{{ $val->id_booking }}">
                                                        <select class="form-control select_data" name="status"
                                                            id="status">
                                                            <option style="color: #4b7cc1"
                                                                {{ ($val->status == 1) ? 'selected' : '' }} value="1">
                                                                Booking Complete</option>
                                                            <option style="color: #4b7cc1"
                                                                {{ ($val->status == 2) ? 'selected' : '' }} value="2">
                                                                Submit SI</option>
                                                            <option style="color: #4b7cc1"
                                                                {{ ($val->status == 3) ? 'selected' : '' }} value="3">
                                                                Final SI issued</option>
                                                            <option style="color: #4b7cc1"
                                                                {{ ($val->status == 4) ? 'selected' : '' }} value="4">SI
                                                                Processing</option>
                                                            <option style="color: #4bc013"
                                                                {{ ($val->status == 5) ? 'selected' : '' }} value="5">
                                                                Draft BL
                                                            </option>
                                                            <option style="color: #ffa426"
                                                                {{ ($val->status == 6) ? 'selected' : '' }} value="6"
                                                                disabled>
                                                                Pending Cancel
                                                            </option>
                                                            <option style="color: #dc3545"
                                                                {{ ($val->status == 0) ? 'selected' : '' }} value="0">
                                                                Cancel</option>
                                                        </select>
                                                    </form>
                                                    @endif
                                                </td>
                                                @endif
                                                <td class="text-left">{{ $val->created_by }}</td>
                                                @if($check->booking_edit == 1 || $check->booking_view == 1)
                                                <td class="text-center">
                                                    @if($val->deadlines != '')
                                                    @if($check->booking_view == 1)
                                                    <button class="btn btn-info"
                                                        onclick="view_booking({{ $val->id_booking }})">
                                                        View More
                                                    </button>
                                                    @endif
                                                    @else
                                                    @if($val->status != 5)
                                                    @if($val->status == 1 || $val->status == 2 || $val->status == 3 ||
                                                    $val->status == 4 || $val->status == 6)
                                                    @if($check->booking_edit == 1)
                                                    <button class="btn btn-warning"
                                                        onclick="update_booking({{ $val->id_booking }})">
                                                        <i class="fa fa-edit" title="Edit"></i> Edit
                                                    </button>
                                                    @endif
                                                    @endif
                                                    @else
                                                    @if($check->booking_view == 1)
                                                    <button class="btn btn-info"
                                                        onclick="view_booking({{ $val->id_booking }})">
                                                        View More
                                                    </button>
                                                    @endif
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

        function view_booking(id) {
            var _url = "{{ url('backend/booking/view') }}" + '/' + id;
            window.location.href = _url;
        };

        function update_booking(id) {
            var _url = "{{ url('backend/booking/edit') }}" + '/' + id;
            window.location.href = _url;
        };

        $(document).on('change', '.select_data', function () {
            var form_tr = $(this).closest('#FormStatus');
            var status = form_tr.find('.select_data').val();
            var id = form_tr.find('.id_booking').val();
            $.ajax({
                url: "{!! url('/backend/booking/update/" + id + "') !!}",
                method: "POST",
                type: "PUT",
                data: {
                    status: status,
                    id: id,
                    '_token': "{{ csrf_token() }}",
                    '_method': "PUT",
                },
                success: function (response) {
                    Swal.fire({
                        position: 'left-end',
                        icon: 'success',
                        title: 'Your status has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        window.location.reload();
                    });
                }
            });

        });

    </script>

</body>

</html>
