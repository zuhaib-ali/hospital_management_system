<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/'.Session::get('user')->profile_img) }}" class="img-circle elevation-2" alt="User Image" style='width:50px; height:50px'>
        </div>
        <div class="info">
          <a href="#" class="d-block mt-2 text-white" style='text-transform:uppercase'>{{ Session::get('user')->first_name }} {{ Session::get('user')->last_name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{ route('index') }}" class="nav-link @if(Request::url() == Request::is('/')) active @endif()">
              <i class="fas fa-columns"></i>
                <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('addPatients') }}" class="nav-link @if(Request::url() == Request::is('addPatients')) active @endif()">
              <i class="ft-user-plus"></i>
                <p>Add Patients</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('patients') }}" class="nav-link @if(Request::url() == Request::is('patients')) active @endif()">
              <i class="ft-users"></i>
                <p>Patients</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('appointments') }}" class="nav-link @if(Request::url() == Request::is('appointments')) active @endif()">
              <i class="ft-layers"></i>
                <p>Appointments</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('locations') }}" class="nav-link @if(Request::url() == Request::is('locations')) active @endif()">
              <i class="ft-map-pin"></i>
                <p>Locations</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-first-aid"></i>
                <p>Phramacists</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user-alt"></i>
                <p>Laboratories</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-receipt"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Weekly Tracking Sheet</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-cog"></i>
                <p>Settings</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="logout" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>