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
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item"><a href="">Settings</a> </li>
              <li class="breadcrumb-item">Permissions</li>
              <li class="breadcrumb-item ative">Edit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <form action="{{ url("/update_prm") }}" method="POST" class="form">
            @csrf

            <div class="card">
                <!-- header -->
                <div class="card-header">
                    <h4>Edit Permission</h4>
                </div>

                <!-- body -->
                <div class="card-body">

                    <!-- Username -->
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="first_name">Permission</label>
                            <input type="text" name="permission" value="{{ $permission->permission }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- E-Mail -->
                        <div class="form-group col-12">
                            <label for="email">Description</label>
                            <textarea name="description" class="form-control" cols="30" rows="10">{{ $permission->description }}</textarea>
                        </div>
                    </div>

                </div>

                <!-- footer -->
                <div class="card-footer">
                    <div class="form-group">
                        <input type="hidden" value="{{ $permission->id }}" name="id">
                        <input type="submit" class="btn btn-info" value="Update">
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('include.footer')

