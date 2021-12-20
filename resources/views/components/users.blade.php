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
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"> Users</li>
                        <li class="breadcrumb-item active"> Manage Users </li>
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
                                Users
                                <button href="" class="btn btn-success pull-right" data-toggle="modal"
                                    data-target="#add">
                                    <i class="fa fa-plus"> Add User</i>
                                </button>
                            </h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                {{-- @if (count($staffs) != null) --}}
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Avatar</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sno = 1; ?>
                                        @foreach ($staffs as $staff)
                                            <tr>
                                                <th>{{ $sno++ }}</th>
                                                <th> <img src="{{ asset('profile_images') }}/{{ $staff->profile_img }}"
                                                        class="img-circle elevation-2"
                                                        style=" width:50px; height:50px ">
                                                </th>
                                                <th>{{ $staff->username }} </th>
                                                <th>{{ $staff->email }}</th>
                                                <th>{{ $staff->role }}</th>
                                                <th>
                                                    @php
                                                        $user_id = Crypt::encrypt($staff->id);
                                                    @endphp
                                                    <a href="{{ route('edit-staff', ['id' => $user_id]) }}"
                                                        class="btn btn-sm btn-info"> <i class="icon-pencil"></i> </a>
                                                    <a href="{{ url('/delete-staff/'.$user_id) }}"
                                                        class="btn btn-sm btn-danger">
                                                        <i class="icon-trash"></i> </a>
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    {{-- @else
                                    <h4> Users Not Found </h4>
                                @endif --}}
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

<!-- Add staff modal -->
<form method="post" action="{{ route('add-staff') }}" enctype='multipart/form-data'>
    @csrf
    <!-- Modal -->
    <div class="modal fade" id="add" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- Username -->
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label>First Name <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="first_name" required>
                        </div>

                        <div class="form-group col-6">
                            <label>Last Name <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="last_name" required>
                        </div>
                    </div>

                    <!-- E-Mail -->
                    <div class="form-group">
                        <label>Email <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" name="email" required>
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <label>Phone <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" name="mobile" required>
                    </div>

                    <div class="form-group">
                        <label>Address <span style="color:red;">*</span></label>
                        <textarea rows="3" cols="3" class="form-control" name="address" requried></textarea>
                    </div>

                    <div class="form-group">
                        <label>Age <span style="color:red;">*</span></label>
                        <input type="number" class="form-control" name="age" required>
                    </div>

                    <div class="form-group">
                        <label>Password <span style="color:red;">*</span></label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                        <label>Confirm Password <span style="color:red;">*</span></label>
                        <input type="password" class="form-control" name="confirm_password" required>
                    </div>

                    <div class="form-group">
                        <label>Gender <span style="color:red;">*</span></label>
                        <br>
                        Male <input type="radio" name="gender" value="male">
                        Female <input type="radio" name="gender" value="female">
                        Other <input type="radio" name="gender" value="other">
                    </div>

                    <div>
                        <label for="role">Role <span style="color:red;">*</span></label>
                        <select name="role_id" id="" class="form-control role_change" required>
                            <option value="" hidden disabled selected> -- Roles -- </option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"> {{ $role->role }} </option>
                            @endforeach
                            <input type="hidden" name="role" class="role_name">
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Profile Photo</label>
                        <input type="file" class="form-control" name="photo">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i
                            class="ft-x"> Close </i></button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"> Add </i> </button>
                </div>
            </div>
        </div>
    </div>
</form>

@include('include.footer')

@if (session('success'))
    <script>
        toastr.info("{{ session('success') }}");
    </script>
@endif
