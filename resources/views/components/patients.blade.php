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
            <h1 class="m-0">Patients</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Patients</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        @if(session('dicharged')) 
                <div class="alert alert-warning alert-dismissible col-lg-6" id="divs">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{session('dicharged')}}
                </div>
                @endif
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
                <h3 class="card-title">Patients Record</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Mobile/Contact</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($patients as $patient)
                    <tr>
                        <td> {{$patient->firstname}} {{$patient->lastname}} </td>
                        <td> {{$patient->number}} </td>
                        <td> {{$patient->address}} </td>
                        <td> <span class="badge badge-success"> {{ $patient->status }} </span> </td>
                        <td> <a href="dicharge/{{$patient->id}}" class="btn btn-danger"> Discharge </button> </td>
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

@if(session('success'))
<script>
  toastr.success("{{ session('dicharged') }}");
</script>
@endif