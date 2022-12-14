@include('include.header')

<style>
    .card-header, .modal-header{
        background-color:skyblue;
        color:white;
    }

    .modal-body{
        color:black;
    }
    
    .patient_information li{
        list-style:none;
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

    .patient_actions{
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
            <h1 class="m-0 text-red"> <i class="fas fa-walking"></i> Discharged</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{ route('index') }}"><i class="fas fa-home"></i> Home </a></li>
              <li class="breadcrumb-item"> <a href="{{ route('patients') }}"><i class="fas fa-user-injured"></i> Patient </a></li>
              <li class="breadcrumb-item active"> <a><i class="fas fa-walking"></i> Discharged </a></li>
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
            <div class="card-header">
                    DISCHARGED ({{ count($patients->where('status', 'discharged')) }})
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
                                            <div class="form-group col-sm-3">
                                                <label for="sex">Sex</label>
                                                <select name="sex"  class="form-control" required>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-sm-3">
                                                <label for="image">Age</label>
                                                <input type="text" name="age" class="form-control" required>
                                            </div>

                                            <div class="form-group col-sm-3">
                                                <label for="date_of_birth">Date of Birth</label>
                                                <input type="date" name="date_of_birth" class="form-control" required>
                                            </div>

                                            <div class="form-group col-sm-3">
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
                                <td>{{ $patient->blood_group}}</td> 
                                <td class="patient_actions">

                                    <!-- ADMIT/DISCHARGE PATIENT -->
                                    @if($patient->status != "Admitted")
                                        <a href="{{ route('admit_patient', ['patient_id'=>$patient->id]) }}"  class="btn btn-sm btn-outline-success"><i class="fas fa-medkit"></i> ADMIT</a>
                                    @elseif($patient->status != "Discharged")
                                        <a href="{{ route('discharge_patient', ['patient_id'=>$patient->id]) }}"  class="btn btn-sm btn-outline-dark"><i class="fas fa-eject"></i> DISCHARGE</a>
                                    @endif
                                    
                                    
                                    <!-- VIEW PATIENT -->
                                    <a data-toggle="modal" data-target="#patient_id_{{ $patient->id }}"  class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> </a>
                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="patient_id_{{ $patient->id }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4>{{ $patient->name }}  <span style="color:darkblue;">{{ $patient->status }}</span></h4>
                                                    </div>
                                                    <div class="card-body patient_information">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <img src="{{ asset('patients_images/'.$patient->image) }}" style="width:250px; height:300px; border-radius:10%;">
                                                            </div>
                                                            <div class="col-sm-8 p-3">
                                                                <table style="width:100%; height:100%;">
                                                                    <tr>
                                                                        <th>Name:</th>
                                                                        <td>{{ $patient->name }}</td>
                                                                        <th>Age:</th>
                                                                        <td>NA</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Sex:</th>
                                                                        <td>{{ $patient->sex }}</td>
                                                                        <th>Blood Group:</th>
                                                                        <td>{{ $patient->blood_group }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>E-Mail:</th>
                                                                        <td>{{ $patient->email }}</td>
                                                                        <th>Phone:</th>
                                                                        <td>{{ $patient->phone}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Doctor:</th>
                                                                        <td>{{ $doctors->find($patient->doctor_id)->first_name }} {{ $doctors->find($patient->doctor_id)->last_name }}</td>
                                                                        <th>Date of Birth:</th>
                                                                        <td>{{ $patient->date_of_birth }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Address:</th>
                                                                        <td>{{ $patient->address }}</td>
                                                                    </tr>

                                                                </table>
                                                                <!-- <ul>
                                                                    <li><h6>Name</h6> <p>{{ $patient->name }}</p></li>
                                                                    <li><h6>Age</h6> <p>{{ $patient->age }}</p></li>
                                                                    <li><h6>Gender</h6> <p>{{ $patient->sex }}</p></li>
                                                                    <li><h6>Blood Group</h6> <p>{{ $patient->blood_group }}</p></li>
                                                                    <li><h6>E-Mail</h6> <p>{{ $patient->email }}</p></li>
                                                                </ul> -->
                                                            </div>
                                                            <!-- <div class="col-sm-4">
                                                                <ul>
                                                                    <li><h6>Address</h6> <p>{{ $patient->address }}</p></li>
                                                                    <li><h6>Phone</h6> <p> {{ $patient->phone }}</p></li>
                                                                    <li><h6>Date of Birth</h6> <p>{{ $patient->date_of_birth }}</p></li>
                                                                    <li><h6>Doctor</h6> <p>{{ $doctors->find($patient->doctor_id)->first_name }} {{ $doctors->find($patient->doctor_id)->last_name }}</p></li>
                                                                </ul>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- EDIT PATIENT -->
                                    <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#edit_patient_{{$patient->id}}"> <i class="fas fa-edit"></i></button>    
                                    <!-- EDIT PATIENT MODAL -->
                                    <form class="form" method="POST" action="{{ route('update_patient', ['patient_id'=>$patient->id]) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal" tabindex="-1" role="dialog" id="edit_patient_{{$patient->id}}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit {{ $patient->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="form-group col-sm-6">
                                                                <label for="patient_name">Name</label>
                                                                <input type="text" name="patient_name" class="form-control" value="{{ $patient->name }}" required>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label for="e_mail">E-Mail</label>
                                                                <input type="email" name="e_mail" id="department-name" class="form-control" value="{{ $patient->email }}" required>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="form-group col-sm-3">
                                                                <label for="sex">Sex</label>
                                                                <input type="text" name="sex" value="{{ $patient->sex }}" list="gender" required  class="form-control" >
                                                                <datalist id="gender">
                                                                    <option value="male">
                                                                    <option value="female">
                                                                    <option value="other">
                                                                </datalist>
                                                            </div>

                                                            <div class="form-group col-sm-2">
                                                                <label for="image">Age</label>
                                                                <input type="text" name="age" value="null" class="form-control" required>
                                                            </div>

                                                            <div class="form-group col-sm-3">
                                                                <label for="blood_group">Blood Group</label>
                                                                <input type="text" name="blood_group" list="blood_groups" class="form-control" value="{{ $patient->blood_group }}" required>
                                                                <datalist id="blood_groups">
                                                                    <option value="a+">
                                                                    <option value="b+">
                                                                    <option value="o+">
                                                                    <option value="a-">
                                                                    <option value="b-">
                                                                    <option value="o-">
                                                                    <option value="ab+">
                                                                    <option value="ab-">
                                                                </datalist>
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <label for="date_of_birth">Date of Birth</label>
                                                                <input type="date" name="date_of_birth" class="form-control" value="{{ $patient->date_of_birth }}" required>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-sm-6">
                                                                <label for="doctor">Doctor</label>
                                                                <!-- <input type="text" name="doctor" list="doctors" value="{{ $doctors->find($patient->doctor_id)->first_name }} {{ $doctors->find($patient->doctor_id)->last_name }}" class="form-control" required> -->

                                                                <select name="doctor" class="form-control" required>
                                                                    @if(count($doctors) != 0)
                                                                        @foreach($doctors as $doctor)
                                                                            @if($doctor->id == $patient->doctor_id)
                                                                                <option value="{{ $doctor->id }}" selected>{{ $doctor->first_name }} {{ $doctor->last_name }}</option>
                                                                            @else
                                                                                <option value="{{ $doctor->id }}">{{ $doctor->first_name }} {{ $doctor->last_name }}</option>
                                                                            @endif
                                                                            
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="form-group col-sm-6">
                                                                <label for="phone">Phone</label>
                                                                <input type="number" name="phone" value="{{ $patient->phone }}" class="form-control" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="address">Address</label>
                                                            <textarea name="address" id="description" cols="30" rows="3" class="form-control" required>{{ $patient->address }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary" value="Update">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /MODAL TO ADD DEPARTMENT -->
                                    </form>
                                    
                    

                                    <!-- DELETE PATIENT -->
                                    <a href="{{ route('delete_patient', ['patient_id'=>$patient->id]) }}" class="btn btn-sm btn-outline-danger" style="color:red;"><i class="fas fa-trash"></i></a>
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
        });
    </script>

@include('include.footer')
