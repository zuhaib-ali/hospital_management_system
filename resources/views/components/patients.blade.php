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
            <h1 class="m-0">ADMITTED</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index') }}">HOME</a></li>
              <li class="breadcrumb-item"><a href="{{ route('all_patients') }}">ALL PATIENTS</a></li>
              <li class="breadcrumb-item active">ADMITTED</li>
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
              <div class="card-header bg-info">
                <center class="text-bold">ADMITTED PATIENTS ({{ count($patients) }})</center>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover text-center">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>FULL NAME</th>
                    <th>Contact</th>
                    <th>ADDRESS</th>
                    <th>STATUS</th>
                    <th>ACTIONS</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?>
                  @foreach($patients as $patient)
                    <tr>
                        <td> {{ $no++ }} </td>
                        <td> {{$patient->firstname}} {{$patient->lastname}} </td>
                        <td> {{$patient->number}} </td>
                        <td> {{$patient->address}} </td>
                        <td> <span class="badge badge-success py-2" style="width:150px; text-transform:uppercase"> {{ $patient->status }} </span> </td>
                        <td> <a href="dicharge/{{$patient->id}}" class="btn btn-outline-danger"> Discharge </button> </td>
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
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('include.footer')

@if(session('dicharged'))
<script>
  toastr.info("{{ session('dicharged') }}");
</script>
@endif