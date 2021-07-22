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
              <li class="breadcrumb-item active text-blue"> <a href="#"><i class="fas fa-user-md"> Doctors</i></a> </li>
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
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p style="font-style:italic; color:red;" class="err">{{ $error }}</p>
                            @endforeach
                        @endif
                  <div class="card">
                    <div class="card-header"  style="background-color:darkblue;">
                      <h4>
                          <span style="color:white;" >No of records - {{ count($doctors) }}</span>
                        <button class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#add" style="border-radius:10px;"> 
                          <i class="fa fa-plus"></i>
                          ADD DOCTOR
                        </button>
                      </h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        @if(count($doctors) != 0)
                        <table id="example2" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>FULL NAME</th>
                                    <th>SPECIALIZATION</th>
                                    <th>HOSPITAL</th>
                                    <th>TIMING</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                @foreach($doctors as $doctor)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $doctor->first_name }} {{ $doctor->last_name }}</td>
                                        <td>{{ $specializations->find($doctor->specialist)->name }}</td>
                                        <td>{{ $hospitals->find($doctor->hospital_id)->name }}</td>
                                        <td>{{ $doctor->from }} to {{ $doctor->to }}</td>
                                        <td>
                                            <a href="{{ route('view_doctor', ['doctor_id'=> $doctor->id]) }}" class="btn btn-primary btn-sm fas fa-eye" style="border-radius:10px;"></a>
                                            <a href="{{ route('edit_doctor', ['doctor_id' => $doctor->id]) }}" class="btn btn-secondary btn-sm  fas fa-edit"  style="border-radius:10px;"></a>
                                            |
                                            <a href="{{ route('delete_doctor', ['doctor_id' => $doctor->id]) }}" class="btn btn-danger btn-sm fas fa-trash-alt"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <center>NO DOCTOR FOUND!</center>
                        @endif
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
            </div>
        </div>
        <select class="js_multiple form-control" name="states[]" multiple="multiple">
            <option value="AL">Alabama</option>
            <option value="WY">Wyoming</option>
        </select>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- ADD DOCTOR MODAL -->
  <form method="POST" action="{{ route('add_doctor') }}" enctype='multipart/form-data'>
    @csrf
			<!-- Modal -->
			<div class="modal fade" id="add" aria-hidden="true">
				<div class="modal-dialog" role="document">
				    <div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Location</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  	<span aria-hidden="true">&times;</span>
							</button>
						</div>
				      	<div class="modal-body">
                            <div class="form-row">
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
                                    <label for="e_mail">E-Mail</label>
                                        <input type="email" class="form-control" name="e_mail" placeholder="example123@gmail.com">
                                    </div>    
                                </div>

                                <div class="col-sm-6">
                                    <!-- AVATAR -->
                                    <div class="form-group">
                                        <label for="avater">Avater</label>
                                        <input type="file" class="form-control" name="avater" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- DEGREE -->
                                <div class="col-sm-6 form-group">
                                    <label for="degree">Degree</label>

                                    <input list='degrees' name="degree" class="form-control">
                                    <datalist id="degrees">
                                        <option value="MBBS - Bachelor of Medicine and Bachelor of Surgery">Bachelor of Medicine and Bachelor of Surgery</option>
                                        <option value="BDS - Bachelor of Dental surgery">Bachelor of Dental surgery</option>
                                        <option value="BAMS - Bachelor of Ayurvedic medicine and Surgery">Bachelor of Ayurvedic medicine and Surgery</option>
                                        <option value="BGMS - Bachelor of Homeopathy medicine and Surgery">Bachelor of Homeopathy medicine and Surgery</option>
                                        <option value="BUMS - Bachelor of Unani medicine and Surgery">Bachelor of Unani medicine and Surgery</option>
                                        <option value="BYNS - Bachelor of Yoga and Naturopath science">Bachelor of Yoga and Naturopath science</option>
                                        <option value="B.V Sc and AH - Bachelor of Veterinary sciences and Animal husbandary">Bachelor of Veterinary sciences and Animal husbandary</option>
                                        <option value="M.D - Doctor of medicine">Doctor of medicine</option>
                                        <option value="M.S - Master of surgery">Master of surgery</option>
                                        <option value="D.N.B - Diplomate of national board">Diplomate of national board</option>
                                    </datalist>
                                </div>

                                <!-- HOSPITAL -->
                                <div class="form-group col-sm-6">
                                    <label for="hospital_id">Hospital</label>
                                    <select name="hospital_id" class="form-control">
                                        @foreach($hospitals as $hospital)
                                            <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <!-- SPECIALIZATION -->
                                <div class="col-sm-4 form-group">
                                <label for="specialization">Specialization</label>
                                    <select name="specialist" class="form-control">
                                        @foreach($specializations as $specialization)
                                            <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- PHONE -->
                                <div class="form-group col-sm-4">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control" name="phone" maxlength=13 placeholder="0333-xxxxxxx">
                                </div>

                                <!-- VISITING CHARGE -->
                                <div class="form-group col-sm-4">
                                    <label for="visiting_charge">Visiting Charge</label>
                                    <input type="number" class="form-control" name="visiting_charge" maxlength=4 placeholder="500">
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
                                        <input type="time" class="form-control" name="from" >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- END -->
                                    <div class="form-group">
                                        <label for="to">To</label>
                                        <input type="time" class="form-control" name="to" >
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
                                        <p> Fri <input type="checkbox" name="firday" value="friday"></p>
                                        <p> Sat <input type="checkbox" name="saturday" value="saturday"></p>
                                    </div>
                                </div>
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
                            <button type="reset" class="btn btn-secondary btn-sm">
                                <i class="ft-x"> RESET </i>
                            </button>

                            <!-- SUBMIT -->
				        	<button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"> Save </i> 
                            </button>
				      	</div>
				    </div>
				</div>
			</div>
		</form>


    <!-- EDIT DOCTOR MODAL -->
  <form method="POST" action="{{ route('edit_doctor') }}" enctype="multipart/form-data">
    @csrf
			<!-- Modal -->
			<div class="modal fade" id="edit" aria-hidden="true">
				<div class="modal-dialog" role="document">
				    <div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" style="text-transform:capitalize;">EDIT @if(count($doctors)!=0){{ $doctor->first_name}} {{ $doctor->last_name}}@endif</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  	<span aria-hidden="true">&times;</span>
							</button>
						</div>
				      	<div class="modal-body">
                            <div class="form-row">
                                <!-- FIRST NAME -->
                                <div class="form-group col-sm-6">
                                    <span>*</span>First Name
                                    <input type="text" class="form-control" name="first_name" maxlength=12 placeholder="abc">
                                </div>

                                <!-- LAST NAME -->
                                <div class="form-group col-sm-6">
                                    <span>*</span>Last Name
                                    <input type="text" class="form-control" name="last_name" maxlength=12 placeholder="xyz">
                                </div>
                            </div>

                            <!-- E-MAIL -->
                            <div class="form-group">
                                <span>*</span>E-Mail
                                <input type="email" class="form-control" name="e_mail" placeholder="example123@gmail.com">
                            </div>    
				        	
                            <div class="form-row">

                                <!-- DEGREE -->
                                <div class="col-sm-6 form-group">
                                    <span>*</span>Degree
                                    <input list='degrees' name="degree" class="form-control">
                                    <datalist id="degrees">
                                        <option value="MBBS">Bachelor of Medicine and Bachelor of Surgery</option>
                                        <option value="BDS">Bachelor of Dental surgery</option>
                                        <option value="BAMS">Bachelor of Ayurvedic medicine and Surgery</option>
                                        <option value="BGMS">Bachelor of Homeopathy medicine and Surgery</option>
                                        <option value="BUMS">Bachelor of Unani medicine and Surgery</option>
                                        <option value="BYNS">Bachelor of Yoga and Naturopath science</option>
                                        <option value="B.V Sc and AH">Bachelor of Veterinary sciences and Animal husbandary</option>
                                        <option value="M.D">Doctor of medicine</option>
                                        <option value="M.S">Master of surgery</option>
                                        <option value="D.N.B">Diplomate of national board</option>
                                    </datalist>
                                </div>

                                <!-- HOSPITAL -->
                                <div class="form-group col-sm-6">
                                    <span>*</span>Hospital
                                    <select name="hospital_id" class="form-control">
                                        @foreach($hospitals as $hospital)
                                            <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <!-- SPECIALIZATION -->
                                <div class="col-sm-4 form-group">
                                    <span>*</span>Specialization
                                    <select name="specialist" class="form-control">
                                        @foreach($specializations as $specialization)
                                            <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- PHONE -->
                                <div class="form-group col-sm-4">
                                    <span>*</span>Phone
                                    <input type="number" class="form-control" name="phone" maxlength=13 placeholder="0333-xxxxxxx">
                                </div>

                                <!-- VISITING CHARGE -->
                                <div class="form-group col-sm-4">
                                    <span>*</span>Visiting Charge
                                    <input type="number" class="form-control" name="visiting_charge" maxlength=4 placeholder="500">
                                </div>
                            </div>

                            

                            <!-- GENDER -->
                            <div class="form-row">
                                <!-- MALE -->
                                <div class="form-group col-sm-3">
                                    <span>*</span>Male
                                    <input type="radio" name="gender" value="male">
                                </div>

                                <!-- FEMALE -->
                                <div class="form-group col-sm-3">
                                    <span>*</span>Female
                                    <input type="radio" name="gender" value="female">
                                </div>

                                <!-- OTHER -->
                                <div class="form-group col-sm-3">
                                    <span>*</span>Other
                                    <input type="radio" name="gender" value="other">
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-sm-4">
                                    <!-- START -->
                                    <div class="form-group">
                                        <span>*</span>From
                                        <input type="time" class="form-control" name="from" >
                                    </div>

                                    <!-- END -->
                                    <div class="form-group">
                                        <span>*</span>To
                                        <input type="time" class="form-control" name="to" >
                                    </div>
                                </div>
                            </div>

                            <!-- ADDRESS -->
							<div class="form-group">
                                <span>*</span>Address
							    <textarea rows="3" cols="3" class="form-control" name="address" maxlength=100></textarea>
							</div>

                            
				      	</div>

                        <!-- MODAL FOOTER -->
				      	<div class="modal-footer">
                            <!-- RESET -->
                            <button type="reset" class="btn btn-secondary btn-sm">
                                <i class="ft-x"> RESET </i>
                            </button>

                            <!-- SUBMIT -->
				        	<button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"> Save </i> 
                            </button>
				      	</div>
				    </div>
				</div>
			</div>
		</form>

        <!-- SWEET ALERT -->
        
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/select2.min.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            $(document).ready(function(){
                $(".js_multiple").select2({
                    // maximumSelectionLength: 2
                });
            });

            @if(Session::has('doctor_created'))
                swal("Doctor Added", "{{ Session::get('doctor_created') }}", "success");
            @endif

            @if(Session::has('updated'))
                swal("Doctor Updated", "{{ Session::get('updated') }}", "info");
            @endif

            @if(Session::has('deleted'))
                swal("Doctor Deleted", "{{ Session::get('updated') }}", "info");
            @endif

            
        </script>


@include('include.footer')