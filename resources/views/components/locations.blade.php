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
              <li class="breadcrumb-item active"> Locations</li>
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
                Locations
                <button href="" class="btn btn-sm btn-success bold pull-right" data-toggle="modal" data-target="#add"> 
                <i class="fa fa-plus"> Add New Location </i>
                </button>
                </h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($locations as $location)
                    <tr>
                        <th> {{ $location->id }} </th>
                        <th> {{ $location->name }} </th>
                        <th> {{ $location->phone }} </th>
                        <th> {{ $location->email }} </th>
                        <th> {{ $location->address }} </th>
                        <th>
                            <a href="{{ route('edit_location', $location->id)}}" class="btn btn-sm btn-primary" name="id"> 
                              <i class="ft-edit-2"> Edit </i>
                            </a>
                            <a href="delLocation/{{$location->id}}" class="btn btn-sm btn-danger">
                              <i class="ft-x"> Delete </i>
                            </a>
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

  <form method="post" action="addLocation">
  @csrf
			<!-- Modal -->
			<div class="modal fade" id="add" aria-hidden="true">
				<div class="modal-dialog" role="document">
				    <div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Location</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  	<span aria-hidden="true">&times;</span>
							</button>
						</div>
				      	<div class="modal-body">
				        	<div class="form-group">
							    <label>Name</label>
							    <input type="text" class="form-control" name="name">
							</div>
							<div class="form-group">
								<label>Email</label>
							    <input type="email" class="form-control" name="email">
							</div>
							<div class="form-group">
							    <label>Address</label>
							    <textarea rows="3" cols="3" class="form-control" name="address"></textarea>
							</div>

              <div class="form-group">
							    <label>Phone</label>
							    <input type="text" class="form-control" name="phone">
							</div>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                  <i class="ft-x"> Close </i>
                  </button>
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

@if(session('success'))
<script>
  toastr.info("{{ session('success') }}");
</script>
@endif


@if(session('delLoc'))
<script>
  toastr.error("{{ session('delLoc') }}");
</script>
@endif