@include('include.header')

<style>
    .table td{
        text-transform:capitalize;
    }

    .modal-body{
        color:black;
    }

    .patient_information li{
        list-style:none;
    }


    /* TABLE SCROLL, PAGINATION AND SEARCH BAR */
    #categories_table_filter{
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
    }

    .dtHorizontalExampleWrapper {
        margin: 0 auto;
    }
    #dtHorizontalExample th, td {
        white-space: nowrap;
    }

    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
    }

    .pagination{
        justify-content:flex-end;
    }
    .patient_actions{
        margin:2px;
        display:flex;
        flex-wrap:wrap;
        justify-content:space-around;
    }

    #example1_filter{
        display:flex;
        justify-content:end;
    }
    .pagination{
        display:flex;
        justify-content:end;
    }

</style>

@include('include.navbar')    

@include('doctors.sidebar')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-blue"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{ route('doctor.index') }}"><i class="fas fa-home"></i> Home </a></li>
              <li class="breadcrumb-item active"> <a><i class="fas fa-user-injured"></i> Patients </a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content-body" style="margin:10px;">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-injured"></i> PATIENTS - {{ count($patients) }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>AVATAR</th>
                                    <th>NAME</th>
                                    <th>E-MAIL</th>
                                    <th>PHONE</th>
                                    <th>STATUS</th>
                                    <th>ACTIONS</th>
                                </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1;?>
                                    @if(count($patients) != 0)
                                        @foreach($patients as $patient)
                                        <tr>
                                            <td>{{ $no++ }}</td> 
                                            <td><img src="{{url('patients_images')}}/{{$patient->image}}" class="img-circle elevation-2" style=" width:50px; height:50px "></td> 
                                            <td>{{ $patient->name}}</td> 
                                            <td style="text-transform:none;">{{ $patient->email }}</td> 
                                            <td>{{ $patient->phone }}</td> 
                                            <td>
                                                @if($patient->status == "admitted")
                                                    <p style="color:green; font-weight:bold;">{{ $patient->status }}</p>
                                                @elseif($patient->status == "discharged")
                                                    <p style="color:red; font-weight:bold">{{ $patient->status }}</p>
                                                @else
                                                    <p style="color:blue; font-weight:bold">{{ $patient->status }}</p>
                                                @endif
                                            </td>
                                            <td class="patient_actions">
                                                <!-- ADMIT/DISCHARGE PATIENT -->
                                                {{-- @if($patient->status != "admitted")
                                                    <a href="{{ route('admit_patient', ['patient_id'=>$patient->id]) }}" title="admit" class="btn btn-sm btn-outline-success"><i class="fas fa-procedures"></i></a>
                                                @else
                                                    <a href="{{ route('discharge_patient', ['patient_id'=>$patient->id]) }}" title="discharge"  class="btn btn-sm btn-outline-dark"><i class="fas fa-walking"></i></a>
                                                @endif --}}
                                                
                                                
                                                <!-- VIEW PATIENT -->
                                                <a href="{{ route('doctor.patinet_information', ['patient_id'=>$patient->id]) }}"  class="btn btn-sm btn-outline-primary"><i class="fas fa-info"></i> </a>
                                                
                                                <!-- DELETE PATIENT -->
                                                {{-- <a href="{{ route('doctor.delete_patient', ['patient_id'=>$patient->id]) }}" title="delete" class="btn btn-sm btn-outline-danger" style="color:red;"><i class="fas fa-trash"></i></a> --}}
                                            </td> 
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
        
    </div>
  </div>
  <!-- /.content-wrapper -->


  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <!-- SWEET ALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
      @if(Session::has('patient_deleted'))
      swal({
        title: "PATIENT DELETED",
        text: "{{ Session::get('department_deleted') }}",
        icon: "info",
        button: "CLOSE",
      });
    @endif

    @if(Session::has('patient_registered'))
      swal({
        title: "PATIENT REGISTERED",
        text: "{{ Session::get('patient_registered') }}",
        icon: "success",
        button: "CLOSE",
      });
    @endif

    @if(Session::has('patient_admitted'))
      swal({
        title: "ADMITTED SUCCESSFULLY",
        text: "{{ Session::get('patient_admitted') }}",
        icon: "info",
        button: "CLOSE",
      });
    @endif

    @if(Session::has('patient_discharged'))
      swal({
        title: "DISCHARGED",
        text: "{{ Session::get('patient_discharged') }}",
        icon: "info",
        button: "CLOSE",
      });
    @endif

    @if(Session::has('patient_updated'))
      swal({
        title: "UPDATED",
        text: "{{ Session::get('patient_updated') }}",
        icon: "info",
        button: "CLOSE",
      });
    @endif
  </script>


    <script>
        $(document).ready(function(){
            $('#patients_table').DataTable({
                "scrollX": true
            });
            $('.dataTables_length').addClass('bs-select');

            $("#patient_name_in_registration_modal").change(function(){
                var patient_name = $("#patient_name_in_registration_modal").val();
                $.ajax({
                    url: "{{ route('patients_data') }}",
                    type: "GET",
                    dataType: 'json',
                    success:function(data){
                        var d = data.data
                        d.forEach(function(patient){
                            if(patient.first_name+" "+patient.last_name === $("#patient_name_in_registration_modal").val()){
                                $("#email_in_registraion_modal").val(patient.email);
                                $("#age_in_registraion_modal").val(patient.age);
                                $("#gender_in_registraion_modal").val(patient.gender);
                                // $("#blood_group_in_registraion_modal").val(patient.blood_group);
                                $("#date_of_birth_in_registraion_modal").val(patient.dob);
                                $("#phone_in_registraion_modal").val(patient.mobile);
                                $("#address_in_registraion_modal").val(patient.address);
                                $("#user_id_in_registration_modal").val(patient.id);
                            }else{
                                $("#email_in_registraion_modal").val("");
                                $("#age_in_registraion_modal").val("");
                                $("#gender_in_registraion_modal").val("");
                                // $("#blood_group_in_registraion_modal").val("");
                                $("#date_of_birth_in_registraion_modal").val("");
                                $("#phone_in_registraion_modal").val("");
                                $("#address_in_registraion_modal").val("");
                                $("#user_id_in_registration_modal").val("");
                            }
                        });
                    }
                });
            });
        });
    </script>

@include('include.footer')

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>