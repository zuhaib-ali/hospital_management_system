@include('include.header')

<style rel="stylesheet">
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

        <!-- ROW -->
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-blue">Edit</h1>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-red">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('doctors') }}" class="text-red">Doctors</a></li>
              <li class="breadcrumb-item active text-blue"> Edit</li>
            </ol>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content-body">
        <form  method="POST" action="{{ route('update_doctor') }}">
            @csrf
            <div class="card m-3">
                <div class="card-header">
                    <h2>
                        {{ $doctor->first_name }} {{ $doctor->last_name }} | 
                        <a href="{{ route('view_doctor', ['doctor_id'=>$doctor->id])}}" class="btn btn-secondary btn-sm fas fa-eye" style="border-radius:10px;"></a>
                        <a href="#" class="btn btn-danger btn-sm fas fa-trash-alt" style="border-radius:10px;"></a>
                    </h2>
                    
                </div>
                <div class="card-body">

                    <!-- FORM ROW 1 -->
                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label for="first_name">First name</label>
                            <input type="text" value="{{ $doctor->first_name}}" class="form-control" name="first_name" required>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="last_name">Last name</label>
                            <input type="text"  value="{{ $doctor->last_name}}" class="form-control" name="last_name" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="e_mail">E-Mail</label>
                            <input type="email" value="{{ $doctor->email}}" class="form-control" name="e_mail" required>
                        </div>
                    </div>

                    <!-- FORM ROW 2 -->
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label for="degree">Degree</label>
                            <input type="text" value="{{ $doctor->degree}}" class="form-control" name="degree" required>
                        </div>
                        <div class="form-group col-sm-4">
                        <label for="specialization">Specialization</label>
                            <input type="text" list="specializations" value="{{ $specializations->find($doctor->specialist)->name}}" class="form-control" name="specialization" required>
                            <datalist id="specializations">
                                @if(count($specializations) != 0)
                                    @foreach($specializations as $specialization)
                                        <option value="{{$specialization->name}}"></option>
                                    @endforeach
                                @endif
                            </datalist>
                        </div>
                        
                        <div class="form-group col-sm-4">
                            <label for="phone">Phone</label>
                            <input type="number" value="{{ $doctor->phone}}" class="form-control" name="phone" required>
                        </div>
                    </div>

                    <!-- FORM ROW 3 -->
                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label for="visiting_charge">Visiging Charge</label>
                            <input type="text" value="{{ $doctor->visiting_charge}}" class="form-control" name="visiting_charge" required>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="from">From</label>
                            <input type="time" value="{{ $doctor->from }}" class="form-control" name="from" required>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="to">To</label>
                            <input type="time" value="{{ $doctor->to }}" class="form-control" name="to" required>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="hospital">Hospital</label>
                            <input type="text" list="hospitals" value="{{ $hospitals->find($doctor->hospital_id)->name }}" class="form-control" name="hospital" required>
                            @if(count($hospitals) != 0)
                                <datalist id="hospitals">
                                    @foreach($hospitals as $hospital)
                                        <option value="{{ $hospital->name }}"></option>
                                    @endforeach
                                </datalist>
                            @endif
                            
                        </div>
                    </div>

                    <!-- FORM ROW 4 -->
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label for="closing_days">Closing Days</label>
                            <input type="text" value="{{ $doctor->closing_days}}" class="form-control" placeholder="Example : Sunday, Monday, Tuesday..." name="closing_days" required>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="gender">Gender</label>
                            <input type="text" list="genders" value="{{ $doctor->gender}}" class="form-control" name="gender" required>
                            <datalist id="genders">
                                <option value="Male"></option>
                                <option value="Female"></option>
                                <option value="Other"></option>
                            </datalist>
                        </div>
                        
                        <div class="form-group col-sm-4">
                            <label for="address">Address</label>
                            <input type="text" value="{{ $doctor->address}}" class="form-control" name="address" required>
                            <input type="hidden" value="{{ $doctor->id }}" name="doctor_id">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary form-control" style="border-radius:20px;">
                    </div>
                </div>
            </div>
        </form>
    </div>

   </div>
<!-- /.content-wrapper -->

@include('include.footer')