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
            <h1 class="m-0">Appointment Detail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Appointment Detail</li>
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
                  <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle" src="{{asset('images')}}/{{$patient->profile_img}}">
                        </div>

                        <h3 class="profile-username text-center">{{ $patient->first_name }} {{ $patient->last_name }}</h3>

                        <p class="text-muted text-center">Patient</p>

                        <ul class="list-group list-group-unbordered mb-3">

                          <li class="list-group-item">
                            <b>Age</b> <a class="float-right">{{ $patient->age }}</a>
                          </li>

                          <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ $patient->email }}</a>
                          </li>

                          <li class="list-group-item">
                            <b>Phone No</b> <a class="float-right">{{ $patient->mobile }}</a>
                          </li>

                          <li class="list-group-item">
                            <b>CNIC</b> <a class="float-right">{{ $patient->cnic }}</a>
                          </li>

                          <li class="list-group-item">
                            <b>Blood Group</b> <a class="float-right">{{ $patient->blood_group }}</a>
                          </li>

                          <li class="list-group-item">
                            <b>Gender</b> <a class="float-right">{{ $patient->gender }}</a>
                          </li>

                          <li class="list-group-item">
                            <b>Appointment Type</b> <a class="float-right">{{ $app->type }}</a>
                          </li>

                          <li class="list-group-item">
                            <b>Location</b> <a class="float-right">{{ $app->location }}</a>
                          </li>

                          <li class="list-group-item">
                            <b>Note</b> <a class="float-right">{{ $app->note }}</a>
                          </li>


                        </ul>

                        <center>  
                          <a href="#" class="btn btn-primary col-sm-6">
                            <i class="far fa-paper-plane"></i>
                            Send Mail 
                          </a>
                        </center>
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
