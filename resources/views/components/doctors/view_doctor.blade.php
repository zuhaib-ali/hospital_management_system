@include('include.header')
<style rel="stylesheet">
  span{
    font-weight:bold;
    color:red;
  }

  p{
    font-style:italic;
  }
</style>

@include('include.navbar')    

@include('include.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header mx-5">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-blue">DOCTORS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-red">Home</a></li>
              <li class="breadcrumb-item active text-blue"> Doctors</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content-body mx-5 p-3" style="background-color:white;">
      <!-- ROW -->
      <div class="row">
        <!-- AVATAR -->
        <div class="col-sm-5">
          <img src="{{ asset('doctors_avatar/'.$doctor->avater) }}" alt="" style="width:300px; height:250; border-radius:20px;">
        </div>

        <!-- NAME AND SPECIALIZATION -->
        <div class="col-sm-7">
          <h1>{{ $doctor->first_name }} {{ $doctor->last_name }}</h1>
          <h3>{{ $specializations->find($doctor->specialist)->name }}</h3>
          <p>{{ $specializations->find($doctor->specialist)->description }}</p>
        </div>
      </div>
      <hr>
      <!-- ROW 1 -->
      <div class="row">
        <div class="col-sm-4">
          <span>SPECIALIZATION</span>
          <p>{{ $specializations->find($doctor->specialist)->name }}</p>
        </div>
        <div class="col-sm-4">
          <span>DEGREE</span>
          <p>{{ $doctor->degree }}</p>
        </div>
        <div class="col-sm-4">
          <span>VISITING CAHRGE</span>
          <p>{{ $doctor->visiting_charge}}</p>
        </div>
      </div>
      <hr>

      <!-- ROW 2 -->
      <div class="row">
        <div class="col-sm-4">
          <span>HOSPITAL</span>
          <p>{{ $locations->find($doctor->hospital_id)->name }}</p>
        </div>
        <div class="col-sm-4">
          <span>TIMING</span>
          <p>{{ $doctor->from }} to {{ $doctor->to }}</p>
        </div>
        <div class="col-sm-4">
          <span>CLOSING DAYS</span>
          <p>{{ $doctor->closing_days}}</p>
        </div>
      </div>
      <hr>

      <!-- ROW 3 -->
      <div class="row">
        <div class="col-sm-4">
          <span>CONTACT</span>
          <p>{{ $doctor->phone }}<br>{{ $doctor->email }}</p>
        </div>
        <div class="col-sm-4">
          <span>ADDRESS</span>
          <p>{{ $doctor->address }}</p>
        </div>
        <div class="col-sm-4">
          <span> GENDER</span>
          <p>{{ $doctor->gender}}</p>
        </div>
      </div>

    </div>

  </div>
  <!-- /.content-wrapper -->

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('include.footer')