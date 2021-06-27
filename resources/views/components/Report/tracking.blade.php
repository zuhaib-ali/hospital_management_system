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
            <h1 class="m-0">Weekly Tracking Sheet</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">HOME</a></li>
              <li class="breadcrumb-item active">Weekly Tracking Sheet</li>
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
              <center class="text-bold" style="color:white;"> All Types Of Appointments </center>
            </div>
            <!-- /.card-header -->

              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover text-center">
                  <thead>
                  <tr>
                    <th>SNo#</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $sno = 1; ?>
                  @foreach($data as $appointment)
                    <tr>
                        <td>{{ $sno++ }}</td>
                      
                      @if($appointment->type = 'general physician')
                        <td>{{ $appointment->type }}({{ $appointment->count() }})</td>

                        <td> 
                          <button class="btn btn-sm btn-info view">
                            <i class="ft-eye"></i>
                            View    
                          </button>
                        </td>
                      @endif()
                    </tr>
                  @endforeach                       
                 </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                </div>
            </div>
        </div>


        <!-- Modal -->
      <div class="modal fade" id="view" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <!-- DIALOG -->
        <div class="modal-dialog">
          <!-- CONTENTN -->
          <div class="modal-content">
            
            <!-- HEADER --> 
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Appointments</h5>
              <button type="button" style="color:red;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- BODY -->
            <div class="modal-body">
              <table id="example2" class="table table-bordered table-hover text-center">
                  <thead>
                  <tr>
                    <th>SNo#</th>
                    <th>Patient Name</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $sno = 1; ?>
                  @foreach($data as $appointment)
                    <tr>
                      <td> {{$sno++}} </td>
                      @if($appointment->type = 'general physician')
                        <td>{{ $appointment->patient_name }}</td>
                        <td>{{ $appointment->type }}</td>
                        <td>
                          <a href="printSheet/{{$appointment->id}}/{{$appointment->patient_id}}/{{$appointment->location_id}}" class="btn btn-sm btn-primary" target="_blank">
                            <i class="fa fa-print"></i>
                            Print
                          </a>
                        </td>
                      @endif()
                    </tr>
                  @endforeach                       
                 </tbody>
                </table>
            </div>

            <!-- FOOTER -->
            <div class="modal-footer">
              
            </div>

          </div>
        </div>
      </div>
      <!--Modal End-->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@include('include.footer')

<script type="text/javascript">
  
  $(document).ready(function(){
    $('.view').click(function(){
      $('#view').modal('show');
    });
  });

</script>
