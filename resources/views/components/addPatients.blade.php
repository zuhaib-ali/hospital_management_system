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
            <h1 class="m-0">Add Patients</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Add Patients</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!--container-fluid-->
        <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
              <form method="post" action="addPatient">
                @csrf
              
                <div class="form-group">
                  <label>first Name</label>
                  <input type="text" name="firstname" class="form-control">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Mobile Number</label>
                  <input type="number" name="number" class="form-control">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="lastname" class="form-control">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Date Of Birth</label>
                  <input type="date" name="dob" class="form-control">
                  
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Address</label>
                  <textarea rows="5" cols="5" name="address" class="form-control"></textarea>
                  </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <center>
            <button type="submit" class="btn btn-success col-lg-6"> 
            <i class="fas fa-plus"></i> 
            Add Patient 
            </button>
            </center>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        </div>
        <!--container-fluid-->
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('include.footer')

@if(session('success'))
<script>
  toastr.success("{{ session('success') }}");
</script>
@endif

@if(session('success'))
<script>
  toastr.error("{{ session('failed') }}");
</script>
@endif