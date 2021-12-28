<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <!-- USER PROFILE IMAGE -->
            <div class="image">
                @if (Session::get('user')->profile_img != null)
                    <img src="{{ asset('profile_images') }}/{{ Session::get('user')->profile_img }}" class="img-circle elevation-2" alt="ADMIN PROFILE" style='width:50px; height:50px'>
                @else
                    <img src="{{ asset('images/user.png') }}" class="img-circle elevation-2" alt="ADMIN PROFILE" style='width:50px; height:50px'>
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
                    <a href="{{ route('admin.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.index') active @endif()">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.appointments') }}" class="nav-link @if (Route::currentRouteName() == 'admin.appointments') active @endif()">
                        <i class="fas fa-handshake"></i>
                        <p>Appointments</p>
                    </a>
                </li>

                <!--  -->
                <li class="nav-item">
                    <a href="{{ route('admin.branches') }}" class="nav-link @if (Route::currentRouteName() == 'admin.branches') active @endif()">
                        <i class="fas fa-code-branch"></i>
                        <p>Branches</p>
                    </a>
                </li>

                <!-- Doctors -->
                <li class="nav-item">
                    <a href="{{ route('admin.doctors') }}" class="nav-link @if (Route::currentRouteName() == 'admin.doctors') active @endif()">
                        <i class="fas fa-user-md"></i>
                        <p>Doctors</p>
                    </a>
                </li>

                <!-- Laboratories -->
                {{-- <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-vials"></i>
                        <p>Laboratories</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>

                    <ul class="nav nav-treeview">
                        <!-- LAB REPORTS -->
                        <li class="nav-item">
                            <a href="{{ route('admin.lab_reports') }}" class="nav-link">
                                <i class="far fa-circle"></i>
                                <p>Lab Reports</p>
                            </a>
                        </li>

                        <!-- ADD LAB REPORT -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle"></i>
                                <p>Add Lab Report</p>
                            </a>
                        </li>

                        <!-- TEMPLATE -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle"></i>
                                <p>Template</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <!-- Patients -->
                <li class="nav-item">
                    <a href="{{ route('admin.patients')  }}" class="nav-link @if (Route::currentRouteName() == 'admin.show_patients_to_doctor' || Route::currentRouteName() == 'admin.patinet_information') active @endif()">
                        <i class="fas fa-user-injured"></i>
                        <p>Patients</p>
                    </a>
                </li>

                <!-- Specializations -->
                <li class="nav-item">
                    <a href="{{ route('admin.specializations') }}" class="nav-link @if (Route::currentRouteName() == 'admin.specializations') active @endif()">
                        <i class="fas fa-file-export"></i>
                        <p>Specializations</p>
                    </a>
                </li>

                <!-- Users -->
                <li class="nav-item">
                    <a href="{{ route('admin.users') }}" class="nav-link @if (Route::currentRouteName() == 'admin.users') active @endif()">
                        <i class="fas fa-users"></i>
                        <p>Users</p>
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
