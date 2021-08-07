@include('include.header')
<style rel="stylesheet">
  .card-header, .modal-header{
    background-color:skyblue;
    color:white;
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
            <h1 class="m-0">PHARMACISTS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> HOME</a></li>
              <li class="breadcrumb-item active"><a><i class="fas fa-flask"></i> PHARMACISTS</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <main class="m-3">
      <div class="card">
        <div class="card-header">
          <h3>
            PHARMACISTS
            <button style="color:white;" class="btn btn-success pull-right" data-toggle="modal" data-target="#addMedicine">
              <i class="fas fa-plus"></i>
              ADD NEW PHARMACIST
          </button>
          </h3>
          
        </div>
        <div class="card-body">
        @if(count($pharmacists) !== 0)
          <table class="table table-hover table-bordered text-center">
          
            <!-- TABLE HEAD -->
            <thead>
              <tr>
                <th>NO</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>ADDRESS</th>
                <th>PHONE</th>
                <th>LOCATION</th>
                <th>ACTIONS</th>
              </tr>
            </thead>

            <!-- TABLE BODY -->
            
            <tbody>
              <?php $no = 1; ?>
                @foreach($pharmacists as $pharmacist)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pharmacist->first_name }}</td>
                    <td>{{ $pharmacist->last_name }}</td>
                    <td>{{ $pharmacist->address }}</td>
                    <td>{{ $pharmacist->phone }}</td>
                    <td>{{ $locations->find($pharmacist->location_id)->name }}</td>
                    <td>
                        <a href="{{ route('update_view', ['pharmacist_id'=>$pharmacist->id]) }}" class="btn btn-sm btn-outline-info">UPDATE</a>
                        <a href="{{ route('delete_pharmacist', ['pharmacist_id'=>$pharmacist->id]) }}" class="btn btn-sm btn-outline-danger">DELETE</a>
                    </td>
                  </tr>
                @endforeach
              @else
                <center style="font-style:italic" class="text-bold p-5">No pharmacist found!</center>
              
            </tbody>
            @endif
          </table>
        </div>
      </div>
    </main>
  </div>
  <!-- /.content-wrapper -->

  <!-- ADD CATEGORY MODAL -->
  <div class="modal fade" id="addMedicine" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <!-- MODAL HEADER -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add a new pharmacist</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action=" {{ route('add_pharmacist') }} " method="POST">
          @csrf
          <!-- MODAL BODY -->
          <div class="modal-body">

            <!-- FIRST NAME -->
            <div class="form-group">
                <label for="first_name"> <span style="color:red;">*</span>First Name </label>
                <input type="text" class="form-control" name="first_name">
            </div>

            <!-- LAST NAME -->
            <div class="form-group">
                <label for="last_name"> <span style="color:red;">*</span>Last Name </label>
                <input type="text" class="form-control" name="last_name">
            </div>

            <!-- ADDRESS -->
            <div class="form-group">
                <label for="phone"> <span style="color:red;">*</span>Address</label>
                <input type="text" class="form-control" name="address">
            </div>

            <!-- PHONE -->
            <div class="form-group">
                <label for="phone"> <span style="color:red;">*</span>Phone</label>
                <input type="text" class="form-control" name="phone">
            </div>

            <!-- LOCATION -->
            <div class="form-group">
                <label for="location"> <span style="color:red;">*</span> Location</label>
                <select name="location" id="location" class="form-control">
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <!-- MODAL FOOTER -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
            <input type="submit" class="btn btn-primary" value="ADD">
          </div>

        </form>
      </div>
    </div>
  </div>

  <!-- SWEET ALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('include.footer')

<script>
  // IF CREATED SHOW THIS MESSAGE
  @if(Session::has('pharmacist_created'))
    swal({
      'title':'PHARMACIST CREATED',
      'text':"{{ Session::get('pharmacist_created') }}",
      'icon':'success'
    });
  @endif

  @if(Session::has('pharmacist_updated'))
    swal({
      'title':'PHARMACIST UPDATED',
      'text':"{{ Session::get('pharmacist_updated') }}",
      'icon':'success'
    });
  @endif

  // IF DELTED SHOW THIS MESSAGE
  @if(Session::has('pharmacist_deleted'))
    swal({
      'title':'PHARMACIST DELETED',
      'text':"{{ Session::get('pharmacist_deleted') }}",
      'icon':'info'
    });
  @endif
</script>




