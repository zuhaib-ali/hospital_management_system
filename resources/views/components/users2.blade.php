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
            <h1 class="m-0">  </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active"> Users</li>
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
              <div class="card-header">
                <h1>
                All Users
                </h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>CNIC</th>
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>Blood Group</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $sno = 1 ?>
                  @foreach($users as $user)
                    <tr>
                        <th>{{ $sno++ }}</th>
                        <th> <img src="{{asset('images')}}/{{$user->profile_img}}" class="img-circle elevation-2" style=" width:50px; height:50px "> 
                        </th>
                        <th>{{ $user->first_name }} {{ $user->last_name }} </th>
                        <th>{{ $user->age }}</th>
                        <th>{{ $user->cnic }}</th>
                        <th>{{ $user->mobile }}</th>
                        <th>{{ $user->email }}</th>
                        <th>{{ $user->blood_group }}</th>
                        <th> {{ $user->address }} </th>
                        <th> <div class="btn-group">
                            <button class="btn btn-sm btn-info" type="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-angle-down"> Actions </i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="" > <i class="icon-pencil"> Edit </i> </a>
                                </li>
                                <li>
                                    <a href=""> <i class="icon-trash"> Delete </i> </a>
                                </li>
                            </ul>
                        </div> 
                        </th>
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