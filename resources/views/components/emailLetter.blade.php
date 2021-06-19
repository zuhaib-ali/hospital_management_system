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
            <h1 class="m-0">Letter Template</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Letter Template</li>
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
            <div class="card-header" style="background-color:darkblue;">
            	<center class="text-bold" style="color:white;">Email Letter Template</center>
            </div>
            <!-- /.card-header -->

              <div class="card-body">
                <form method="post" action="addTmp">
	              	@csrf
	              	<label> Add Title </label>

	              	<input type="text" name="title" class="form-control" value="{{ $data->title }}"> <br>
	                
	                <label> Add/Update Letter Template </label> <br> <br>

	              	<textarea name="editor1" cols="5" rows="5" class="form-control">{{ $data->body }}</textarea>

	              		<br> <br>
	              	<button type="submit" class="btn btn-success">
	              		<i class="fa fa-save"></i>
	              		Add
	              	</button>
	             </form>	
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
@if(session('added'))
  <script type="text/javascript">
    toastr.success("{{ session('added') }}");
  </script>  

  @elseif(session('updated'))
  <script type="text/javascript">
    toastr.info("{{ session('updated') }}");
  </script>
@endif()