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

@include('admin.sidebar')

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
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content p-3" style="">
      <div class="container d-flex flex-wrap justify-content-between">

        <!-- Appointments -->
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card bg-primary p-3">
            <a href="{{ route('admin.appointments') }}">
              <span> <i class="fas fa-calendar-check"></i></span>
              <span class="float-right">
                <h1>{{ $appointments }}</h1>
                <p>APPOINTMENTS</p>
              </span>
            </a>
          </div>
        </div>


        <!-- Branches -->
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card bg-success p-3">
            <a href="{{ route('admin.branches') }}">
              <span> <i class="fas fa-search-location"></i></span>
              <span class="float-right">
                <h1>{{ $locations }}</h1>
                <p>Branches</p>
              </span>
            </a>
          </div>
        </div>

        <!-- Doctors -->
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card bg-danger p-3">
            <a href="{{ route('admin.doctors') }}">
              <span> <i class="fas fa-user-md"></i></span>
              <span class="float-right">
                <h1>{{ $doctors }}</h1>
                <p>DOCTORS</p>
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
          <div class="card bg-primary p-3">
            <a href="{{ route('admin.patients') }}">
              <span> <i class="fas fa-user-injured"></i></span>
              <span class="float-right">
                <h1>{{ $patients }}</h1>
                <p>PATIENTS</p>
              </span>
            </a>
          </div>
        </div>
      
        <!-- Reports -->
        {{-- <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card bg-success p-3">
            <a href="{{ route('admin.lab_reports') }}">
              <span> <i class="fas fa-file-alt"></i></span>
              <span class="float-right">
                <p>REPORTS</p>
              </span>
            </a>
          </div>
        </div> --}}
      
        <!-- Pharmacists -->
        {{-- <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card bg-danger p-3">
            <a href="">
              <span> <i class="fas fa-file-medical text-white"></i></span>
              <span class="float-right text-white">
                <h1>0</h1>
                <p>PHARMACISTS</p>
              </span>
            </a>
          </div>
        </div> --}}
      
        <!-- Manage Roles -->
        {{-- <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card bg-warning p-3">
            <a href="">
              <span> <i class="fas fa-file-medical text-white"></i></span>
              <span class="float-right text-white">
                <p>MANAGE ROLES</p>
              </span>
            </a>
          </div>
        </div> --}}
      
        <!-- Settings -->
        {{-- <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card bg-primary p-3">
            <a href="">
              <span> <i class="fas fa-file-medical text-white"></i></span>
              <span class="float-right text-white">
                <p>SETTINGS</p>
              </span>
            </a>
          </div>
        </div>  --}}
      
        <!-- Specializations -->
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card bg-success p-3">
            <a href="{{ route('admin.specializations') }}">
              <span> <i class="fas fa-file-export text-white"></i></span>
              <span class="float-right text-white">
                <h1>{{ $specializations }}</h1>
                <p>SPECIALIZATIONS</p>
              </span>
            </a>
          </div>
        </div>
      
        <!-- Users -->
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card bg-danger p-3">
            <a href="">
              <span> <i class="fas fa-users text-white"></i></span>
              <span class="float-right text-white">
                <h1>{{ $users }}</h1>
                <p>USERS</p>
              </span>
            </a>
          </div>
        </div>

      </div>      
    </section>
  </div>

@include('include.footer')
