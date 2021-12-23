@include('include.header')

<style rel="stylesheet">

</style>

@include('include.navbar')    

@include('admin.sidebar')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Labs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item" style="color:red;"> <a href="{{ route('admin.index') }}"><i class="fas fa-home"></i>  Home</a></li>
              <li class="breadcrumb-item active"> <a><i class="fas fa-tags"></i> Labs</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content-body" style="padding:20px;">
      <!-- ROW -->
      <div class="row">
        <div class="col-sm-8">
          <!-- CARD -->
          <div class="card">
            <!-- CARD HEADER -->
            <div class="card-header">
              <h3>ALL LAB</h3>
            </div>
            <!-- CARD BODY -->
            <div class="card-body">
              <table class="table table-borderd text-center">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Hospital</th>
                    <th>Timings</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($labs) != 0)
                    @foreach($labs as $lab)
                      <tr>
                        <td id="lab_id">{{ $lab->id }}</td>
                        <td>{{ $lab->name }}</td>
                        <td>{{ $lab->hospital }}</td>
                        <td>From {{ $lab->from }} To {{ $lab->to }}</td>
                        <td>
                          <!-- EDIT LAB TEST -->
                          <a href="" class="btn btn-outline-secondary"><i class="fas fa-edit"></i></a>
                          <!-- DELETE LAB TEST -->
                          <a href="" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
          <!-- /CARD -->
        </div>
        <!-- /COL-SM-8 -->


        <!-- COLUMN SM 4 -->
        <div class="col-sm-4">
          <!-- FORM -->
          <form action="{{ route('admin.addLab') }}" method="POST" class="form">
            @csrf
            <!-- CARD -->
            <div class="card">
              <!-- CARD HEADER -->
              <div class="card-header">
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus" style="color:blue;"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
                <h3>Add Lab </h3>
                
              </div>
              <!-- CARD BODY -->
              <div class="card-body">
                
                  <!-- <div class="form-row"> -->
                    <!-- DATE -->
                    <div class="form-group">
                      <label for="date">Lab Name</label>
                      <input type="text" name="name" class="form-control" >
                    </div>
                    <!-- PATIENT -->
                    <div class="form-group">
                      <label for="patient"> Branch </label>
                      <select name="hospital" class="form-control" >
                        <option value="" hidden selected disabled>-- SELECT HOSPITAL BRANCH CITY --</option>
                          @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->city }}</option>
                          @endforeach
                      </select>
                    </div>
                  <!-- </div> -->
                  <!-- / FORM ROW 1-->

                  <!-- <div class="row"> -->
                    <!-- TEST REFERED BY DOCTOR  -->
                    <div class="form-group">
                      <label for="doctor">Opening Timing</label>
                      <input type="time" name="from" class="form-control">
                    </div>

                    <!-- TEST TEMPLATE -->
                    <div class="form-group">
                      <label for="template">Closing Timing</label>
                      <input type="time" name="to" class="form-control">
                    </div>
                  <!-- </div> -->
                  <!-- / FORM ROW 2 -->
                  <hr>
                  <div class="form-group">
                    <input type="submit" class="form-control btn btn-success" value="ADD LAB">
                  </div>
              </div>      
            </div>
          </form>
        </div>
        <!-- /CONTENT BODY COLUMN 12 -->
      </div>
      <!-- /ROW -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- SWEET ALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="{{ asset('js/jquery.min.js') }}"></script>

  <script>
    @if(Session::has('labtest_created'))
      swal({
        title: "LAB TEST ADDED",
        text: "{{ Session::get('labtest_created') }}",
        icon: "success",
        button: "CLOSE",
      });
    @endif

    @if(Session::has('labCreated'))
      swal({
        title: "LAB ADDED",
        text: "{{ Session::get('labCreated') }}",
        icon: "success",
        button: "CLOSE",
      });
    @endif

    @if(Session::has('lab_test_deleted'))
      swal({
        title: "LAB TEST DELETED",
        text: "{{ Session::get('lab_test_deleted') }}",
        icon: "info",
        button: "CLOSE",
      });
    @endif

    @if(Session::has('lab_test_updated'))
      swal({
        title: "LAB TEST UPDATED",
        text: "{{ Session::get('lab_test_updated') }}",
        icon: "info",
        button: "CLOSE",
      });
    @endif
  </script>
@include('include.footer')