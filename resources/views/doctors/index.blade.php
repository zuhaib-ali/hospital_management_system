@include('include.header')

<style rel="stylesheet">
  .card{

    box-shadow:0px 0px 2px black;
    font-size:14px;
    user-select:none;
    border-radius:10px;
  }

  .card:hover{
    background-color:	#6085ab;
    text-shadow:0px 0px 2px black;
    transform:scale(1.01);
  }

  .card:active{
    background-color:#4a6886;
  }

  .card a{
    text-decoration:none;

  }

  .card i.fas{
    font-size:100px;
  }
</style>

@include('include.navbar')

@include('doctors.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">DASHBOARD</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active" style="color:blue;"> <a href="{{ route('doctor.index') }}"><i class="fas fa-home"> Home</i></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content p-3" style="">
      <div class="container d-flex flex-wrap">

        <!-- Patients -->
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card bg-primary p-3">
            <a href="{{ route('doctor.appointments') }}">
              <span> <i class="fas fa-user-injured"></i></span>
              <span class="float-right">
                <h1>{{ $appointments }}</h1>
                <p>APPOINTMENTS</p>
              </span>
            </a>
          </div>
        </div>

        <!-- Laborataries -->
        {{-- <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card bg-warning p-3">
            <a href="">
              <span> <i class="fas fa-vials"></i></span>
              <span class="float-right">
                <h1>0</h1>
                <p>LABORATORIES</p>
              </span>
            </a>
          </div>
        </div> --}}
        

        <!-- Patients -->
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card bg-danger p-3">
            <a href="{{ route('doctor.patients') }}">
              <span> <i class="fas fa-user-injured"></i></span>
              <span class="float-right">
                <h1>{{ $patients }}</h1>
                <p>PATIENTS</p>
              </span>
            </a>
          </div>
        </div>

        <!-- Settings -->
        {{-- <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card bg-success p-3">
            <a href="">
              <span> <i class="fas fa-file-medical text-white"></i></span>
              <span class="float-right text-white">
                <p>SETTINGS</p>
              </span>
            </a>
          </div>
        </div> --}}
        
      </div><
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('include.footer')
