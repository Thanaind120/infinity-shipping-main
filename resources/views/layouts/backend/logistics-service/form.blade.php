<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendors/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />
    <?php $active[1] = 'active'; ?>
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
                        @if(!isset($logistics_service_topics))
                        <h1 class="font-large-1">Create Logistics Service Topics</h1>
                        @else
                        <h1 class="font-large-1">Edit Logistics Service Topics</h1>
                        @endif
                    </div>

                    <div class="section-body">
                        <div class="card col-8">
                            <div class="card-body p-0">
                                @if(!isset($logistics_service_topics))
                                <form action="{{ route('topics.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input type="hidden" name="type" value="1">
                                    @else
                                    <form
                                        action="{{ url('backend/home/logistics-service-topics/update/' . $logistics_service_topics->id) }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $logistics_service_topics->id }}">
                                        <input type="hidden" name="type" value="2">
                                        @endif
                                        <!-- form insert -->
                                        @if(!isset($logistics_service_topics))
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Topic :</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="topic" name="topic"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Content :</label>
                                            <div class="col-md-9">
                                                <textarea type="text" id="content" name="content" class="mx-3" cols="62"
                                                    rows="5"></textarea>
                                            </div>
                                        </div>
                                        @else
                                        <!-- End : form insert -->
                                        <!-- form update -->
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Topic :</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="topic" name="topic"
                                                    value="{{ $logistics_service_topics->topic }}">
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Content :</label>
                                            <div class="col-md-9">
                                                <textarea type="text" id="content" name="content" class="mx-3" cols="62"
                                                    rows="5">{{ $logistics_service_topics->content }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label class="col-md-2 col-form-label">Status :</label>
                                            <div class="col-md-10 mt-2">
                                                <div class="custom-control custom-switch">
                                                    @if(empty($logistics_service_topics))
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1" checked>
                                                    @else
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1"
                                                        {{ ( @$logistics_service_topics->status=='1')?'checked':'' }}>
                                                    @endif
                                                    <label class="custom-control-label" for="customSwitch"> Active /
                                                        Deactive</label>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <!-- End : form update -->

                                        <div class="form-group mb-0 row">
                                            <div class="col-md-6">
                                                <a class="btn btn-secondary btn-sm waves-effect"
                                                    href="{{ url("/backend/home/logistics-service-topics") }}">
                                                    <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                                                </a>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button type="submit" class="btn btn-success btn-sm waves-effect">
                                                    <i class="fa fa-save font-size-16 align-middle mr-1"></i>
                                                    @if(!isset($logistics_service_topics)) Save
                                                    @else Update @endif
                                                </button>
                                            </div>
                                        </div><br>
                                        @if(!isset($logistics_service_topics))
                                    </form>
                                    @else
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @include('include.footer')
        </div>
    </div>
    @include('include.script')
</body>

</html>
