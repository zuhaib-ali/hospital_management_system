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
            <h1 class="m-0">EDIT LAB TEST</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{ route('index') }}"><i class="fas fa-home"></i> Home </a></li>
              <li class="breadcrumb-item"> <a href="{{ route('lab_reports') }}"><i class="fas fa-tags"></i> Lab Reports </a></li>
              <li class="breadcrumb-item active"> <a><i class="fas fa-edit"></i> Edit </a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content-body" style="padding:20px;">
      <!-- ROW -->
      <div class="row">
        <!-- COLUMN SM 6 -->
        <div class="col-sm-12">
          <!-- FORM -->
          <form action="{{ route('update_lab_report') }}" method="POST" class="form">
            @csrf
            <!-- CARD -->
            <div class="card">
              <!-- CARD BODY -->
              <div class="card-body">          
                  <div class="form-row">
                    <!-- DATE -->
                    <div class="form-group col-sm-6">
                      <label for="date">Date</label>
                      <input type="date" name="date" value="{{ $lab_test->date }}" id="date" class="form-control" required>
                    </div>
                    <!-- PATIENT -->
                    <div class="form-group col-sm-6">
                      <label for="patient">Patient</label>
                      <input type="text" list="patients" name="patient" value="{{ $lab_test->patient }}" id="patient" class="form-control" required>
                      
                      <!-- PATIENT DATA LIST -->
                      <datalist id="patients">
                        @if(count($patients) != 0)
                          @foreach($patients as $patient)
                            <option value="{{ $patient->first_name }}"></option>
                          @endforeach
                        @endif
                      </datalist>
                      
                    </div>
                  </div>
                  <!-- / FORM ROW 1-->

                  <div class="row">
                    <!-- TEST REFERED BY DOCTOR  -->
                    <div class="form-group col-sm-6">
                      <label for="doctor">Refered By Doctor</label>
                      <input type="text" list="doctors" value="{{ $lab_test->refered_by_doctor }}" name="refered_by_doctor" id="doctor" class="form-control" required>
                      <datalist id="doctors">
                        @if(count($doctors) != 0)
                          @foreach($doctors as $doctor)
                            <option value="{{ $doctor->first_name }} {{ $doctor->last_name }}"></option>
                          @endforeach
                        @endif
                      </datalist> 
                    </div>

                    <!-- TEST TEMPLATE -->
                    <div class="form-group col-sm-6">
                      <label for="template">Template</label>
                      <input type="text" list="templates" name="template" id="template" class="form-control">
                      <datalist id="templates">
                        <option value="template 1"></option>
                        <option value="template 2"></option>
                        <option value="template 3"></option>
                      </datalist>
                    </div>
                  </div>
                  <!-- / FORM ROW 2 -->

                  <div class="form-group">
                    <label for="report">Report</label>
                    <textarea name="report" id="report" cols="30" rows="10" class="form-control" required>{{ $lab_test->report }}</textarea>

                    <!-- LAB TEST ID -->
                    <input type="hidden" name="lab_test_id" value="{{ $lab_test->id }}">
                  </div>

                  <hr>
                  <div class="form-group">
                    <input type="submit" class="form-control btn btn-outline-success text-bold" value="ADD REPORT">
                  </div>
              </div>      
            </div>
          </form>
        </div>
        <!-- /CONTENT BODY COLUMN 12 -->
      </div>
      <!-- /ROW -->
    </div>
  </div>
  <!-- /.content-wrapper -->

@include('include.footer')
