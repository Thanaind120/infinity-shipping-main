<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <?php $active[8] = 'active'; ?>
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
                        <h1>About Us</h1>
                    </div>

                    <div class="section-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="simpletable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center"><i class="far fa-image"></i> Images
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
                                                foreach ($about as $key=>$val){
                                                $i++
                                            ?>
                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td class="text-center">
                                                    <img src="{{ $val->img_about != '' ? asset('backend/assets/img/about/' . $val->img_about) : asset('backend/assets/img/about/nopic.jpg') }}"
                                                        class="img-slide" width="100">
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
                                                        onclick="update_about({{ $val->id }})">
                                                        <i class="fa fa-edit" title="Edit"></i> Edit
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

        function create_about() {
            var _url = "{{ url('backend/about/create') }}";
            window.location.href = _url;
        };

        function update_about(id) {
            var _url = "{{ url('backend/about/edit') }}" + '/' + id;
            window.location.href = _url;
        };

        function delete_about(id) {
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
                        url: "{!! url('/backend/about/delete/" + id + "') !!}",
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
