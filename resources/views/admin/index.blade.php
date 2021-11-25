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

@include('include.sidebar')
  
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
              <li class="breadcrumb-item active" style="color:blue;"> <a href="{{ route('index') }}"><i class="fas fa-home"> Home</i></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content p-3" style="">
      <div class="container">
        <!-- row1 starts -->
        <div class="row">
            
            <!-- Locations -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card bg-info p-3">
              <a href="{{ route('locations') }}">
                <span> <i class="fas fa-search-location"></i></span>
                <span class="float-right">
                  <h1>{{ $locations->count() }}</h1>
                  <p>LOCATIONS</p>
                </span>
              </a>
            </div>
          </div>

          @if(Session::get('user')->role == "admin")
          <!-- Appointments -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card bg-danger p-3">
              <a href="{{ route('appointments') }}">
                <span> <i class="fas fa-calendar-check"></i></span>
                <span class="float-right">
                  <h1>{{ $appointments->count() }}</h1>
                  <p>APPOINTMENTS</p>
                </span>
              </a>
            </div>
          </div>

          <!-- Doctors -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card bg-success p-3">
              <a href="{{ route('doctors') }}">
                <span> <i class="fas fa-user-injured"></i></span>
                <span class="float-right">
                  <h1>{{ $doctors->count() }}</h1>
                  <p>DOCTORS</p>
                </span>
              </a>
            </div>
          </div>

          <!-- Patients -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card bg-success p-3">
              <a href="{{ route('patients') }}">
                <span> <i class="fas fa-user-injured"></i></span>
                <span class="float-right">
                  <h1>{{ $specializations->count() }}</h1>
                  <p>SPECIALIZATIONS</p>
                </span>
              </a>
            </div>
          </div>
          
          <!-- Patients -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card bg-success p-3">
              <a href="{{ route('patients') }}">
                <span> <i class="fas fa-user-injured"></i></span>
                <span class="float-right">
                  <h1>{{ $patients->count() }}</h1>
                  <p>PATIENTS</p>
                </span>
              </a>
            </div>
          </div>
        
          <!-- Reports -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card bg-primary p-3">
              <a href="">
                <span> <i class="fas fa-file-alt"></i></span>
                <span class="float-right">
                  <h1>0</h1>
                  <p>REPORTS</p>
                </span>
              </a>
            </div>
          </div>
          @endif

          <!-- Pharmacists -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card bg-warning p-3">
              <a href="">
                <span> <i class="fas fa-file-medical text-white"></i></span>
                <span class="float-right text-white">
                  <h1>0</h1>
                  <p>PHARMACISTS</p>
                </span>
              </a>
            </div>
          </div>

          <!-- Locations -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card bg-dark p-3">
              <a href="">
                <span> <i class="fas fa-vials"></i></span>
                <span class="float-right">
                  <h1>{{ $locations->count() }}</h1>
                  <p>LABORATORIES</p>
                </span>
              </a>
            </div>
          </div>

        </div>
        <!-- Row2 ends -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('include.footer')
