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
              <li class="breadcrumb-item"><a href="{{ route('aUsers') }}">Staff</a> </li>
              <li class="breadcrumb-item ative"> Edit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('update-staff') }}" method="POST" class="form">
            @csrf

            <div class="card">
                <!-- header -->
                <div class="card-header">
                    <h4>Edit - {{ $staff->username }}</h4>
                </div>

                <!-- body -->
                <div class="card-body">

                    <!-- Username -->
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" value="{{ $staff->first_name}}" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Last Name</label>
                            <input type="text" name="last_name" value="{{ $staff->last_name}}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- E-Mail -->
                        <div class="form-group col-8">
                            <label for="email">E-Mail</label>
                            <input type="email" name="email" value="{{ $staff->email }}" class="form-control" disabled rquired>
                        </div>

                        <div class="form-group col-4">
                            <label for="email">Phone</label>
                            <input type="number" name="mobile" value="{{ $staff->mobile }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="" cols="30" rows="3" class="form-control" required>{{ $staff->address }}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-4">
                            <label for="age">Age</label>
                            <input type="text" value="{{ $staff->age }}" name="age" class="form-control">
                        </div>

                        <div class="form-group col-4">
                            <label for="age">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="male" @if($staff->gender == "male") selected @endif>Male</option>
                                <option value="female" @if($staff->gender == "female") selected @endif>Female</option>
                                <option value="other" @if($staff->gender == "other") selected @endif>Other</option>
                            </select>
                        </div>

                        <div class="form-group col-4">
                            <label for="age">Role</label>
                            <select name="role_id" id="" class="form-control role_change">
                                <option value="" hidden disabled selected>-- Roles --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"  @if ($role->id == $staff->role_id)
                                        selected
                                    @endif > {{ $role->role }} </option>
                                @endforeach
                            <input type="hidden" name="role" class="role_name" value="{{ $staff->role }}">

                            </select>
                        </div>
                    </div>

                </div>

                <!-- footer -->
                <div class="card-footer d-flex">

                    <div class="form-group">
                        <input type="hidden" value="{{ $staff->id }}" name="id">
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

@if(session('success'))
<script>
  toastr.info("{{ session('success') }}");
</script>
@endif
