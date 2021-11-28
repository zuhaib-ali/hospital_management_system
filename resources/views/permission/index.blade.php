@include('include.header')

<style rel="stylesheet">
    .modal span {
        color: red;
        font-weight: bold;
    }

    ::placeholder {
        font-style: italic;
    }

    #example1_filter {
        display: flex;
        justify-content: end;
    }

    .pagination {
        display: flex;
        justify-content: end;
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
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-red"> <i
                                    class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active text-blue"> <a href="#"><i class="">
                                    Settings</i></a> </li>
                        <li class="breadcrumb-item active text-blue"> <a href="#"><i class="">
                                    Permission</i></a> </li>
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
                            <h3 class="card-title">Permissions</h3>
                            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#add"
                                style="border-radius:10px; color:white">
                                <i class="fa fa-plus"></i>
                                Add Permission
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $permission->permission }}</td>
                                            <td>{{ $permission->description }}</td>
                                            <td>
                                                <a href="{{ url('/edit_prm/' . $permission->id) }}"
                                                    class="btn btn-primary btn-sm icon-pencil"
                                                    style="border-radius:5px;"></a>
                                                <a href="{{ url('/delete_prm/' . $permission->id) }}"
                                                    class="btn btn-danger btn-sm" style="border-radius:5px;"><i
                                                        class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- $2y$10$3raFQCMv44QykcQxLNAdpurvooyI4xa.Usa//Hi.Sbv4RgdP9/.WK --}}
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
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- ADD DOCTOR MODAL -->
<form method="POST" action="{{ url('/add_permission') }}" enctype='multipart/form-data'>
    @csrf
    <!-- Modal -->
    <div class="modal fade" id="add" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">

                        <!-- FIRST NAME -->
                        <div class="form-group col-sm-12">
                            <label for="first_name">Permission</label>
                            <input type="text" class="form-control" name="permission" maxlength=12
                                placeholder="Enter Permission" required>
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="first_name">Description</label>
                            <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer">
                    <!-- RESET -->
                    <button type="reset" class="btn btn-sm btn-secondary">
                        <i class="ft-x"></i>
                        Reset
                    </button>

                    <!-- SUBMIT -->
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- SWEET ALERT -->

{{-- <script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}



@include('include.footer')

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
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
