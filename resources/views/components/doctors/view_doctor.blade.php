@include('include.header')

<style rel="stylesheet">
    .modal span{
        color:red;
        font-weight:bold;
    }

    ::placeholder{
        font-style:italic;
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
            <h1 class="m-0 text-blue">DOCTORS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-red"> <i class="fas fa-home"></i>  Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('doctors') }}" class="text-red"> <i class="fas fa-user-md"></i>  Doctors</a></li>
              <li class="breadcrumb-item active text-blue"> <a href="#"><i class="fas fa-user-md"> View</i></a> </li>
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
                  <!-- CARD -->
                  <div class="card">
                    <!-- CARD HEADER -->
                    <div class="card-header">
                      <div>
                        <a href="{{ route('delete_doctor', ['doctor_id'=>$doctor->id]) }}" class="btn btn-danger btn-sm pull-right m-1"> <i class="fas fa-trash-alt"></i> </a>
                        <a href="{{ route('edit_doctor', ['doctor_id'=>$doctor->id]) }}" class="btn btn-secondary btn-sm pull-right m-1"> <i class="fas fa-edit"></i> </a>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm-4">
                          <img src="{{ asset('doctors_avatar/'.$doctor->avater) }}" alt="" style="width:250px; height:250px; border-radius:30px;">
                        </div>
                        <div class="col-sm-8">
                          <h1>{{ $doctor->first_name }} {{ $doctor->last_name }}</h1>
                          <h3>{{ $specializations->find($doctor->specialist)->name }}</h3>
                          <p>{{ $specializations->find($doctor->specialist)->description }}</p>
                        </div>
                      </div>
                    </div> <!-- /.card-header -->
                    <!-- CARD BODY -->
                    <div class="card-body">
                      <table class="table">
                        <tr>
                          <th>Specialist</th>
                          <td>{{ $specializations->find($doctor->specialist)->name }}</td>
                        </tr>

                        <tr>
                          <th>Degree</th>
                          <td>{{ $doctor->degree }}</td>
                        </tr>

                        <tr>
                          <th>Hospital</th>
                          <td>{{ $locations->find($doctor->hospital_id)->name }}</td>
                        </tr>

                        <tr>
                          <th>Visiting Charge</th>
                          <td>{{ $doctor->visiting_charge }}</td>
                        </tr>

                        <tr>
                          <th>Timing</th>
                          <td>{{ $doctor->from }} to {{ $doctor->to }}</td>
                        </tr>

                        <tr>
                          <th>Closed</th>
                          <td>{{ $doctor->closing_days }}</td>
                        </tr>

                        <tr>
                          <th>Phone</th>
                          <td>{{ $doctor->phone }}</td>
                        </tr>

                        <tr>
                          <th>E-Mail</th>
                          <td>{{ $doctor->email }}</td>
                        </tr>

                        <tr>
                          <th>Address</th>
                          <td>{{ $doctor->address }}</td>
                        </tr>

                        <tr>
                          <th>Gender</th>
                          <td>{{ $doctor->gender }}</td>
                        </tr>
                      </table>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div>
            </div>
        </div>
    
    </section> <!-- /.content -->
  </div> <!-- /.content-wrapper -->
@include('include.footer')