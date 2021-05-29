<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

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
<<<<<<< HEAD
            <a href="index" class="nav-link">
=======
            <a href="{{ route('index') }}" class="nav-link @if(Request::url() == Request::is('/')) active @endif()">
>>>>>>> 18418afa982e8ce8f4e74f639878c87e982a42fe
              <i class="fas fa-columns"></i>
                <p>Dashboard</p>
            </a>
          </li>

          
          <li class="nav-item">
<<<<<<< HEAD
            <a href="departments" class="nav-link">
=======
            <a href="{{ route('departments') }}" class="nav-link @if(Request::url() == Request::is('departments')) active @endif()">
>>>>>>> 18418afa982e8ce8f4e74f639878c87e982a42fe
              <i class="fas fa-clinic-medical"></i>
                <p>Departments</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('doctors') }}" class="nav-link @if(Request::url() == Request::is('doctors')) active @endif()">
              <i class="fas fa-user-md"></i>
                <p>Doctors</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link @if(Request::url() == Request::is('nurses')) active @endif()">
              <i class="fas fa-user-nurse"></i>
                <p>Nurses</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-wheelchair"></i>
                <p>Patients</p>
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
                <p>Laboratorists</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
                <p>Acountants</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-receipt"></i>
                <p>Receptionists</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-info"></i>
                <p>Nocitce Board</p>
            </a>
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