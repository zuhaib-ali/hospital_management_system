<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <!-- USER PROFILE IMAGE -->
            <div class="image">
                @if (Session::get('user')->profile_img != null)
                    <img src="{{ asset('profile_images') }}/{{ Session::get('user')->profile_img }}"
                        class="img-circle elevation-2" alt="User Image" style='width:50px; height:50px'>
                @else
                    <img src="{{ asset('images/user.png') }}" class="img-circle elevation-2" alt="User Image"
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
                    <a href="{{ route('user.index') }}" class="nav-link @if (Route::currentRouteName() == 'user.index') active @endif()">
                        <i class="fas fa-columns"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('user.appointment') }}" class="nav-link @if (Route::currentRouteName() == 'user.appointment') active @endif()">
                        <i class="fas fa-handshake"></i>
                        <p>Appointment</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('user.settings') }}" class="nav-link @if (Route::currentRouteName() == 'user.settings') active @endif()">
                        <i class="fas fa-user-cog"></i>
                        <p>Settings</p>
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
