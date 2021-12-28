@include('include.header')

@include('include.navbar')    

@include('users.sidebar')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="card mx-3">
      <div class="card-header text-center text-bold" style="background-color:#3f51b5; color:white;">
        EDIT PROFILE
      </div>
      <div class="card-body p-2">

        <form action="{{ route('user.update_user') }}" method="POST" class="form col-12">
          @csrf
          <div class="form-row">
            <!-- First name -->
            <div class="form-group col-4">
              <label for="name">First Name</label>
              <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" readonly>
            </div>

            <!-- Last name -->
            <div class="form-group col-4">
              <label for="name">Last Name</label>
              <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
            </div>

            <!-- E-MAIL -->
            <div class="form-group col-4">
              <label for="e_mail">E-Mail</label>
              <input type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
            </div>
          </div>

          <!-- ADDRESS -->
          <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" name="address" rows="2">{{ $user->address }}</textarea>
          </div>

          <div class="form-row">
            <!-- PHONE -->
            <div class="col-6">
              <div class="form-group">
                <label for="phone">Contact</label>
                <input type="number" class='form-control' name="mobile" value="{{ $user->mobile }}" name="contact">
              </div>
            </div>

            <!-- PROFILE -->
            <div class="col-6">
              <label for="">Gender</label>
              <select name="gender" class="form-control">
                <option value="male" @if($user->gender == 'male') selected @endif>Male</option>
                <option value="female" @if($user->gender == 'female') selected @endif>Female</option>
                <option value="other" @if($user->gender == 'oter') selected @endif>Other</option>
              </select>
            </div>
          </div>

          <hr>

          <input type="hidden" name="id" value="{{ $user->id }}">

          <div class="form-group">
            <input type="submit" class="btn btn-dark form-control" value="UPDATE">    
          </div>

        </form>
      </div>
    </div>
    <br><br>
  </div>

@include('include.footer')