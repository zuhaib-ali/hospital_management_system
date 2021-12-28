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

@include('users.sidebar')

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
      <div class="container d-flex flex-wrap">

        <!-- Appointments -->
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card bg-primary p-3">
            <a href="{{ route('user.appointment') }}">
              <span> <i class="fas fa-handshake"></i></span>
              <span class="float-right">
                <p>TAKE APPOINTMENT</p>
                <p>Doctors: {{ $doctors->count() }}</p>
              </span>
            </a>
          </div>
        </div>

      </div>      
    </section>
  </div>

@include('include.footer')
