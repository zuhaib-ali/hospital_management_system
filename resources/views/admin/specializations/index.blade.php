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

    
    #example1_filter{
        display:flex;
        justify-content:end;
    }
    .pagination{
        display:flex;
        justify-content:end;
    }
</style>


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
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
              <li class="breadcrumb-item active"> Specializations</li>
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
                        SPECIALIZATIONS
                        <button class="btn btn-sm btn-success pull-right text-bold" data-toggle="modal" data-target="#add" style="border-radius:10px; color:white;"> 
                          <i class="fa fa-plus"></i>
                          ADD
                        </button>
                      </h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                      <th>NO</th>
                                      <th>NAME</th>
                                      <th>DESCRIPTION</th>
                                      <th>ACTIONS</th>
                                  </tr>
                                </thead>

                                <tbody>
                                  <?php $no = 1;?>
                                  @foreach($specializations as $specialization)
                                    <tr>
                                      <th>{{ $no++ }}</th>
                                      <td>{{ $specialization->name }}</td>
                                      <td>{{ $specialization->description }}</td>
                                      <td>
                                        <a href="" class="btn btn-sm btn-warning me-3"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.delete-specialization', ['id' => $specialization->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                      </td>
                                    </tr>
                                  @endforeach        
                    
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- column ends -->
            </div>
             <!-- Row ends -->
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

    <!-- MODAL FORM -->
  <form method="POST" action="{{ route('admin.add_specialization') }}">
    @csrf
			<!-- Modal -->
			<div class="modal fade" id="add" aria-hidden="true">
				<div class="modal-dialog" role="document">
				    <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Specialization</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <!-- MODAL BODY -->
              <div class="modal-body">
                <div class="form-group">
                  <label for="specialization_name">Specialization</label>
                  <input type="text" placeholder="Specialization" class="form-control" name="name" required>
                </div>


                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Treat the illness of..." required></textarea>
                </div>
              </div>


                <!-- MODAL FOOTER -->
                    <div class="modal-footer">
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

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>