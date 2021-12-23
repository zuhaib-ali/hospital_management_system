<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <!-- USER PROFILE IMAGE -->
            <div class="image">
                @if (Session::get('user')->profile_img)
                    <img src="{{ asset('profile_images') }}/{{ Session::get('user')->profile_img }}"
                        class="img-circle elevation-2" alt="User Image" style='width:50px; height:50px'>
                @else
                    <img src="{{ asset('profile_images/admin.png') }}" class="img-circle elevation-2" alt="User Image"
                        style='width:50px; height:50px'>
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block mt-2 text-white"
                style='text-transform:uppercase'>{{ Session::get('user')->username }}</a>
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
                    <a href="{{ route('doctor.index') }}" class="nav-link @if (Request::url() == Request::is('/')) active @endif()">
                        <i class="fas fa-columns"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('doctor.appointments') }}" class="nav-link @if (Route::currentRouteName() == 'doctor.appointments') active @endif()">
                        <i class="fas fa-columns"></i>
                        <p>Appointments</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('doctor.patients') }}" class="nav-link @if (Route::currentRouteName() == 'doctor.patients') active @endif()">
                        <i class="fas fa-columns"></i>
                        <p>Patients</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
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
