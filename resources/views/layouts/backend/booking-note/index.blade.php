<!DOCTYPE html>

<html lang="en">



<head>

    @include('include.style')

    <?php $active[20] = 'active'; ?>

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

                        <h1>Notes On Booking</h1>

                    </div>



                    <div class="section-body">

                        <div class="card">

                            <div class="card-body">

                                <div class="table-responsive">

                                    <table id="simpletable" class="table table-bordered">

                                        <thead>

                                            <tr>

                                                <th scope="col" class="text-center">#</th>

                                                <th scope="col" class="text-center"> Remark

                                                </th>

                                                <th scope="col" class="text-center"> Notes

                                                </th>

                                                <th scope="col" class="text-center" width="10%"><i class="fa fa-check"></i> Status

                                                </th>

                                                @if($check->management_edit == 1)

                                                <th scope="col" class="text-center" width="15%"><i class="fa fa-cog"></i> Tools</th>

                                                @endif

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php

                                                $i = 0;

                                                foreach ($remark as $key=>$val){

                                                $i++

                                            ?>

                                            <tr>

                                                <td class="text-center">{{ $i }}</td>

                                                <td class="text-left">{{ $val->remark }}</td>

                                                <td class="text-left">{{ $val->note }}</td>

                                                <td class="text-center">

                                                    @if($val->status == 1)

                                                    <span class="text-success">Active</span>

                                                    @else

                                                    <span class="text-danger">Deactive</span>

                                                    @endif

                                                </td>

                                                @if($check->management_edit == 1)

                                                <td class="text-center">

                                                    <button class="btn btn-warning"

                                                        onclick="update_remark({{ $val->id }})">

                                                        <i class="fa fa-edit" title="Edit"></i> Edit

                                                    </button>

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

        function update_remark(id) {

            var _url = "{{ url('backend/notes-on-booking/edit') }}" + '/' + id;

            window.location.href = _url;

        };

    </script>

</body>



</html>