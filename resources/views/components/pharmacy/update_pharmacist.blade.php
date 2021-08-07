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
            <h1 class="m-0">UPDATE</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">HOME</a></li>
              <li class="breadcrumb-item"><a href="{{ route('pharmacists') }}"><i class="fas fa-flask"></i> PHARMACISTS</a></li>
              <li class="breadcrumb-item active"><i class="fas fa-edit"></i> UPDATE</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <main class="m-3">
      <!-- CARD -->
      <div class="card">

        <!-- CARD HEADER -->
        <div class="card-header text-center text-bold">UPDATE PHARMACIST</div>

        
        <form action="{{ route('update_pharmacist') }}" method="POST" class="form">
        @csrf 

        <!-- CARD BODY -->
        <div class="card-body">
            
                <!-- FIRST NAME -->
                <div class="form-group">
                    <label for="first_name"><span style="color:red;">*</span>First Name</label>
                    <input type="text" class="form-control" name="first_name" value="{{ $pharmacist->first_name }}">
                </div>

                <!-- LAST NAME -->
                <div class="form-group">
                    <label for="last_name"><span style="color:red;">*</span>Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $pharmacist->last_name }}">
                </div>

                <!-- ADDRESS -->
                <div class="form-group">
                    <label for="address"><span style="color:red;">*</span>Address</label>
                    <textarea name="address" id="address" rows="5" class="form-control">{{ $pharmacist->address }}</textarea>
                </div>

                <!-- PHONE -->
                <div class="form-group">
                    <label for="phone"><span style="color:red;">*</span>Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ $pharmacist->phone }}">
                </div>

                <!-- LOCATION -->
                <div class="form-group">
                    <label for="location"><span style="color:red;">*</span>Location</label>
                    <select name="location" class="form-control" name="location">
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}" @if($location->id == $pharmacist->location_id) selected @endif>{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>            

                <input type="hidden" value="{{ $pharmacist->id }}" name="pharmacist_id">
            
        </div>

        <!-- CARD FOOTER -->
        <div class="card-footer">
            <input type="submit" value="UPDATE" class="form-control btn btn-success text-bold pull-center">
        </div>

        </form>
        
      </div>
    </main>
  </div>
  <!-- /.content-wrapper -->
</script>




