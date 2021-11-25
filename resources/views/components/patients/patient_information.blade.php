
@include('include.header')

<style rel="stylesheet">
    .modal span{
        color:red;
        font-weight:bold;
    }

    ::placeholder{
        font-style:italic;
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
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-red"> <i class="fas fa-home"></i>  Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('patients') }}" class="text-red"> <i class="fas fa-user-md"></i>  Patients</a></li>
              <li class="breadcrumb-item active text-blue"> <a href="#"><i class="fas fa-user-md"> View</i></a> </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="" alt="Patient photo" style="width:100px; height:100px;">
                </div>

                <h3 class="profile-username text-center">{{ $patient->name }}</h3>

                <p class="text-muted text-center">{{$patient->status }}</p>

                <a href="{{ route('delete_patient', ['patient_id'=>$patient->id]) }}" class="btn btn-danger btn-block"><b> <i class=" fas fa-trash-alt"></i> DELETE</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->


          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">  
                      <h5>Appointed Doctor</h5>
                      <p>{{ $patient->doctor }}</p>
                      
                      <hr>
                      <h5>Hospital</h5>
                      <p>{{ $patient->hospital_name }}</p>
                      

                      <hr>
                      <h5>Blood Group</h5>
                      <p>{{ $patient->blood_group }}</p>

                      <hr>
                      <h5>E-Mail</h5>
                      <p>{{ $patient->email }}</p>

                      <hr>
                      <h5>Address</h5>
                      <p>{{ $patient->address }}</p>

                      <h5>Phone</h5>
                      <p>{{ $patient->phone }}</p>

                      <h5>Gender</h5>
                      <p>{{ $patient->sex }}</p>

                      <h5>Age</h5>
                      <p>{{ $patient->age }}</p>

                    </div>
                    <!-- /.post -->  
                  </div>
  

                  <!-- EDIT DOCTOR -->
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="{{ route('update_patient') }}" method="POST">
                      @csrf

                      <!-- First name -->
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{ $patient->name }}" class="form-control" name="name" required>
                        </div>
                      </div>

                      <!-- Doctor -->
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Doctor Appointed</label>
                        <div class="col-sm-10">
                          @if($doctors->count() != null)
                          <select name="doctor" id="" class="form-control">
                            @foreach($doctors as $doctor)
                              <option value="{{ $doctor->id }}" @if($patient->doctor_id == $doctor->id) selected @endif>{{ $doctor->username }}</option>
                            @endforeach
                          </select>
                          @else
                            <select name="doctor" id="" class="form-control" disabled>
                                <option value="" >No doctor found</option>
                            </select>
                          @endif
                        </div>
                      </div>


                      <!-- Hospital -->
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Hospital</label>
                        <div class="col-sm-10">
                          <select name="hospital" id="" class="form-control" disabled>
                            @foreach($hospitals as $hospital)
                              <option value="{{ $hospital->id }}" @if($patient->hospital_id == $hospital->id) selected @endif>{{ $hospital->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>


                      <!-- Blood group -->
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Blood Group</label>
                        <div class="col-sm-10">
                          <input type="text"  value="{{ $patient->blood_group }}" class="form-control" name="blood_group">
                        </div>
                      </div>

                      <!-- E-Mail -->
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">E-Mail</label>
                        <div class="col-sm-10">
                          <input type="text"  value="{{ $patient->email }}" class="form-control" name="email">
                        </div>
                      </div>

                      <!-- Address  -->
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text"  value="{{ $patient->address }}" class="form-control" name="address">
                        </div>
                      </div>

                      <!-- Phone -->
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="text"  value="{{ $patient->phone }}" class="form-control" name="phone">
                        </div>
                      </div>

                      <!-- Gender -->
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                          <input type="text"  value="{{ $patient->sex }}" class="form-control" name="gender">
                        </div>
                      </div>

                      <!-- Age -->
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-10">
                          <input type="text"  value="{{ $patient->age }}" class="form-control" name="age">
                        </div>
                      </div>

                      <input type="hidden" name="patient_id" value="{{ $patient->id }}">


                        <!-- Update button -->
                        <div class="form-group row">
                          <div class="col-sm-10">
                            <input type="submit"  class="btn btn-primary" value="UPDATE">
                          </div>
                        </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div> 
  <!-- /.content-wrapper -->
@include('include.footer')
