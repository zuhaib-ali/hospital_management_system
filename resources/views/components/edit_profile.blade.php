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
            <h1 class="m-0">EDIT PROFILE</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index') }}">HOME</a></li>
              <li class="breadcrumb-item active">EDIT PROFILE</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card mx-3">
      <div class="card-header text-center text-bold" style="background-color:#3f51b5; color:red;">
        EDIT PROFILE
      </div>
      <div class="card-body p-2">
        <form action="{{ route('update_profile') }}" method="POST" class="form col-12">
          <!-- CSRF TOKEN -->
          @csrf
          <!-- FORM ROW -->
          <div class="form-row">

            <!-- FIRST NAME -->
            <div class="form-group col-6">  
              <label for="first_name"><span style="color:red;">*</span>First Name</label>
              <input type="text" class="form-control" name="first_name" placeholder="FIRST NAME" value="{{ $user->first_name }}" required>
            </div>
            
            <!-- LAST NAME -->
            <div class="form-group col-6">
              <label for="last_name"><span style="color:red;">*</span>Last Name</label>
              <input type="text" class="form-control" name="last_name" placeholder="LAST NAME" value="{{ $user->last_name }}" required>
            </div>
          </div>

          <div class="form-row">
            <!-- E-MAIL -->
            <div class="form-group col-4">
              <label for="e_mail"><span style="color:red;">*</span>E-Mail</label>
              <input type="text" class="form-control" name="e_mail" placeholder="E-MAIL"  value="{{ $user->email }}" required>
            </div>

            <!-- MOBILE -->
            <div class="form-group col-4">
              <label for="mobile"><span style="color:red;">*</span>Mobile</label>
              <input type="text" class="form-control" name="mobile" placeholder="MOBILE" value="{{ $user->mobile }}" required>
            </div>
          </div>

          <!-- ADDRESS -->
          <div class="form-group">
            <label for="address"><span style="color:red;">*</span>Address</label>
            <textarea name="address" id="address" cols="30" rows="3" class="form-control"  required>{{ $user->address }}</textarea>
          </div>

          <!-- FORM ROW -->
          <div class="form-row">
            
            <!-- AGE -->
            <div class="form-group col-3">
              <label for="age"><span style="color:red;">*</span>Age</label>
              <input type="text" name="age" class="form-control" placeholder="AGE" value="{{ $user->age }}" required>
            </div>

            <!-- BLOOD GROUP -->
            <div class="form-group col-3">
              <label for="blood_group"><span style="color:red;">*</span>Blood Group</label>
              <input type="text" name="blood_group" class="form-control" placeholder="BLOOD GROUP" value="{{ $user->blood_group }}" required>
            </div>

            <!-- GENDER -->
            <div class="form-group col-3">
              <label for="gender"><span style="color:red;">*</span>Gender</label>
              <input type="text" name="gender" class="form-control" placeholder="GENDER" value="{{ $user->gender }}" required>
            </div>

          </div>

          <!-- USER ID -->
          <input type="hidden" name="user_id" value="{{ $user->id }}">

          <hr>

          <!-- UPDATE BUTTON -->
          <div class="form-group">
            <input type="submit" class="btn btn-dark form-control" value="UPDATE">
          </div>
          
        </form>
      </div>
    </div>
    <br><br>
  </div>

@include('include.footer')
