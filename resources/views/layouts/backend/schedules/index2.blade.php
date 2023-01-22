<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <?php $active[17] = 'active'; ?>
    <style>
        .button1 {
            padding: 5px 10px;
        }

    </style>
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
                        <h1><a href="{{ url('/backend/schedules') }}">Schedules</a> > Add Transport</h1>
                    </div>
                    <div class="section-body">
                        <div class="card">
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <a class="btn btn-success"
                                        href="{{ url('/backend/schedules/add-detail/create/'.$Book->id_booking) }}"><i
                                            class="fa fa-plus" title="Create"></i> Add</a>
                                </div><br>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="simpletable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center">City</th>
                                                <th scope="col" class="text-center">Location</th>
                                                <th scope="col" class="text-center">Transport Status</th>
                                                <th scope="col" class="text-center">Ship Name</th>
                                                <th scope="col" class="text-center"><i
                                                        class="fa fa-check"></i> Status
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-user"></i> Member
                                                </th>
                                                <th scope="col" class="text-center" width="15%"><i
                                                        class="fa fa-cog"></i> Tools</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                foreach ($Schedules as $key=>$val){
                                                $i++
                                            ?>
                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td class="text-center">{{ $val->city_name }}</td>
                                                <td class="text-center">{{ $val->location }}</td>
                                                <td class="text-center">{{ $val->transport_status }}</td>
                                                <td class="text-center">{{ $val->ship_code }}</td>
                                                <td class="text-center">
                                                    @if ($val->status == 1)
                                                    <span class="text-success">Active</span>
                                                    @else
                                                    <span class="text-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $val->created_by }}</td>
                                                <td class="text-center">
                                                    <a href="{{ url('/backend/schedules/add-detail/edit/'.$Book->id_booking.'/'.$val->id_schedules) }}"
                                                        class="btn btn-warning button1"><i class="fa fa-edit"
                                                            title="Edit"></i> Edit
                                                    </a>
                                                    <button class="btn btn-danger"
                                                        onclick="delete_transport({{ $val->id_schedules }})">
                                                        <i class="fa fa-trash" title="Delete"></i> Delete
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

        function delete_transport(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{!! url('/backend/schedules/add-detail/delete/" + id + "') !!}",
                        data: {
                            '_token': "{{ csrf_token() }}"
                        },
                        success: function (data) {
                            console.log(data);
                            location.reload();
                        }
                    });
                }
            });
        }

    </script>

</body>

</html>
