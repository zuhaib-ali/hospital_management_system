@include('include.header')

@include('include.navbar')    

@include('include.sidebar')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="card mx-3">
      <div class="card-header text-center text-bold" style="background-color:#3f51b5; color:white;">
        EDIT LOCATION
      </div>
      <div class="card-body p-2">
        <form action="{{ route('update_location') }}" method="POST" class="form col-12">
          <!-- CSRF TOKEN -->
          @csrf

          <div class="form-row">
            <!-- NAME -->
            <div class="form-group col-6">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="location_name" value="{{ $location->name}}">
            </div>

            <!-- E-MAIL -->
            <div class="form-group col-6">
              <label for="e_mail">E-Mail</label>
              <input type="email" class="form-control" name="e_mail" value="{{ $location->email }}">
            </div>
          </div>

          <!-- ADDRESS -->
          <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" name="address" rows="6">{{ $location->address }}</textarea>
          </div>

          <!-- PHONE -->
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" class='form-control' value="{{ $location->phone}}" name="phone">
          </div>

          <hr>

          <!-- USER ID HIDDEN -->
          <input type="hidden" name="location_id" value="{{ $location->id }}">


          <!-- UPDATE BUTTON -->
          <div class="form-group">
            <input type="submit" class="btn btn-dark form-control" value="UPDATE">    
          </div>

        </form>
      </div>
    </div>
    <br><br>
  </div>

@include('include.footer')