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
            <h1 class="m-0">Appointments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Appointments</li>
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
                <div class="col-12">
                <div class="card">
              <div class="card-header">
                <center><h3 class="card-title">All Appointments</h3></center>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(count($appointments) !== 0)
                <table id="example2" class="table table-bordered table-hover text-center">
                  <thead>
                  <tr>
                    <th>Patient Name</th>
                    <th>Location</th>
                    <th>Appointment Type</th>
                    <th>Note</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($appointments as $appointment) 
                    <tr>
                        <td> {{ $appointment->patientname }} </td>
                        <td> {{ $appointment->location }} </td>
                        <td> {{ $appointment->type }} </td> 
                        <td> {{ $appointment->note }} </td>
                        <td> <a href="{{ route('trash_appointment', ['id' => $appointment->id]) }}" class="btn btn-danger"> TRASH </a> </td>
                    </tr>
                  @endforeach                       
                 </tbody>
                </table>
                @else
                  <center><p class="p-5">No record found in appointments</p></center>
                @endif

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                </div>
            </div>
        </div>
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- SWEET ALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    $(document).ready(function(){
        @if(Session::has('trashed'))
          swal({
              title: "RESTORED SUCCESSFULLY!",
              text: "{{ Session::get('trashed') }}",
              icon: "success",
          });
        @endif
    });
  </script>
  
@include('include.footer')

