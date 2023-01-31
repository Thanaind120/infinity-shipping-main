{{-- <script>import swal from 'sweetalert';</script> --}}

@if ($message = Session::get('success'))
<script type="text/javascript">
    swal.fire({
        icon:'success',
        title:'Success!',
        text:"{{Session::get('success')}}",
        // timer:2500,
        type:'success'
    }).then((value) => {
        // window.location.reload();

    }).catch(swal.noop);
</script>

@endif

@if ($message = Session::get('login'))
<script type="text/javascript">
    swal.fire({
        icon:'success',
        title:'Success!',
        text:"{{Session::get('login')}}",
        // timer:2500,
        type:'success'
    }).then((value) => {
        // window.location.reload();
    }).catch(swal.noop);
</script>

@endif

@if ($message = Session::get('email'))
<script type="text/javascript">
    swal.fire({
        icon:'success',
        title:'Success!',
        text:"{{Session::get('email')}}",
        // timer:2500,
        type:'success'
    }).then((value) => {
        // window.location.reload();
    }).catch(swal.noop);
</script>

@endif

@if ($message = Session::get('error'))
<script type="text/javascript">
    swal.fire({
        title:'Error!',
        text:"{{Session::get('error')}}",
        timer:3000,
        type:'error'
    }).then((value) => {
    }).catch(swal.noop);
</script>
@endif

@if ($message = Session::get('warning'))
<script type="text/javascript">
    swal.fire({
        icon: 'error',
        title:'Warning!',
        text:"{{Session::get('warning')}}",
        // timer:3000,
        type:'warning'
    }).then((value) => {
        // window.location.reload();
    }).catch(swal.noop);
</script>
@endif

@if ($message = Session::get('loginfail'))
<script type="text/javascript">
    swal.fire({
        title:'Sorry!',
        text:"{{Session::get('loginfail')}}",
        type:'error'
    }).then((value) => {
    }).catch(swal.noop);
</script>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Please check the form below for errors
</div>
@endif
