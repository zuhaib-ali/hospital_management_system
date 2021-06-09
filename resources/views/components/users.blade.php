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
                Staff/Admin
                <button href="" class="btn btn-success pull-right" data-toggle="modal" data-target="#add"> 
                <i class="fa fa-plus"> Add User As Admin </i>
                </button>
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
                        <th> {{ $user->age }} </th>
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

  <form method="post" action="addAdmin" enctype='multipart/form-data'>
  @csrf
			<!-- Modal -->
			<div class="modal fade" id="add" aria-hidden="true">
				<div class="modal-dialog" role="document">
				    <div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add User As Admin</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  	<span aria-hidden="true">&times;</span>
							</button>
						</div>
				      	<div class="modal-body">
				        	<div class="form-group">
							    <label>First Name</label>
							    <input type="text" class="form-control" name="first_name">
							</div>

                            <div class="form-group">
							    <label>Last Name</label>
							    <input type="text" class="form-control" name="last_name">
							</div>

                            <div class="form-group">
							    <label>Username</label>
							    <input type="text" class="form-control" name="username">
							</div>

                            <div class="form-group">
							    <label>Email</label>
							    <input type="text" class="form-control" name="email">
							</div>

                            <div class="form-group">
							    <label>Phone No</label>
							    <input type="text" class="form-control" name="mobile">
							</div>

                            <div class="form-group">
							    <label>CNIC</label>
							    <input type="text" class="form-control" name="cnic">
							</div>

                            <div class="form-group">
							    <label>Age</label>
							    <input type="text" class="form-control" name="age">
							</div>

                            <div class="form-group">
							    <label>Blood Group</label>
							    <input type="text" class="form-control" name="blood_group">
							</div>
							<div class="form-group">
								<label>Address</label>
							    <textarea rows="3" cols="3" class="form-control" name="address"></textarea>
							</div>
							<div class="form-group">
							    <label>Password</label>
							    <input type="password" class="form-control" name="password">
							</div>

                            <div class="form-group">
							    <label>Date Of Birth</label>
							    <input type="date" class="form-control" name="dob">
							</div>

                            <div class="form-group">
							    <label>Select Gender</label>
							    Male <input type="radio" name="gender" value="Male">
							    Female <input type="radio" name="gender" value="Female">
							    Other <input type="radio" name="gender" value="Other">
							</div>
                            <div class="form-group">          
							    <label>Select Avatar</label>
							    <input type="file" class="form-control" name="profile_img">
                  <input type="hidden" name="role" value="admin">

							</div>

                            
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                  <i class="ft-x"> Close </i>
                  </button>
				        	<button type="submit" class="btn btn-primary">
                  <i class="fa fa-plus"> Add </i> 
                  </button>
				      	</div>
				    </div>
				</div>
			</div>
		</form>

@include('include.footer')

@if(session('success'))
<script>
  toastr.info("{{ session('success') }}");
</script>
@endif