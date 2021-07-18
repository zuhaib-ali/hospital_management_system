@include('include.header')

<style rel="stylesheet">
    .modal span{
        color:red;
        font-weight:bold;
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
              <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-red">Home</a></li>
              <li class="breadcrumb-item active text-blue"> Doctors</li>
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
                      <h4>
                        Doctors
                        <button class="btn btn-sm btn-success bold pull-right text-bold" data-toggle="modal" data-target="#add" style="border-radius:20px;"> 
                          <i class="fa fa-plus"></i>
                          ADD DOCTOR
                        </button>
                      </h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(false)
                        <table id="example2" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>FULL NAME</th>
                                    <th>SPECIALIZATION</th>
                                    <th>HOSPITAL</th>
                                    <th>TIMING</th>
                                    <th>E-MAIL</th>
                                    <th>PHONE</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            
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
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <form method="POST" action="{{ route('add_doctor') }}" enctype="multipart/form-data">
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
                                    <span>*</span>First Name
                                    <input type="text" class="form-control" name="first_name" >
                                </div>

                                <!-- LAST NAME -->
                                <div class="form-group col-sm-6">
                                    <span>*</span>Last Name
                                    <input type="text" class="form-control" name="last_name" >
                                </div>
                            </div>
				        	
                            <div class="form-row">
                                <!-- E-MAIL -->
                                <div class="form-group col-sm-7">
                                    <span>*</span>E-Mail
                                    <input type="email" class="form-control" name="e_mail" >
                                </div>    

                                <!-- PHONE -->
                                <div class="form-group col-sm-5">
                                    <span>*</span>Phone
                                    <input type="number" class="form-control" name="phone" >
                                </div>
                            </div>
                            

                            <div class="form-row">
                                <!-- SPECIALIZATION -->
                                <div class="form-group col-sm-6">
                                    <span>*</span>Specialization
                                    <input list="specialization" name="specialization" class="form-control" >
                                    <datalist id="specialization">
                                        <option value="Diagnostic Speicalist"></option>
                                        <option value="Bone Specialist"></option>
                                        <option value="Eye Specialist"><option>
                                        <option value="Skin Specialist"></option>
                                    </datalist>
                                </div>

                                <!-- HOSPITAL -->
                                <div class="form-group col-sm-6">
                                    <span>*</span>Hospital
                                    <input list="hospitals" name="hospital_id" class="form-control" >
                                    <datalist id="hospitals">
                                        @foreach($hospitals as $hospital)
                                            <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>

                            <!-- PROFILE IMAGE -->
                            <div class="form-group col-sm-12">
                                <span>*</span>Profile Image
                                <input type="file" class="form-control" name="doctor_image" >
                            </div>

                            <div class="form-row">
                                <div class="col-sm-6">
                                    <!-- START -->
                                    <div class="form-group">
                                        <span>*</span>START TIME
                                        <input type="time" class="form-control" name="start_time" >
                                    </div>

                                    <!-- END -->
                                    <div class="form-group">
                                        <span>*</span>END TIME
                                        <input type="time" class="form-control" name="end_time" >
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <span>*</span>Closing Days
                                    <select name="closing_days[]" class="form-control" style="height:120px;" multiple>
                                        <option value="Fri">Friday</option>
                                        <option value="Sat">Saturday</option>
                                        <option value="Sun">Sunady</option>
                                        <option value="Mon">Monday</option>
                                        <option value="Tue">Tuesday</option>
                                        <option value="Wen">Wednesday</option>
                                        <option value="Thu">Thursday</option>
                                    </select>
                                </div>
                            </div>

                            <!-- ADDRESS -->
							<div class="form-group">
                                <span>*</span>Address
							    <textarea rows="3" cols="3" class="form-control" name="address" ></textarea>
							</div>

                            
				      	</div>

                        <!-- MODAL FOOTER -->
				      	<div class="modal-footer">
                            <!-- RESET -->
                            <button type="reset" class="btn btn-secondary btn-sm">
                                <i class="ft-x"> RESET </i>
                            </button>

                            <!-- CLOSE -->
				        	<button type="button" class="btn btn-danger pull-left btn-sm" data-dismiss="modal">
                                <i class="ft-x"> Close </i>
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

@include('include.footer')