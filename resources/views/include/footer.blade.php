<footer class="main-footer">
    <strong>Copyright &copy; 2021-22 .</strong> All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <p class=""> Coded with
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="rgba(231, 81, 90, 0.4196078431)"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-heart">
                <path style="color:#e7515a;"
                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                </path>
            </svg>
        </p>
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.doctor_appointment').select2();
    });

    $(document).ready(function() {
        $('#divs').fadeOut(4000);
    });

    $(document).on("change","select.role_change",function(){
        let role = $(this).children("option:selected").text();
        $(document).find("input.role_name").val(role);
    });


    $(document).on('change', '.doctor_appointment', function(){
        console.log('hellow rold');
        $.ajax({
            url: "{{ url('user/get-doctor-for-appointment') }}"+"/"+$(this).val(),
            type:"GET",
            success:function(data){
                $('#appointment-doctor-name').text(data.username);
                $('#appointment-doctor-email').text(data.email);
                $('#appointment-doctor-mobile').text(data.mobile);
                $('#appointment-specialization-name').text(data.specialization);
                $('#appointment-specialization-description').text(data.description);
                $('#appointment-branch-name').text(data.branch);
                $('#appointment-branch-email').text(data.branch_email);
                $('#appointment-branch-address').text(data.branch_address);
                $("#doctor-appointment").prop("hidden", false);
                $("#appointment-submit-button").prop("hidden", false);
            }
        });
    });

    $("#send_mail_trigger").click(function(){
        var id = $(this).attr('data');
        $.ajax({
            url:"{{ url('doctor/get-appointment-for-doctor') }}"+'/'+id,
            type: 'GET',
            success:function(data){
                $('#sendMailModal .modal-title').text("Mail to, "+data.email);
                $('#email_message').text(
                    "You're Informed That Your Appointment Is Fixed, "+
                    "Visit The Hospital "
                );
                
                $('#sendMailModal').modal('show');
            }
        });
        
    });
</script>

<script>
    @if (Session::has('doctor_created'))
        swal("{{ Session::get('doctor_created') }}", "Doctor Added Successfully", "success");
    @endif

    @if (Session::has('doctor_created'))
        swal("{{ Session::get('doctor_created') }}", "Doctor Added Successfully", "success");
    @endif


    @if (Session::has('updated'))
        swal("Doctor Updated", "{{ Session::get('updated') }}", "info");
    @endif


    @if (Session::has('deleted'))
        swal("{{ Session::get('deleted') }}", " Deleted successfully!", "info");
    @endif
</script>

@if (Session::has('staff_success'))
    <script>
        toastr.success("{{ Session::get('staff_success') }}");
    </script>
@endif


@if (Session::has('staff_info'))
    <script>
        toastr.success("{{ Session::get('staff_info') }}");
    </script>
@endif

@if (Session::has('user_deleted'))
    <script>
        toastr.success("{{ Session::get('user_deleted') }}");
    </script>
@endif

@if (Session::has('role_added'))
    <script>
        toastr.success("{{ Session::get('role_added') }}");
    </script>
@endif

@if (Session::has('role_updated'))
    <script>
        toastr.success("{{ Session::get('role_updated') }}");
    </script>
@endif

@if (Session::has('role_deleted'))
    <script>
        toastr.error("{{ Session::get('role_deleted') }}");
    </script>
@endif

@if (Session::has('added'))
    <script>
        toastr.success("{{ Session::get('added') }}");
    </script>
@endif

@if(Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
    </script>
@endif

@if(Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}");
    </script>
@endif

@if(Session::has('info'))
    <script>
        toastr.info("{{ Session::get('info') }}");
    </script>
@endif

@if (Session::has('updated'))
    <script>
        toastr.success("{{ Session::get('updated') }}");
    </script>
@endif

@if (Session::has('deleted'))
    <script>
        toastr.error("{{ Session::get('deleted') }}");
    </script>
@endif

@if (Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}");
    </script>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{{ $error }}");
        </script>
    @endforeach
@endif

</body>

</html>
