@include('include.header')

<style rel="stylesheet">

  .cards{
    display:flex;
    flex-wrap:wrap;
    justify-content:space-between;
  }

  .card{
    background-color:#6699CC;
    width:300px;
    height:150px;
    padding:20px 0px;
    line-height:50px;
    box-shadow:2px 1px 0px grey;
    color:white;
    font-size:18px;
    user-select:none;
    border-radius:20px;
  }

  .card:hover{
    background-color:	#6085ab;
    text-shadow:1px 0px 0px darkblue;
  }

  .card:active{
    background-color:#4a6886;
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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row text-center">
          <div class="col-sm-12">
            <div class="cards">

              <div class="card">
                <h2>Locations</h2>
                <div class="container">
                  <p>0</p>
                </div>
              </div>

              <div class="card">
                <h2>Appointments</h2>
                <div class="container">
                  <p>0</p>
                </div>
              </div>

              <div class="card">
                <h2>Patients</h2>
                <div class="container">
                  <p>{{ $patients->count() }}</p>
                </div>
              </div>

              <div class="card">
                <h2>Phramacists</h2>
                <div class="container">
                  <p>0</p>
                </div>
              </div>

              <div class="card">
                <h2>Laboratories</h2>
                <div class="container">
                  <p>0</p>
                </div>
              </div>

              <div class="card">
                <h2>Reports</h2>
                <div class="container">
                  <p id="reports">0</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('include.footer')