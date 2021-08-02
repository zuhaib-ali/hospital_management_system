@include('include.header')

<style>
    .modal-header {
        color:white;
        background-color:darkblue;
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

    .col-md-6{
        text-align:center;
    }

    .patient_actions a{
        width:110px;
        margin:2px;
        display:flex;
        flex-wrap:wrap;
        justify-content:space-around;
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
            <h1 class="m-0">Patients</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{ route('index') }}"><i class="fas fa-home"></i> Home </a></li>
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
            <!-- CARD HEADER -->
            <div class="card-header" style="background-color:darkblue;">
                <p style="color:white;">
                    PATIENTS - {{ count($patients) }}
                    <button class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#add_new_patient_modal"> <i class="fas fa-plus"></i></button>
                    
                    <!-- MODAL TO ADD DEPARMENT -->
                    <form class="form" method="POST" action="{{ route('add_new_patient') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal" tabindex="-1" role="dialog" id="add_new_patient_modal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Register a new patient</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="patient_name">Name</label>
                                                <input type="text" name="patient_name" class="form-control" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="e_mail">E-Mail</label>
                                                <input type="email" name="e_mail" id="department-name" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label for="sex">Sex</label>
                                                <select name="sex"  class="form-control" required>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-sm-4">
                                                <label for="date_of_birth">Date of Birth</label>
                                                <input type="date" name="date_of_birth" class="form-control" required>
                                            </div>

                                            <div class="form-group col-sm-4">
                                                <label for="blood_group">Blood Group</label>
                                                <select name="blood_group"  class="form-control" required>
                                                    <option value="a+">A+</option>
                                                    <option value="b+">B+</option>
                                                    <option value="o+">O+</option>
                                                    <option value="a-">A-</option>
                                                    <option value="b-">B-</option>
                                                    <option value="o-">O-</option>
                                                    <option value="ab+">AB+</option>
                                                    <option value="ab-">AB-</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="doctor">Doctor</label>
                                                <select name="doctor"  class="form-control" required>
                                                    @if(count($doctors) != 0)
                                                        @foreach($doctors as $doctor)
                                                            <option value="{{ $doctor->id }}">{{ $doctor->first_name }} {{ $doctor->last_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-sm-6">
                                                <label for="phone">Phone</label>
                                                <input type="number" name="phone" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea name="address" id="description" cols="30" rows="3" class="form-control" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" value="Register">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /MODAL TO ADD DEPARTMENT -->
                    </form>
                </p>
            </div>

            <!-- CARD BODY -->
            <div class="card-body">
                <table class="table table-striped table-bordered table-sm" cellspacing="0" id="patients_table" style="width:100%">
                    <thead >
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>E-MAIL</th>
                            <th>PHONE</th>
                            <th>BLOOD GROUP</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @if(count($patients) != 0)
                            @foreach($patients as $patient)
                            <tr>
                                <td>{{ $no++ }}</td> 
                                <td>{{ $patient->name}}</td> 
                                <td style="text-transform:none;">{{ $patient->email }}</td> 
                                <td>{{ $patient->phone }}</td> 
                                <td>{{ $patient->blood_group }}</td> 
                                <td class="patient_actions">

                                    <!-- ADMIT/DISCHARGE PATIENT -->
                                    @if($patient->status != "admitted")
                                        <a href="{{ route('admit_patient', ['patient_id'=>$patient->id]) }}"  class="btn btn-sm btn-outline-success"><i class="fas fa-medkit"></i> ADMIT</a>
                                    @else
                                        <a href="{{ route('discharge_patient', ['patient_id'=>$patient->id]) }}"  class="btn btn-sm btn-outline-dark"><i class="fas fa-eject"></i> DISCHARGE</a>
                                    @endif
                                    
                                    
                                    <!-- VIEW PATIENT -->
                                    <a data-toggle="modal" data-target="#patient_id_{{ $patient->id }}"  class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> VIEW</a>

                                    <div class="modal" tabindex="-1" role="dialog" id="patient_id_{{ $patient->id }}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit {{ $patient->patient_name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="department-name">Department Name</label>
                                                        <input type="text" name="department_name" id="department-name" value="{{ $patient->department_name }}" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{ $patient->description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary" value="UPDATE">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /MODAL TO ADD DEPARTMENT -->

                                    
                                    
                                    <!-- EDIT DEARTMENT -->
                                    <a data-toggle="modal" data-target="#department_id_{{ $patient->id }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i> EDIT</a>
                                    
                                    <form class="form" method="POST" action="{{ route('add_new_department') }}">
                                        @csrf
                                        <div class="modal" tabindex="-1" role="dialog" id="department_id_{{ $patient->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit {{ $patient->patient_name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="department-name">Department Name</label>
                                                            <input type="text" name="department_name" id="department-name" value="{{ $patient->department_name }}" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Description</label>
                                                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{ $patient->description }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary" value="UPDATE">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /MODAL TO ADD DEPARTMENT -->
                                    </form>

                                    <!-- DELETE PATIENT -->
                                    <a href="{{ route('delete_patient', ['patient_id'=>$patient->id]) }}" class="btn btn-sm btn-outline-danger" style="color:red;"><i class="fas fa-trash"></i> DELETE</a>
                                </td> 
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
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
  </script>


    <script>
        $(document).ready(function(){
            $('#patients_table').DataTable({
                "scrollX": true
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>

@include('include.footer')
