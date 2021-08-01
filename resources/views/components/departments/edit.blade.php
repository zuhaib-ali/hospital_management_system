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
            <h1 class="m-0">Edit Department</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{ route('index') }}"><i class="fas fa-home"></i> Home </a></li>
              <li class="breadcrumb-item"> <a href="{{ route('departments') }}"><i class="fas fa-building"></i> Departments </a></li>
              <li class="breadcrumb-item active"> <a><i class="fas fa-edit"></i> Edit </a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content-body" style="padding:20px;">
        <div class="card">
            <div class="card-header">
                <p>{{ $department->department_name }}</p>
            </div>
            <div class="card-body">
                                
            </div>
        </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

@include('include.footer')
