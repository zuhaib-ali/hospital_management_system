@include('include.header')

@include('include.navbar')    

@include('admin.sidebar')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="card mx-3">
      <div class="card-header text-center text-bold" style="background-color:#3f51b5; color:white;">
        EDIT BRANCH
      </div>
      <div class="card-body p-2">
        <form action="{{ route('admin.update_location') }}" method="POST" class="form col-12">
          <!-- CSRF TOKEN -->
          @csrf

          <div class="form-row">
            <!-- Hospital -->
            <div class="form-group col-4">
              <label for="name">Hospital</label>
              <input type="text" class="form-control" name="hospital" value="{{ $location->hospital }}" readonly>
            </div>

            <!-- City -->
            <div class="form-group col-4">
              <label for="name">City</label>
              <input type="text" class="form-control" name="city" value="{{ $location->city }}">
            </div>

            <!-- E-MAIL -->
            <div class="form-group col-4">
              <label for="e_mail">E-Mail</label>
              <input type="email" class="form-control" name="email" value="{{ $location->email }}" readonly>
            </div>
          </div>

          <!-- ADDRESS -->
          <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" name="address" rows="2">{{ $location->address }}</textarea>
          </div>

          <div class="form-row">
            <div class="col-6">
              <!-- PHONE -->
              <div class="form-group">
                <label for="phone">Contact</label>
                <input type="number" class='form-control' value="{{ $location->contact }}" name="contact">
              </div>
            </div>
            <div class="col-6">
              <!-- Zip Code -->
              <div class="form-group">
                <label for="phone">Zip code</label>
                <input type="number" class='form-control' value="{{ $location->zip_code }}" name="zip_code">
              </div>
            </div>
          </div>
          <hr>

          <input type="hidden" name="id" value="{{ $location->id }}">

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