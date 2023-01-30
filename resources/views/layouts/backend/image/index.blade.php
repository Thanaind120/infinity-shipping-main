<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <?php $active[4] = 'active'; ?>
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
                        <h1>Slide Image</h1>
                    </div>

                    <div class="section-body">
                        <div class="card">
                            @if($check->home_create == 1)
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <a class="btn btn-success" href="#" onclick="create_image()"><i class="fa fa-plus"
                                            title="Create"></i> Add</a>
                                </div><br>
                            </div>
                            @endif
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="simpletable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center"><i class="far fa-image"></i> Image
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-check"></i>
                                                    Status
                                                </th>
                                                @if($check->home_edit == 1 || $check->home_delete == 1)
                                                <th scope="col" class="text-center"><i class="fa fa-cog"></i> Tools
                                                </th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                foreach ($image as $key=>$val){
                                                $i++
                                            ?>
                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td class="text-center">
                                                    <img src="{{ $val->img_image != '' ? asset('backend/assets/img/image/' . $val->img_image) : asset('backend/assets/img/image/nopic.jpg') }}"
                                                        class="img-slide" width="100">
                                                </td>
                                                <td class="text-center">
                                                    @if ($val->status == 1)
                                                    <span class="text-success">Active</span>
                                                    @else
                                                    <span class="text-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                @if($check->home_edit == 1 || $check->home_delete == 1)
                                                <td class="text-center">
                                                    @if($check->home_edit == 1)
                                                    <button class="btn btn-warning"
                                                        onclick="update_image({{ $val->id }})">
                                                        <i class="fa fa-edit" title="Edit"></i> Edit
                                                    </button>
                                                    @endif
                                                    @if($check->home_delete == 1)
                                                    <button class="btn btn-danger"
                                                        onclick="delete_image({{ $val->id }})">
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

        function create_image() {
            var _url = "{{ url('backend/home/image/create') }}";
            window.location.href = _url;
        };

        function update_image(id) {
            var _url = "{{ url('backend/home/image/edit') }}" + '/' + id;
            window.location.href = _url;
        };

        function delete_image(id) {
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
                        url: "{!! url('/backend/home/image/delete/" + id + "') !!}",
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
