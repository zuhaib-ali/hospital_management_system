@include('include.header')

<style>
    .modal-header, .card-header{
        background-color:darkblue;
        color:white;
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
            <h1 class="m-0">Departments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{ route('index') }}"><i class="fas fa-home"></i> Home </a></li>
              <li class="breadcrumb-item active"> <a><i class="fas fa-building"></i> Departments </a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content-body" style="padding:20px;">
        <div class="card">
            <!-- CARD HEADER -->
            <div class="card-header">
                <h3>
                    Departments - {{ count($departments) }}
                    <button class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#add_new_department_modal"> <i class="fas fa-plus"></i></button>
                    
                    <!-- MODAL TO ADD DEPARMENT -->
                    <form class="form" method="POST" action="{{ route('add_new_department') }}">
                        @csrf
                        <div class="modal" tabindex="-1" role="dialog" id="add_new_department_modal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add a new department</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="department-name">Department Name</label>
                                            <input type="text" name="department_name" id="department-name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" value="Save changes">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /MODAL TO ADD DEPARTMENT -->
                    </form>
</h3>
            </div>

            <!-- CARD BODY -->
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-danger">
                        <tr>
                            <th>#</th>
                            <th>First</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-primary">
                        <?php $no = 1;?>
                        @if(count($departments) != 0)
                            @foreach($departments as $department)
                            <tr>
                                <td>{{ $no++ }}</td> 
                                <td>{{ $department->department_name}}</td> 
                                <td>{{ $department->description }}</td> 
                                <td>
                                    <!-- DELETE DEPARTMENT -->
                                    <a href="{{ route('delete_department', ['department_id'=>$department->id]) }}" style="color:red;"><i class="fas fa-trash"></i></a>&nbsp;&nbsp;

                                    <!-- EDIT DEARTMENT -->
                                    <a data-toggle="modal" data-target="#department_id_{{ $department->id }}"><i class="fas fa-edit"></i></a>
                                    <form class="form" method="POST" action="{{ route('add_new_department') }}">
                                        @csrf
                                        <div class="modal" tabindex="-1" role="dialog" id="department_id_{{ $department->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit {{ $department->department_name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="department-name">Department Name</label>
                                                            <input type="text" name="department_name" id="department-name" value="{{ $department->department_name }}" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Description</label>
                                                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{ $department->description }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary" value="UPDATE">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /MODAL TO ADD DEPARTMENT -->
                                    </form>
                                </td> 
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- SWEET ALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
      @if(Session::has('department_deleted'))
      swal({
        title: "DELETED SUCCESSFULLY",
        text: "{{ Session::get('department_deleted') }}",
        icon: "info",
        button: "CLOSE",
      });
    @endif

    @if(Session::has('department_created'))
      swal({
        title: "DEPARTMENT CREATED",
        text: "{{ Session::get('department_created') }}",
        icon: "success",
        button: "CLOSE",
      });
    @endif
  </script>

@include('include.footer')
