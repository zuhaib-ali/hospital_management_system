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
              <li class="breadcrumb-item active">Add Patients</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <main class="m-3">
      <card class="card">
        <card class="card-body">

          <form action="{{ route('add_appointment') }}" method="POST">
            @csrf 
            <!-- LOCATIONS DROPDOWN -->
            <div class="form-group mb-3">
              <label for="location">SELECT BY LOCATION</label>
              <select class="form-select form-control col-sm-4" aria-label="Default select example" name="location" id="location">
                <option selected style="font-weight:bold;">ALL</option>
                
                <!-- ALL LOCATIONS -->
                @foreach($locations as $location)
                  <option value="{{ $location->name }}">{{ $location->name }}</option>
                @endforeach

              </select>
            </div>

            <!-- <div class="form-group">
              <input type="text" name="first_name" placeholder="first name" id="first_name">
            </div> -->

            <!-- CHECKUP TYPE VALUE -->
            <input type="hidden" name="appointment_type" value="" id="appointment_type">

            <!-- USER/PATIENT ID -->
            <input type="hidden" name="user_id" value="{{ Session::get('user')->id }}">

            <!-- SUBMIT APPOINTMENT BUTTON -->
            <div class="form-group mb-3">
              <input type="submit" class="btn btn-primary" value="SUBMIT APPOINTMENT">
            </div>

          </form>  
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
              <p style="font-weight:bold; color:red;" id="checkup_type_in_hospital"></p>
              <select class="form-control form-select col-sm-12" name="checkup_type" id="checkup_type">
                <option value="general physician">General Physician</option>
                <option value="bone">Bone</option>
                <option value="heart">Heart</option>
                <option value="destist">Dentist</option>
                <option value="neurologist">Neurologist</option>
                <option value="palastic surgeon">Plastic Surgeon</option>
              </select>
            </div>

            <!-- FOOTER -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CLOSE</button>
              <button type="button" class="btn btn-primary" id="select_checkup_type" data-bs-dismiss="modal">SELECT</button>
            </div>

          </div>
        </div>
      </div>
      
    </main>
  </div>
  <!-- /.content-wrapper -->

@include('include.footer')

<script>
  $(document).ready(function(){
    // ON VALUE CHANGE
    $('#location').change(function() {
        // GETTING LOCATION VALUE SELECTED
        var location_value = $(this).val();
        // SHOW MODAL 
        if(location_value !== "ALL"){ //Compare it and if true
            $('#myModal').modal("show"); //Open Modal
            $("#checkup_type_in_hospital").text("Select Your Checkup For "+location_value);
        }
    });


    $("#select_checkup_type").click(function(){
      var checkup_type_value = $("#checkup_type").val(); // GETTING CHECKUP TYPE.
      $("#appointment_type").val(checkup_type_value); // INSERTING CHECKUP TYPE IN FORM HIDDEN FIELD.
    });

    // $("#first_name").keypress(function(){
      
    // });

  });
</script>
