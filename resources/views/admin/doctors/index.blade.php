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
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" class="text-red"> <i
                                    class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active text-blue"> <a href="#"><i class="fas fa-user-md">
                                    Doctors</i></a> </li>
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
                            <h3 class="card-title">DOCTORS</h3>
                            <button class="btn btn-sm btn-warning pull-right" data-toggle="modal" data-target="#add"
                                style="border-radius:10px; color:white">
                                <i class="fa fa-plus"></i>
                                ADD DOCTOR
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Specialization</th>
                                        <th>Branch</th>
                                        <th>Time</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($doctors as $doctor)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $doctor->username }}</td>

                                            <td>{{ $doctor->specialization_name }}</td>
                                            <td>{{ $doctor->branch }}</td>

                                            <td>{{ $doctor->from }} to {{ $doctor->to }}</td>
                                            <td>
                                                <a href="{{ route('admin.view_doctor', ['doctor_id' => $doctor->id]) }}"
                                                    class="btn btn-primary btn-sm fas fa-eye"
                                                    style="border-radius:5px;"></a>
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
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- ADD DOCTOR MODAL -->
<form method="POST" action="{{ route('admin.add_doctor') }}" enctype='multipart/form-data'>
    @csrf
    <!-- Modal -->
    <div class="modal fade" id="add" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <input type="hidden" name="role" value="doctor">

                        <!-- FIRST NAME -->
                        <div class="form-group col-sm-6">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" maxlength=12 placeholder="abc">
                        </div>

                        <!-- LAST NAME -->
                        <div class="form-group col-sm-6">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" maxlength=12 placeholder="xyz">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- E-MAIL -->
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="example123@gmail.com">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- AVATAR -->
                            <div class="form-group">
                                <label for="avater">Avater</label>
                                <input type="file" class="form-control" name="avater">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- DEGREE -->
                        <div class="col-sm-6 form-group">
                            <label for="degree">Degree</label>
                            <input type="text" name="degree" class="form-control">
                        </div>

                        <!-- HOSPITAL -->
                        <div class="form-group col-sm-6">
                            <label for="hospital_id">Branch</label>
                            <select name="hospital_id" class="form-control" @if ($hospitals->count() == null) disabled @endif>
                                <option value="none" selected disabled hidden>-HOSPITAL-</option>
                                @foreach ($hospitals as $hospital)
                                    <option value="{{ $hospital->id }}">{{ $hospital->city }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- SPECIALIZATION -->
                        <div class="col-sm-4 form-group">
                            <label for="specialization">Specialization</label>
                            <select name="specialist" class="form-control" @if ($specializations->count() == null) disabled @endif>
                                <option value="none" selected disabled hidden>-SPECIALIZATION-</option>
                                @foreach ($specializations as $specialization)
                                    <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- PHONE -->
                        <div class="form-group col-sm-4">
                            <label for="phone">Phone</label>
                            <input type="number" class="form-control" name="phone" maxlength=13
                                placeholder="0333-xxxxxxx">
                        </div>

                        <!-- VISITING CHARGE -->
                        <div class="form-group col-sm-4">
                            <label for="visiting_charge">Visiting Charge</label>
                            <input type="number" class="form-control" name="visiting_charge" maxlength=4
                                placeholder="500">
                        </div>
                    </div>

                    <!-- GENDER -->
                    <div class="form-row">
                        <label for="gender">Gender</label><br>
                        <!-- MALE -->
                        <div class="form-group col-sm-3">
                            Male
                            <input type="radio" name="gender" value="male">
                        </div>

                        <!-- FEMALE -->
                        <div class="form-group col-sm-3">
                            Female
                            <input type="radio" name="gender" value="female">
                        </div>

                        <!-- OTHER -->
                        <div class="form-group col-sm-3">
                            Other
                            <input type="radio" name="gender" value="other">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- START -->
                            <div class="form-group">
                                <label for="from">From</label>
                                <input type="time" class="form-control" name="from">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- END -->
                            <div class="form-group">
                                <label for="to">To</label>
                                <input type="time" class="form-control" name="to">
                            </div>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="closing_days">Closing Days</label>
                            <div class="d-flex flex-wrap justify-content-between">
                                <p> Sun <input type="checkbox" name="sunday" value="sunday"></p>
                                <p> Mon <input type="checkbox" name="monday" value="monday"></p>
                                <p> Tue <input type="checkbox" name="tuesday" value="tuesday"></p>
                                <p> Wed <input type="checkbox" name="wednesday" value="wednesday"></p>
                                <p> Thu<input type="checkbox" name="thursday" value="thursday"></p>
                                <p> Fri <input type="checkbox" name="friday" value="friday"></p>
                                <p> Sat <input type="checkbox" name="saturday" value="saturday"></p>
                            </div>
                        </div>
                    </div>

                    <!-- PASSWORD -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <!-- CONFIRM PASSWORD -->
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control">
                    </div>

                    <!-- ADDRESS -->
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea rows="3" cols="3" class="form-control" name="address" maxlength=100></textarea>
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
