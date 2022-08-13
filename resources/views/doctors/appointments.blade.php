<?php use App\Models\User;?>

@include('include.header')

@include('include.navbar')    

@include('doctors.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">HOME</a></li>
              <li class="breadcrumb-item active">APPOINTMENTS</li>
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
                            <h3 class="card-title">Appointments List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Sender</th>
                                      <th>Created At</th>
                                      <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $no = 1; ?>
                                  @if($appointments->count() != null)
                                    @foreach ($appointments as $appointment)
                                      <tr>
                                        <td>{{ $no++ }}</td>

                                        @if($users->find($appointment->sender_id) != null)
                                          <td>{{$users->find($appointment->sender_id)->username}}</td>
                                        @else
                                          <td>NA</td>
                                        @endif

                                        <td>{{ $appointment->created_at->format('M d, y')}}</td>
                                        <td>
                                          <button type="button" class="send_mail_trigger" data="{{ $appointment->id }}" class='btn btn-sm btn-primary'><i class="fas fa-envelope"></i></button>
                                          <a href="{{ route('doctor.delete_appointment', ['id' => $appointment->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                      </tr>
                                    @endforeach
                                  @endif
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

<!-- Send mail modal -->
<div class="modal" tabindex="-1" id="sendMailModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form" action="{{ url('doctor/appointments/send-mail') }}/{{$appointment->sender_id}}/{{$users->find($appointment->doctor_id)->id}}" method="POST">
        @csrf

        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <textarea name="email_message" id="email_message" cols="30" rows="10" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label for="">Date</label>
            <input type="date" name="appointment_date" class="form-control">
          </div>
          
          <div class="form-group">
            <label for="">Time</label>
            <input type="time" name="appointment_time" class="form-control">
          </div>
        </div>

        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Send Mail">
        </div>
      </form>
    </div>
  </div>
</div>




  <!-- /.content-wrapper -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  <script>
    @if(Session::has('mail_sent'))
      swal({
        'title':'MAIL SENT',
        'text':"{{ Session::get('mail_sent') }}",
        'icon':'success',
      });
    @endif
  </script>

@include('include.footer')
