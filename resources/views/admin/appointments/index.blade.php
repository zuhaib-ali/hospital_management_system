<?php use App\Models\User;?>

@include('include.header')

@include('include.navbar')    

@include('admin.sidebar')

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
                                      <th>Doctor</th>
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
                                        
                                        @if($users->find($appointment->doctor_id) != null)
                                          <td>{{$users->find($appointment->doctor_id)->username}}</td>
                                        @else
                                          <td>NA</td>
                                        @endif

                                        <td>{{ $appointment->created_at->format('M d, y')}}</td>
                                        <td><a href="#" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a></td>
                                        @if($users->find($appointment->doctor_id) != null && $users->find($appointment->sender_id) != null)
                                          {{-- <td><a class='btn btn-primary' href="{{ url('appointments/send-mail/') }}/{{$users->find($appointment->sender_id)->id}}/{{$users->find($appointment->doctor_id)->id}}"><i class="fas fa-envelope"></i></a></td> --}}
                                        @endif
                                        
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
<div class="modal" tabindex="-1" role="dialog" id="sendMailModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
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
