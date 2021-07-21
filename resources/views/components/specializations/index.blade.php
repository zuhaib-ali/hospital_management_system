@include('include.header')

<style rel="stylesheet">
    .modal span{
        color:red;
        font-weight:bold;
    }

    ::placeholder{
        font-style:italic;
    }

    label{
      font-style:italic;
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
            <h1 class="m-0 text-blue">DOCTORS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-red">Home</a></li>
              <li class="breadcrumb-item active text-blue"> Doctors</li>
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
                      <h4>
                        Specializations
                        <button class="btn btn-sm btn-success bold pull-right text-bold" data-toggle="modal" data-target="#add" style="border-radius:20px;"> 
                          <i class="fa fa-plus"></i>
                          ADD SPECIALIZATION
                        </button>
                      </h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php $no = 1; ?>
                        @if(count($specializations) != 0)
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAME</th>
                                    <th>DESCRIPTION</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($specializations as $specialization)
                                <tr>
                                  <th>{{ $no++ }}</th>
                                  <td>{{ $specialization->name }}</td>
                                  <td>{{ $specialization->description }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                        @else
                            <center>NO SPECIALITY FOUND!</center>
                        @endif
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

    <!-- MODAL FORM -->
  <form method="POST" action="{{ route('add_specialization') }}">
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

              <!-- MODAL BODY -->
              <div class="modal-body">
                <div class="form-group">
                  <label for="specialization_name">Name</label>
                  <input type="text" placeholder="Specialization" class="form-control" name="specialization_name" required>
                </div>


                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Treat the illness of..." required></textarea>
                </div>
              </div>


              <!-- MODAL FOOTER -->
				    	<div class="modal-footer">
                <!-- RESET -->
                <button type="reset" class="btn btn-secondary btn-sm">
                  <i class="ft-x"> RESET </i>
                </button>

                <!-- SUBMIT -->
				      	<button type="submit" class="btn btn-primary btn-sm">
                  <i class="fa fa-plus"> Save </i> 
                </button>
			      	</div>
			    </div>
			</div>
		</div>
	</form>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
    @if(Session::has('created'))
      swal("Specialization Added", "{{ Session::get('created') }}", "success");
    @endif
    
  </script>
@include('include.footer')