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
            <h1 class="m-0 text-blue">LABORATARIES</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-red"> <i class="fas fa-home"></i>  Home</a></li>
              <li class="breadcrumb-item active text-blue"> <a href="#"><i class="fas fa-user-md"> LABORATARIES</i></a> </li>
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
                <div class="card-header" style="background-color:darkblue;">
                  <center class="text-bold" style="color:white;">LABS ({{ count($labs) }})</center>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover text-center">
                    <thead>
                      <tr>
                        <th>S.NO</th>
                        <th>NAME</th>
                        <th>HOSPITAL</th>
                        <th>TIMING</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sno = 1; ?>
                      @foreach($labs as $lab)
                        <tr>
                          <td> {{ $sno++ }} </td>
                          <td> {{$lab->name}} </td>
                          <td> {{$lab->hospital}} </td>
                          <td> From : {{$lab->from}} - To: {{$lab->to}} </td>
                          
                        </tr>
                      @endforeach                       
                    </tbody>
                  </table>
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

@include('include.footer')