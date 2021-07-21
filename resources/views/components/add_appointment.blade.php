@include('include.header')

@include('include.navbar')    

@include('include.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Appointment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Add Appointment</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <main class="m-3">
      <card class="card">
        <card class="card-body">
          <div class="row">

            <div class="col-lg-6">
              <form action="{{ route('submit_appointment') }}" method="POST">
                @csrf 
                <!-- LOCATIONS DROPDOWN -->
                <div class="form-group mb-3">

                  <label for="location"><span style="color:red;">*</span> SELECT BY LOCATION</label>
                  <select class="form-select form-control col-lg-6" aria-label="Default select example" name="location" id="location">
                    <option selected style="font-weight:bold;">NONE</option>    
                    <!-- ALL LOCATIONS -->
                    @foreach($locations as $location)
                      <option value="{{ $location->id }}" id="option" data="{{ $location->name }}">
                        {{ $location->name }}
                      </option>
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

            <div class="col-lg-6">
              <form action="{{ route('submit_appointment') }}" method="POST">
                @csrf 
                <!-- LOCATIONS DROPDOWN -->
                <div class="form-group mb-3">

                  <label for="location"><span style="color:red;">*</span> SELECT BY DOCTORS</label>
                  <select class="form-select form-control col-lg-6" aria-label="Default select example" name="doctor" id="location">
                    <option selected style="font-weight:bold;">NONE</option>    
                    <!-- ALL LOCATIONS -->
                      <option value="{{ $location->id }}" id="option" data="">
                      </option>
                  </select>
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








      <!-- Modal -->
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
              <button type="button" class="btn btn-sm btn-success" id="select_checkup_type">
                <i class="fa fa-plus"></i>
                Add
              </button>
            </div>

          </div>
        </div>
      </div>
      <!--Modal End-->
      
    </main>
  </div>
  <!-- /.content-wrapper -->

  <!-- SWEET ALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('include.footer')

<script>
  $(document).ready(function(){
    // ON VALUE CHANGE
    $('#location').change(function() {
        // GETTING LOCATION VALUE SELECTED
        var location_value = $(this).val();
        var lName = $('#option').attr('data');
        // SHOW MODAL 
        if(location_value !== "ALL"){ //Compare it and if true
            $('#lName').val(lName);
            $('#myModal').modal("show"); //Open Modal
            $("#checkup_type_in_hospital").text("Select Your Checkup For "+location_value);
        }
    });
    $("#select_checkup_type").click(function(){
      var checkup_type_value = $("#checkup_type").val(); // GETTING CHECKUP TYPE.
      $("#appointment_type").val(checkup_type_value); // INSERTING CHECKUP TYPE IN FORM HIDDEN FIELD.
      var note = $("#note").val(); // GETTING NOTE VALUE.
      $("#form_note").val(note); // INSERTING NOTE VALUE IN FORM HIDDEN FIELD.
    });
    // $("#first_name").keypress(function(){
      
    // });
    
  });
</script>

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