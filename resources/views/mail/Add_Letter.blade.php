@include('include.header')


@include('include.navbar')    

@include('include.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Email Letter Template</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index') }}">HOME</a></li>
              <li class="breadcrumb-item active">Add Email Letter Template</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    @if(Session::has('success'))
      <br>
      <div class="text-center text-bold m-3 py-2" style="background-color:lightgreen; color:blue;" id="message">
        {{ Session::get('success') }}
      </div>
    @endif

    <div class="card mx-3">
      <div class="card-header text-center text-bold" style="background-color:#3f51b5; color:red;">
        Add Email Letter Template
      </div>
      <div class="card-body p-2">
        @foreach($data as $tmp)
        <form action="{{ route('addLetterTemplate') }}" method="POST" class="form col-12">
          <!-- CSRF TOKEN -->
          @csrf
          <!-- FORM ROW -->
          <div class="form-row">

            <!-- FIRST NAME -->
            <div class="form-group col-12">  
              <label for="first_name"><span style="color:red;">*</span>Title</label>
              <input type="text" class="form-control" name="title" value="@if($tmp != null) {{$tmp->title}} @endif">
            </div>
            <br>
            <!-- LAST NAME -->
            <div class="form-group col-12">
              <label for="last_name"><span style="color:red;">*</span>Body</label>
              <textarea class="form-control" name="body" cols="5" rows="4">@if($tmp != null){{ $tmp->body }} @endif</textarea>
            </div>
          </div>

          <center>
            <button type="submit" class="btn btn-success col-lg-6"> Submit </button>
          </center>
        </form>
        @endforeach
      </div>
    </div>
    <br><br>
  </div>


@include('include.footer')