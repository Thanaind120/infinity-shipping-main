<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <?php $active[7] = 'active'; ?>
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
                        <h1>Services</h1>
                    </div>

                    <div class="section-body">
                        <div class="card">
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <a class="btn btn-success" href="#" onclick="create_services()"><i
                                            class="fa fa-plus" title="Create"></i> Add</a>
                                </div><br>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="simpletable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center"><i class="fa fa-user"></i>
                                                    Service Name
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-user"></i>
                                                    Description
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-user"></i>
                                                    Images
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-check"></i>
                                                    Status
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-cog"></i> Tools
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                foreach ($services as $key=>$val){
                                                $i++
                                            ?>
                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td class="text-center">{{ $val->service_name }}</td>
                                                <td class="text-center"> {{ Str::limit($val->service_description, 50) }}
                                                </td>
                                                <td class="text-center">
                                                    <img src="{{ $val->service_images1 != '' ? asset('backend/assets/img/services/' . $val->service_images1) : asset('backend/assets/img/services/nopic.jpg') }}"
                                                        class="img-slide" width="100" height="70">
                                                    <img src="{{ $val->service_images2 != '' ? asset('backend/assets/img/services/' . $val->service_images2) : asset('backend/assets/img/services/nopic.jpg') }}"
                                                        class="img-slide" width="100" height="70">
                                                </td>
                                                <td class="text-center">
                                                    @if ($val->status == 1)
                                                        <span class="text-success">Active</span>
                                                    @else
                                                        <span class="text-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-warning"
                                                        onclick="update_services({{ $val->id }})">
                                                        <i class="fa fa-edit" title="Edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-danger"
                                                        onclick="delete_services({{ $val->id }})">
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

        function create_services() {
            var _url = "{{ url('backend/services/create') }}";
            window.location.href = _url;
        };

        function update_services(id) {
            var _url = "{{ url('backend/services/edit') }}" + '/' + id;
            window.location.href = _url;
        };

        function delete_services(id) {
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
                        url: "{!! url('/backend/services/delete/" + id + "') !!}",
                        data: {
                            '_token': "{{ csrf_token() }}"
                        },
                        success: function(data) {
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
