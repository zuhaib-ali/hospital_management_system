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
                    <h1 class="m-0"> </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/roles') }}">Roles</a> </li>
                        <li class="breadcrumb-item ative">Add Role</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <form action="{{ url('/add_role') }}" method="POST" class="form">
            @csrf

            <div class="card">
                <!-- header -->
                <div class="card-header">
                    <h4>Add Role</h4>
                </div>

                <!-- body -->
                <div class="card-body">

                    <!-- Username -->
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="first_name">Role Name</label>
                            <input type="text" name="role" value="" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="email">Role Description</label>
                            <textarea name="desc" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                    <br>

                    <h2>Permissions</h2>
                    @foreach ($permissions as $permission)
                        <div class="form-row">
                            <div class="form-group col-8">
                                <label> {{ $permission->permission }} </label>
                            </div>

                            <div class="form-group col-4 form-check form-switch">
                                <input type="checkbox" value="{{ $permission->id }}" name="permission_id[]" class="form-check-input">
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- footer -->
                <div class="card-footer">
                    <div class="form-group">
                        {{-- <input type="hidden" value="" name="id"> --}}
                        <input type="submit" class="btn btn-info" value="Add">
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('include.footer')
