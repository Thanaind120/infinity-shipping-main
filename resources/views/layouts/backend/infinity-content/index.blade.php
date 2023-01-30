<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <?php $active[3] = 'active'; ?>
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
                        <h1>Infinity Content</h1>
                    </div>

                    <div class="section-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="simpletable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center"> Topic
                                                </th>
                                                <th scope="col" class="text-center"> Content
                                                </th>
                                                <th scope="col" class="text-center" width="10%"><i class="fa fa-check"></i> Status
                                                </th>
                                                @if($check->home_edit == 1)
                                                <th scope="col" class="text-center" width="15%"><i class="fa fa-cog"></i> Tools</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                foreach ($infinity_content as $key=>$val){
                                                $i++
                                            ?>
                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td class="text-left">{{ $val->topic }}</td>
                                                <td class="text-left">{{ $val->content }}</td>
                                                <td class="text-center">
                                                    @if($val->status == 1)
                                                    <span class="text-success">Active</span>
                                                    @else
                                                    <span class="text-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                @if($check->home_edit == 1)
                                                <td class="text-center">
                                                    <button class="btn btn-warning"
                                                        onclick="update_content({{ $val->id }})">
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

        function create_content() {
            var _url = "{{ url('backend/home/infinity-content/create') }}";
            window.location.href = _url;
        };

        function update_content(id) {
            var _url = "{{ url('backend/home/infinity-content/edit') }}" + '/' + id;
            window.location.href = _url;
        };

        function delete_content(id) {
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
                        url: "{!! url('/backend/home/infinity-content/delete/" + id + "') !!}",
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
