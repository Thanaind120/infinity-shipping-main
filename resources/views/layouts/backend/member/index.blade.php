<!DOCTYPE html>

<html lang="en">



<head>

    @include('include.style')

    <?php $active[9] = 'active'; ?>

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

                        <h1>Member</h1>

                    </div>



                    <div class="section-body">

                        <div class="card">

                            <div class="card-body">

                                <div class="table-responsive">

                                    <table id="simpletable" class="table table-bordered">

                                        <thead>

                                            <tr>

                                                <th scope="col" class="text-center">#</th>

                                                <th scope="col" class="text-center"><i class="fa fa-mail"></i>

                                                    Email

                                                </th>

                                                <th scope="col" class="text-center">Full Name</th>

                                                <th scope="col" class="text-center">Phone Number</th>

                                                <th scope="col" class="text-center" width="9%"><i

                                                        class="fa fa-check"></i>

                                                    Status

                                                </th>

                                                @if($check->management_view == 1)

                                                <th scope="col" class="text-center" width="12%"> More Details</th>

                                                @endif

                                                @if($check->management_edit == 1 || $check->management_delete == 1)

                                                <th scope="col" class="text-center" width="16%"><i

                                                        class="fa fa-cog"></i> Tools

                                                </th>

                                                @endif

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php

                                                $i = 0;

                                                foreach ($members as $key=>$val){

                                                $i++

                                            ?>

                                            <tr>

                                                <td class="text-center">{{ $i }}</td>

                                                <td class="text-left">{{ $val->email }}</td>

                                                <td class="text-left"> {{ $val->first_name }} {{ $val->last_name }}

                                                </td>

                                                <td class="text-left">

                                                    02-{{ $val->phone_number }}

                                                </td>

                                                <td class="text-center">

                                                    @if ($val->status == 0)

                                                    <span class="text-danger">Deactive</span>

                                                    @elseif($val->status == 1)

                                                    <span class="text-success">Active</span>

                                                    @elseif($val->status == 2)

                                                    <span class="text-warning">Pending </span>

                                                    @endif

                                                </td>

                                                @if($check->management_view == 1)

                                                <td class="text-center">

                                                    <button class="btn btn-info"

                                                    onclick="view_member({{ $val->id }})">

                                                    View More

                                                </button>

                                                </td>

                                                @endif

                                                @if($check->management_edit == 1 || $check->management_delete == 1)

                                                <td class="text-center">

                                                    @if($check->management_edit == 1)

                                                    <button class="btn btn-warning"

                                                        onclick="update_members({{ $val->id }})">

                                                        <i class="fa fa-edit" title="Edit"></i> Edit

                                                    </button>

                                                    @endif

                                                    @if($check->management_delete == 1)

                                                    <button class="btn btn-danger"

                                                        onclick="delete_members({{ $val->id }})">

                                                        <i class="fa fa-trash" title="Delete"></i> Delete

                                                    </button>

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



        function view_member(id) {

            var _url = "{{ url('backend/member/view') }}" + '/' + id;

            window.location.href = _url;

        };



        function create_members() {

            var _url = "{{ url('backend/member/create') }}";

            window.location.href = _url;

        };



        function update_members(id) {

            var _url = "{{ url('backend/member/edit') }}" + '/' + id;

            window.location.href = _url;

        };



        function delete_members(id) {

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

                        url: "{!! url('/backend/member/delete/" + id + "') !!}",

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

