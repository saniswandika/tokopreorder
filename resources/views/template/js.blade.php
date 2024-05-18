<!-- plugins:js -->
<script src="{{asset('template/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('template/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('template/assets/vendors/jquery-circle-progress/js/circle-progress.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('template/assets/js/off-canvas.js')}}"></script>
<script src="{{asset('template/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('template/assets/js/misc.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('template/assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->


<!-- <script src="{{asset('template/assets/js/dashboard.js')}}"></script> -->
<!-- End custom js for this page -->

<script>
    @if(session()->has('success'))
        swal({
            title: "Berhasil!",
            text: "{{session()->get('success')}}",
            icon: "success",
        });
@elseif(session()->has('Failed'))
    swal({
        title: "Failed!",
        text: "{{session()->get('Failed')}}",
        icon: "error",
    });
@endif
</script>

@yield('js')