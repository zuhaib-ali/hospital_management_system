@include('include.header')

@include('include.navbar')    

@include('admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">HOME</a></li>
              <li class="breadcrumb-item active"> LOCATIONS</li>
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
                      <h3>
                        Branch List
                        <button class="btn btn-sm btn-success pull-right text-bold" data-toggle="modal" data-target="#add" style="border-radius:10px;"> 
                          <i class="fa fa-plus"></i>
                          ADD
                        </button>
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>Hospital</th>
                          <th>City</th>
                          <th>Zip Code</th>
                          <th>Address</th>
                          <th>E-Mail</th>
                          <th>Contact</th>
                          <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($branches as $branch)
                          <tr>
                              <th> {{ $branch->id }} </th>
                              <th> {{ $branch->hospital }} </th>
                              <th> {{ $branch->city }} </th>
                              <th> {{ $branch->zip_code }} </th>
                              <th> {{ $branch->address }} </th>
                              <th> {{ $branch->email }} </th>
                              <th> {{ $branch->contact }} </th>
                              <th>
                                <a href="{{ route('admin.edit_location', $branch->id)}}" class="btn btn-sm btn-primary" name="id"> <i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.delete_branch', ['id'=>$branch->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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

  <form method="post" action="{{ route('admin.create_branch') }}">
  @csrf
			<!-- Modal -->
			<div class="modal fade" id="add" aria-hidden="true">
				<div class="modal-dialog" role="document">
				    <div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Branch</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  	<span aria-hidden="true">&times;</span>
							</button>
						</div>
				      	<div class="modal-body">
				        	<div class="form-group">
							    <label>Hospital</label>
							    <input type="text" class="form-control" value="Virtual Hospital" readonly name="hospital">
							</div>

              <div class="form-group">
							    <label>City</label>
                  <select name="city" id="" class="form-control">
                    <option value="" selected hidden disabled>-- CITIES --</option>
                    <option value="larkana">Larkana</option>
                    <option value="karachi">Karachi</option>
                    <option value="lahore">Lahore</option>
                    <option value="islamabad">Islamabad</option>
                    <option value="hyderabad">Hyderabad</option>
                  </select>
							</div>

              <div class="form-group">
							    <label>Zip Code</label>
							    <input type="text" name="zip_code" value="" class="form-control">
							</div>
							
							<div class="form-group">
							    <label>Address</label>
							    <textarea rows="3" cols="3" class="form-control" name="address"></textarea>
							</div>

              <div class="form-group">
								<label>Email</label>
							    <input type="email" value="virtualhospital@gmail.com" readonly class="form-control" name="email">
							</div>

              <div class="form-group">
							    <label>Contact</label>
							    <input type="text" class="form-control" name="contact">
							</div>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="submit" class="btn btn-primary">
                  <i class="fa fa-plus"> Save </i> 
                  </button>
				      	</div>
				    </div>
				</div>
			</div>
		</form>

@include('include.footer')

@if(Session::get('update_message'))
  <script> console.log('updated')</script>
@endif

@if(session('delLoc'))
<script>
  toastr.error("{{ session('delLoc') }}");
</script>
@endif