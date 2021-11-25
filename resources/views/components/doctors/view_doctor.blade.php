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
            <h1 class="m-0 text-blue">DOCTORS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-red"> <i class="fas fa-home"></i>  Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('doctors') }}" class="text-red"> <i class="fas fa-user-md"></i>  Doctors</a></li>
              <li class="breadcrumb-item active text-blue"> <a href="#"><i class="fas fa-user-md"> View</i></a> </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    {{--
    <!-- Main content -->
    <!-- <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12"> -->
                  <!-- CARD -->
                  <!-- <div class="card"> -->
                    <!-- CARD HEADER -->
                    <!-- <div class="card-header">
                      <div>
                        <a href="{{ route('delete_doctor', ['doctor_id'=>$doctor->id]) }}" class="btn btn-danger btn-sm pull-right m-1"> <i class="fas fa-trash-alt"></i> </a>
                        <a href="{{ route('edit_doctor', ['doctor_id'=>$doctor->id]) }}" class="btn btn-secondary btn-sm pull-right m-1"> <i class="fas fa-edit"></i> </a>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm-4">
                          <img src="{{ asset('doctors_avatar/'.$doctor->avater) }}" alt="" style="width:250px; height:250px; border-radius:30px;">
                        </div>
                        <div class="col-sm-8">
                          <h1>{{ $doctor->first_name }} {{ $doctor->last_name }}</h1>
                          <h3></h3>
                          <p>{{ $specializations->find($doctor->specialist)->description }}</p>
                        </div>
                      </div>
                    </div>  -->
                    <!-- /.card-header -->
                    <!-- CARD BODY -->
                    <!-- <div class="card-body">
                      <table class="table">
                        <tr>
                          <th>Specialist</th>
                          <td>{{ $specializations->find($doctor->specialist)->name }}</td>
                        </tr>

                        <tr>
                          <th>Degree</th>
                          <td>{{ $doctor->degree }}</td>
                        </tr>

                        <tr>
                          <th>Hospital</th>
                          <td>{{ $locations->find($doctor->hospital_id)->name }}</td>
                        </tr>

                        <tr>
                          <th>Visiting Charge</th>
                          <td>{{ $doctor->visiting_charge }}</td>
                        </tr>

                        <tr>
                          <th>Timing</th>
                          <td>{{ $doctor->from }} to {{ $doctor->to }}</td>
                        </tr>

                        <tr>
                          <th>Closed</th>
                          <td>{{ $doctor->closing_days }}</td>
                        </tr>

                        <tr>
                          <th>Phone</th>
                          <td>{{ $doctor->phone }}</td>
                        </tr>

                        <tr>
                          <th>E-Mail</th>
                          <td>{{ $doctor->email }}</td>
                        </tr>

                        <tr>
                          <th>Address</th>
                          <td>{{ $doctor->address }}</td>
                        </tr>

                        <tr>
                          <th>Gender</th>
                          <td>{{ $doctor->gender }}</td>
                        </tr>
                      </table> -->
                    <!-- </div>  -->
                    <!-- /.card-body -->
                  <!-- </div>  -->
                  <!-- /.card -->
                <!-- </div>
            </div>
        </div> -->
    
    <!-- </section>  -->
                          --}}
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  {{-- <img class="profile-user-img img-fluid img-circle" src="{{ asset('doctors_avatar/'.$doctor->avater) }}" alt="User profile picture" style="width:100px; height:100px;"> --}}
                </div>

                <h3 class="profile-username text-center">{{ $doctor->username }}</h3>

                <p class="text-muted text-center">{{ $doctor->specialization_name }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Fees</b> <a class="float-right">{{ $doctor->visiting_charge }}</a>
                  </li>
                </ul>

                <a href="{{ route('delete_doctor', ['doctor_id' => $doctor->id]) }}" class="btn btn-danger btn-block"><b> <i class=" fas fa-trash-alt"></i> DELETE</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>
                <p class="text-muted">{{ $doctor->degree }}</p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                <p class="text-muted">{{$doctor->address}}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> E-Mail</strong>
                <p class="text-muted"><span class="tag tag-danger">{{ $doctor->email }}</span></p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Contact</strong>
                <p class="text-muted">{{$doctor->phone}}</p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Gender</strong>
                <p class="text-muted">{{$doctor->gender}}</p>
                
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
                      <h4></h4>
                      <p></p>

                      <hr>

                      <h4>Hospital</h4>
                      <p>{{ $doctor->location_name }}</p>

                      <hr>

                      <h4>Time</h4>
                      <p>From {{ $doctor->from}} to {{ $doctor->to }}</p>

                      <hr>

                      <h4>Closing Days</h4>
                      <span>{{ $doctor->sunday }}</span>
                      <span>{{ $doctor->monday }}</span>
                      <span>{{ $doctor->tuesday }}</span>
                      <span>{{ $doctor->wednesday }}</span>
                      <span>{{ $doctor->friday }}</span>
                      <span>{{ $doctor->saturday }}</span>
                    </div>
                    <!-- /.post -->  
                  </div>
  

                  <!-- EDIT DOCTOR -->
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="{{ route('update_doctor') }}" method="POST">
                      @csrf

                      <!-- First name -->
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{ $doctor->first_name }}" class="form-control" name="first_name" required>
                        </div>
                      </div>

                      <!-- Last name -->
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{ $doctor->last_name }}" class="form-control" name="last_name" required>
                        </div>
                      </div>

                      <!-- E-Mail -->
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text"  value="{{ $doctor->email }}" class="form-control" name="email" disabled>
                        </div>
                      </div>

                      <!-- Degree -->
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Degree</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{ $doctor->degree }}" class="form-control" name="degree" required>
                        </div>
                      </div>

                      <!-- Specialization -->
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Specialization</label>
                        <div class="col-sm-10">
                            <select name="specialization" id="specialization" class="form-control" @if($specializations->count() == null) disabled @endif>
                              @foreach($specializations as $specialization)
                                <option value="{{ $specialization->id }}" @if($doctor->specialization_id == $specialization->id) selected @endif>{{ $specialization->name }}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>

                      <!-- Phone -->
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                         <input type="number" value="{{ $doctor->mobile }}" class="form-control" name="mobile" required>
                        </div>
                      </div>

                      <!-- Visiting Charge -->
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Visiting Charges</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{ $doctor->visiting_charge }}" class="form-control" name="visiting_charge" required>
                        </div>
                      </div>

                      <!-- From -->
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">From</label>
                        <div class="col-sm-10">
                          <input type="time" value="{{ $doctor->from }}" class="form-control" name="from" required>
                        </div>
                      </div>

                      <!-- To -->
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">To</label>
                        <div class="col-sm-10">
                          <input type="time" value="{{ $doctor->to }}" class="form-control" name="to" required>
                        </div>
                      </div>

                      <!-- Hospital -->
                      <div class="form-group row">
                        <label for="hospital" class="col-sm-2 col-form-label">Hospital</label>
                        <div class="col-sm-10">
                          <select name="hospital" class="form-control" @if( $hospitals->count() == null ) disabled @endif>
                            @foreach($hospitals as $hospital)
                              <option value="{{ $hospital->id}}" @if($doctor->location_id == $hospital->id) selected @endif> {{ $hospital->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Closing Days</label>
                        <div class="col-sm-10">
                          <div class="d-flex flex-wrap justify-content-between">
                              <p> Sun <input type="checkbox" name="sunday" value="sunday" @if($doctor->sunday != null) checked @endif></p>
                              <p> Mon <input type="checkbox" name="monday" value="monday" @if($doctor->monday != null) checked @endif></p>
                              <p> Tue <input type="checkbox" name="tuesday" value="tuesday" @if($doctor->tuesday != null) checked @endif></p>
                              <p> Wed <input type="checkbox" name="wednesday" value="wednesday" @if($doctor->wednesday != null) checked @endif></p>
                              <p> Thu<input type="checkbox" name="thursday" value="thursday" @if($doctor->thursday != null) checked @endif></p>
                              <p> Fri <input type="checkbox" name="friday" value="friday" @if($doctor->friday != null) checked @endif></p>
                              <p> Sat <input type="checkbox" name="saturday" value="saturday" @if($doctor->saturday != null) checked @endif></p>
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                          <input type="text" list="genders" value="{{ $doctor->gender }}" class="form-control" name="gender" required>
                          <datalist id="genders">
                              <option value="Male"></option>
                              <option value="Female"></option>
                              <option value="Other"></option>
                          </datalist>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ $doctor->address }}" class="form-control" name="address" required>
                        </div>
                      </div>
                      
                      <!-- Doctor id -->
                      <input type="hidden" value="{{ $doctor->id }}" name="doctor_id">

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Update</button>
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