@include('include.header')

@include('include.navbar')    

@include('users.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Home</a></li>
              <li class="breadcrumb-item active">Take Appointment</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <main class="m-3">
      {{-- <card class="card">
        <card class="card-body">
          <div class="row">

            <div class="col-lg-6">
              <!-- SUBMIT APPOINTMENT BY LOCATIONS -->
              <form action="{{ route('submit_appointment') }}" method="POST">
                @csrf 
                <!-- LOCATIONS DROPDOWN -->
                <div class="form-group mb-3">

                  <label for="location"><span style="color:red;">*</span> SELECT BY LOCATION</label>
                  <select class="form-select form-control col-lg-6" aria-label="Default select example" name="location" id="location">
                    <option selected style="font-weight:bold;">NONE</option>    
                    <!-- ALL LOCATIONS -->
                    @foreach($locations as $location)
                      <option value="{{ $location->id }}" id="option" data="{{ $location->name }}">{{ $location->name }}</option>
                    @endforeach
                  </select>
                </div>

                <!-- CHECKUP TYPE VALUE -->
                <input type="hidden" name="appointment_type" value="" id="appointment_type">
                <!-- USER/PATIENT ID -->
                <input type="hidden" name="user_id" value="{{ Session::get('user')->id }}">
                <!-- PATIENT NAME -->
                <input type="hidden" name="patient_name" value="{{ Session::get('user')->first_name }} {{ Session::get('user')->last_name }}">
                <!-- NOTE -->
                <input type="hidden" name="form_note" value="" id="form_note">
                @if($errors->any())
                  <p style="color:red; font-style:italic;font-size:12px;font-weight:bold;">Please select location to compelete requirements</p>
                  @foreach($errors->all() as $error)
                    {{$error}}
                  @endforeach
                @endif

                <!-- SUBMIT APPOINTMENT BUTTON -->
                <div class="form-group mb-3">  
                  <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"> </i>
                    Submit Appointment
                  </button>
                </div>

              </form> 
            </div>



            <!-- APPOINTMENT BY DOCTOR -->
            <div class="col-lg-6">
              <form action="{{ route('user.send-appointment') }}" method="POST"> 
                @csrf 
                <!-- DOCTORS DROPDOWN -->
                <div class="form-group mb-3">
                  <label for="location"><span style="color:red;">*</span> SELECT BY DOCTORS</label>
                  <select class="form-select form-control col-lg-6" aria-label="Default select example" name="doctor" id="doctor">
                    <option selected style="font-weight:bold;">NONE</option>    
                    <!-- ALL Doctors -->
                      @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" id="drOption" data="{{ $doctor->first_name }} {{ $doctor->last_name }}">{{ $doctor->first_name }} {{ $doctor->last_name }}</option>
                      @endforeach()

                  </select>
                  <input type="hidden" name="patient_name" value="{{ Session::get('user')->first_name }} {{ Session::get('user')->last_name }}">
                  <!-- PATIENT ID -->
                  <input type="hidden" name="patient_id" value="{{ Session::get('user')->id }}">
                  <!-- HOSPITAL ID -->
                  <input type="hidden" name="hospital_id" id="hospital_id">
                  <!-- DOCTOR ID -->
                  <input type="hidden" name="doctor_id" id="doctor_id">
                  <!-- PATIENT ID -->
                  <input type="hidden" name="patient_name_in_doctor_appointment" id="patient_name_in_doctor_appointment">

                  <input type="hidden" name="location_id" id="location_id">

                  <input type="hidden" name="type" id="type">
                  
                  <input type="hidden" name="note" id="drNote">

                </div>
                <!-- SUBMIT APPOINTMENT BUTTON -->
                <div class="form-group mb-3">  
                  <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"> </i>
                    Submit Appointment
                  </button>
                </div>
              </form>
            </div>
          </div>
            
        </card>
      </card>



      <!-- SELECT BY LOCATION Modal -->
      <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <!-- DIALOG -->
        <div class="modal-dialog">
          <!-- CONTENTN -->
          <div class="modal-content">
            
            <!-- HEADER --> 
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">CHECKUP  TYPES</h5>
              <button type="button" style="color:red;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- BODY -->
            <div class="modal-body">
            <label> Patient Name </label>
            <input type="text" name="patientname" value="{{ $patient->first_name }} {{ $patient->last_name }}" class="form-control" disabled>

            <label> Location </label>
            <input type="text" name="location" class="form-control" id="lName" disabled>
              <p style="font-weight:bold; color:red;" id="checkup_type_in_hospital"></p>
              <select class="form-control form-select col-sm-12" name="checkup_type" id="checkup_type">
                <option value="general physician">General Physician</option>
                <option value="bone">Bone</option>
                <option value="heart">Heart</option>
                <option value="destist">Dentist</option>
                <option value="neurologist">Neurologist</option>
                <option value="palastic surgeon">Plastic Surgeon</option>
              </select>

              <label> Note </label>
              <textarea class="form-control" cols="3" rows="5" name="note" id="note"></textarea>
            </div>

            <!-- FOOTER -->
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">
                <i class="ft-x"></i>
                Close
              </button>
              <button type="button" class="btn btn-sm btn-success" data-bs-dismiss="modal" id="select_checkup_type">
                <i class="fa fa-plus"></i>
                Add
              </button>
            </div>

          </div>
        </div>
      </div>
      <!--Modal End-->



      <!-- SELECT BY DOCTORS Modal -->
      <div class="modal fade" id="select_by_doctor_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <!-- DIALOG -->
        <div class="modal-dialog">
          <!-- CONTENTN -->
          <div class="modal-content">
            <!-- HEADER --> 
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">APPOINTMENT BY SELECTING A DOCTOR</h5>
              <button type="button" style="color:red;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- BODY -->
            <div class="modal-body">
                  <label> Patient Name </label>
                  <input type="text" name="patient-name" value="{{ $patient->first_name }} {{ $patient->last_name }}" class="form-control" id="patient_name_in_doctor_modal" disabled>

                  <label> Doctor Name </label>
                  <input type="text" name="doctor-name" value="" class="form-control" id="doctor-name" disabled>

                  
                  <label> Doctor Speciality </label>
                  <input type="text" name="specialist" value="" class="form-control" id="speciality" disabled>


                  <a href="javascript:void(0)" id="abt" style="color: orange;">Detail About Speciality...</a>
                  <textarea cols="5" rows="3" class="form-control" id="detail" disabled></textarea>

                  <br>
                  <label> Location </label>
                  <input type="text" name="location_of_doctor" class="form-control" id="location_of_doctor" value="" disabled>

                  
                  <p style="font-weight:bold; color:red;" id="checkup_type_in_hospital"></p>

                  <label> Note </label>
                  <textarea class="form-control" cols="3" rows="5" id="note_in_doctor_modal"></textarea>
                </div>

                <!-- FOOTER -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">
                    <i class="ft-x"></i>
                    Close
                  </button>
                  <button type="button" class="btn btn-sm btn-success" data-bs-dismiss="modal" id="drAdd">
                    <i class="fa fa-plus"></i>
                    Add
                  </button>
                </div>
          </div>
        </div>
      </div> --}}
      <!--Modal End-->
      

      <div class="card">
        <div class="card-header"><center><h4>Take Appointment</h4></center></div>
        <div class="card-body">
          <center>
            <form action="{{ route('user.send-appointment') }}" method="POST"  style="width:400px;">
              @csrf
              <!-- Select doctor -->
              <div class="form-group">
                <select class="doctor_appointment form-control" name="doctor" required>
                  <option value="" hidden disabled selected>-- Search Doctor --</option>
                  @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->username }}</option>
                  @endforeach
                </select>
              </div>

              <!-- Submit appointment -->
              <div class="form-group">
                <input type="submit" class="btn btn-success" id="appointment-submit-button" value="SUBMIT" hidden>
              </div>
            </form>
          </center>

          <div class="contaier" id="doctor-appointment" hidden>
            <div class="row">
              <div class="col-12"><img src="" alt="" id="appointment-doctor-image"></div>
            </div>

            <div class="row">
              <div class="col-4">

                <!-- Basic Information -->
                <h4>Basic Information</h4>
                <dl class="data_list">
                  <dt>Doctor Name</dt>
                  <dd id="appointment-doctor-name"></dd>

                  <dt>E-Mail</dt>
                  <dd id="appointment-doctor-email"></dd>

                  <dt>Phone</dt>
                  <dd id="appointment-doctor-mobile"></dd>                  
                </dl>
              </div>

              <!-- Specialization  -->
              <div class="col-4">
                <h4>Specialization</h4>
                <dl class="data_list">
                  <dt>Specialization</dt>
                  <dd id="appointment-specialization-name"></dd>
                  <dt>Description</dt>
                  <dd id="appointment-specialization-description"></dd>
                </dl>
              </div>

              <!-- Branch Information -->
              <div class="col-4">
                <h4>Branch</h4>
                <dl class="data_list">
                  <dt>City</dt>
                  <dd id="appointment-branch-name"></dd>

                  <dt>E-Mail</dt>
                  <dd id="appointment-branch-email"></dd>

                  <dt>Address</dt>
                  <dd id="appointment-branch-address"></dd>
                </dl>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <!-- /.content-wrapper -->

  <!-- SWEET ALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- JQUERY -->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
@include('include.footer')

<script>

<!-- SWEET ALERT -->
<script>
  @if(Session::has('success'))
    swal({
      title: "SENT",
      text: "{{ Session::get('success') }}",
      icon: "success",
      button: "CLOSE",
    });
  @elseif(Session::has('failed'))
    swal({
      title: "FAILED",
      text: "{{ Session::get('failed') }}",

      icon: "error",
      button: "CLOSE",
    });
  @endif
</script>

