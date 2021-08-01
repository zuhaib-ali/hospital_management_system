@include('include.header')

<style rel="stylesheet">

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
            <h1 class="m-0">Add Lab Reports</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item" style="color:red;"> <a href="{{ route('index') }}"><i class="fas fa-home"></i>  Home</a></li>
              <li class="breadcrumb-item active"> <a><i class="fas fa-tags"></i> Lab Reports</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content-body" style="padding:20px;">
      <!-- ROW -->
      <div class="row">
        <div class="col-sm-8">
          <!-- CARD -->
          <div class="card">
            <!-- CARD HEADER -->
            <div class="card-header">
              <h3>LAB REPORTS</h3>
            </div>
            <!-- CARD BODY -->
            <div class="card-body">
              <table class="table table-borderd text-center">
                <thead>
                  <tr>
                    <th>R.ID</th>
                    <th>PATIENT</th>
                    <th>DATE</th>
                    <th>OPERATIONS</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($lab_tests) != 0)
                    @foreach($lab_tests as $lab_test)
                      <tr>
                        <td id="lab_id">{{ $lab_test->id }}</td>
                        <td>{{ $lab_test->patient }}</td>
                        <td>{{ $lab_test->date }}</td>
                        <td>
                          <!-- Button trigger modal for edit lab test -->
                          <a type="button" class="btn btn-outline-primary show_test" data-toggle="modal" data-target="#id_no_{{ $lab_test->id }}">
                            <i class="fas fa-eye "></i>
                          </a>

                          <!-- SHOW LAB TEST - MODAL -->
                          <div class="modal fade" id="id_no_{{ $lab_test->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Patient - {{ $lab_test->patient }}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <table calss="table">
                                    <tr>
                                      <th>Patient Name</th>
                                      <td>{{ $patients->where("first_name", ) }}</td>
                                      <th>Patient Name</th>
                                      <td>Address</td>
                                    </tr>

                                    <tr>
                                      <th>Contact</th>
                                      <td></td>
                                      <th>E-Mail</th>
                                      <td>Address</td>
                                    </tr>

                                    <tr>
                                      <th>Patient Name</th>
                                      <td></td>
                                      <th>Patient Name</th>
                                      <td>Address</td>
                                    </tr>
                                  </table>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- EDIT LAB TEST -->
                          <a href="{{ route('edit_lab_test', ['lab_test_id'=>$lab_test->id]) }}" class="btn btn-outline-secondary"><i class="fas fa-edit"></i></a>
                          <!-- DELETE LAB TEST -->
                          <a href="{{ route('delete_lab_test', ['lab_test_id'=>$lab_test->id]) }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
          <!-- /CARD -->
        </div>
        <!-- /COL-SM-8 -->


        <!-- COLUMN SM 4 -->
        <div class="col-sm-4">
          <!-- FORM -->
          <form action="{{ route('add_lab_report') }}" method="POST" class="form">
            @csrf
            <!-- CARD -->
            <div class="card">
              <!-- CARD HEADER -->
              <div class="card-header">
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus" style="color:blue;"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
                <h3>Add Lab Report</h3>
                
              </div>
              <!-- CARD BODY -->
              <div class="card-body">
                
                  <!-- <div class="form-row"> -->
                    <!-- DATE -->
                    <div class="form-group">
                      <label for="date">Date</label>
                      <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <!-- PATIENT -->
                    <div class="form-group">
                      <label for="patient">Patient </label><a href="{{ route('addPatients') }}" class="pull-right">Add New</a>
                      <select id="patients" name="patient" id="patient" class="form-control" required>
                        @if(count($patients) != 0)
                          @foreach($patients as $patient)
                            
                            <option value="{{ $patient->first_name }}"><input type="hidden" name="patient_id" value="{{ $patient->id }}"></option>
                          @endforeach
                        @endif
                      </select>
                    </div>
                  <!-- </div> -->
                  <!-- / FORM ROW 1-->

                  <!-- <div class="row"> -->
                    <!-- TEST REFERED BY DOCTOR  -->
                    <div class="form-group">
                      <label for="doctor">Refered By Doctor</label>
                      <input type="text" list="doctors" name="refered_by_doctor" id="doctor" class="form-control" required>
                      <datalist id="doctors">
                        @if(count($doctors) != 0)
                          @foreach($doctors as $doctor)
                            <option value="{{ $doctor->first_name }} {{ $doctor->last_name }}"></option>
                          @endforeach
                        @endif
                      </datalist> 
                    </div>

                    <!-- TEST TEMPLATE -->
                    <div class="form-group">
                      <label for="template">Template</label>
                      <input type="text" list="templates" name="template" id="template" class="form-control">
                      <datalist id="templates">
                        <option value="template 1"></option>
                        <option value="template 2"></option>
                        <option value="template 3"></option>
                      </datalist>
                    </div>
                  <!-- </div> -->
                  <!-- / FORM ROW 2 -->

                  <div class="form-group">
                    <label for="report">Report</label>
                    <textarea name="report" id="report" cols="30" rows="10" class="form-control" required></textarea>
                  </div>
                  <hr>
                  <div class="form-group">
                    <input type="submit" class="form-control btn btn-success" value="ADD REPORT">
                  </div>
              </div>      
            </div>
          </form>
        </div>
        <!-- /CONTENT BODY COLUMN 12 -->
      </div>
      <!-- /ROW -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- SWEET ALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="{{ asset('js/jquery.min.js') }}"></script>

  <script>
    @if(Session::has('labtest_created'))
      swal({
        title: "LAB TEST ADDED",
        text: "{{ Session::get('labtest_created') }}",
        icon: "success",
        button: "CLOSE",
      });
    @endif

    @if(Session::has('lab_test_deleted'))
      swal({
        title: "LAB TEST DELETED",
        text: "{{ Session::get('lab_test_deleted') }}",
        icon: "info",
        button: "CLOSE",
      });
    @endif

    @if(Session::has('lab_test_updated'))
      swal({
        title: "LAB TEST UPDATED",
        text: "{{ Session::get('lab_test_updated') }}",
        icon: "info",
        button: "CLOSE",
      });
    @endif
  </script>
@include('include.footer')