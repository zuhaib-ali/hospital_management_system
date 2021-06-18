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
            <h1 class="m-0">TRASHED</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index') }}">HOME</a></li>
              <li class="breadcrumb-item"><a href="{{ route('appointments') }}">APPOINTMENTS</a></li>
              <li class="breadcrumb-item active">TRASHED</li>
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
                  <div class="card-header" style="background-color:darkblue;">
                    <center class="text-bold" style="color:white;">TRASHED APPOINTMENTS ({{ count($trahed_appointments) }})</center>
                  </div>

                @if(count($trahed_appointments))
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover text-center">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>PATIENT NAME</th>
                        <th>LOCATION</th>
                        <th>APPOINTMENT TYPE</th>
                        <th>NOTE</th>
                        <th>ACTIONS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      @foreach($trahed_appointments as $appointment) 
                        <tr>
                          <td> {{ $no++ }} </td>
                            <td> {{ $appointment->patientname }} </td>
                            <td> {{ $appointment->location }} </td>
                            <td> {{ $appointment->type }} </td> 
                            <td> {{ $appointment->note }} </td>
                            <td> 
                              <a href="{{ route('restore_appointment', ['id'=>$appointment->id]) }}" class="btn btn-info"> RESTORE </a>
                              <a href="{{ route('delete_appointment', ['id'=>$appointment->id]) }}" class="btn btn-danger"> DELETE </a>
                            </td>
                          </tr>
                      @endforeach                       
                    </tbody>
                  </table>
                </div>
                @else
                    <center><p class="p-5">No trashed appointment found!</p></center>
                @endif

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
        @if(Session::has('restored'))
        swal({
            title: "RESTORED SUCCESSFULLY",
            text: "{{ Session::get('restored') }}",
            icon: "success",
        });
        @endif
    });
  </script>
    

@include('include.footer')
