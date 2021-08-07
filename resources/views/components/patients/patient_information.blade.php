@include('include.header')

<style>
    .dl{
        display:flex;
        flex-wrap:wrap;
        justify-content:space-between;
        margin:15px 0px;
        border-bottom:1px solid grey;
        text-transform:capitalize;
    }
   #patient_img{
       width:280px;
       height:280px;
       border-radius:20px;
   }

    #patient_history {
        list-style-type:none;
        display:flex;
        flex-wrap:wrap;
        justify-content:space-around;
        line-height:50px;
        background-color:skyblue;
        
    }
    #patient_history li a{
        padding:20px;
        color:white;
    }

    #patient_history li a:hover{
        background-color:red;
        
    }

    #patient_history li a:active{
        background-color:grey;
        color:white;
    }
</style>


@include('include.navbar')    

@include('include.sidebar')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-blue"><i class="fas fa-info"></i> {{ $patient->name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{ route('index') }}"><i class="fas fa-home"></i> Home </a></li>
              <li class="breadcrumb-item"> <a href="{{ route('patients') }}"><i class="fas fa-user-injured"></i> Patients </a></li>
              <li class="breadcrumb-item active"> <a><i class="fas fa-info"></i> Information </a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content-body" style="margin:10px;">
        <div class="row">
            <!-- PATIENT INFORMATION -->
            <div class="col-sm-4">    
                <div class="card">
                    <div class="card-header">
                        <h4>Patient Information</h4>
                    </div>
                    <div class="card-body">
                        <center><img src="{{ asset('patients_images/'.$patient->image) }}" alt="" id="patient_img"></center>
                        <dl class="dl">
                            <dt>Name</dt>
                            <dd>{{ $patient->name }}</dd>
                        </dl>
                        <dl class="dl">
                            <dt>Gender</dt>
                            <dd>{{ $patient->sex }}</dd>
                        </dl>
                        <dl class="dl">
                            <dt>blood_group</dt>
                            <dd>{{ $patient->blood_group }}</dd>
                        </dl>
                        <dl class="dl">
                            <dt>Date of Birth</dt>
                            <dd>{{ $patient->date_of_birth }}</dd>
                        </dl>
                        <dl class="dl">
                            <dt>Phone</dt>
                            <dd>{{ $patient->phone }}</dd>
                        </dl>
                        <dl class="dl">
                            <dt>E-Mail</dt>
                            <dd>{{ $patient->email }}</dd>
                        </dl>
                        <dl class="dl">
                            <dt>Address</dt>
                            <dd>{{ $patient->address }}</dd>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- PATIENT HISTORY -->
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            History
                            <a href="#" class="btn btn-sm btn-outline-success pull-right">Print</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <ul id="patient_history">
                            <li><a href="#">Appointments</a></li>
                            <li><a href="#">Case History</a></li>
                            <li><a href="#">Prescription</a></li>
                            <li><a href="#">Lab</a></li>
                            <li><a href="#">Documents</a></li>
                        </ul>
                        <table class="table">
                            <tr>
                                <th>Appointemnt Type</th>
                                <th>Hospital</th>
                                <th>Doctor</th>
                                <th>Operations</th>
                            </tr>
                            <!-- APPIOINTMENT -->
                            @if( count($appointments) != 0)
                              @foreach($appointments as $appointment)
                              <tr>    
                                <td>{{ $appointment->type }}</td>
                                <td>{{ $locations->find($appointment->location_id)->name }}</td>
                                <!-- IF DOCTOR NOT EMPTY -->
                                @if(empty($doctor) != true)
                                  <td>{{ $doctor->find($appointment->doctor_id)->first_name }}</td>
                                @else
                                  <td>NA</td>
                                @endif    
                              </tr>
                              @endforeach
                            @endif
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
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


    <!-- <script>
        $(document).ready(function(){
            $('#patients_table').DataTable({
                "scrollX": true
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script> -->

@include('include.footer')
