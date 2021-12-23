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
                    <a href="{{ route('index') }}" class="nav-link @if (Request::url() == Request::is('/')) active @endif()">
                        <i class="fas fa-columns"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if (Session::get('user')->role != 'user')
                    @foreach(json_decode(Session::get('user')->permission_id) as $per)
                    
                        @if($per == 1)
                            <!-- Appointments -->
                            <li class="nav-item">
                                <a href="{{ route('appointments') }}" class="nav-link @if (Request::url() == Request::is('appointments')) active @endif">
                                    <i class="ft-layers"></i>
                                    <p>Appointments</p>
                                </a>
                            </li>
                        @endif

                        @if($per == 2)
                            <!-- Locations -->
                            <li class="nav-item">
                                <a href="{{ route('locations') }}" class="nav-link @if (Request::url() == Request::is('locations')) active @endif()">
                                    <i class="ft-map-pin"></i>
                                    <p>Locations</p>
                                </a>
                            </li>
                        @endif

                        @if($per == 3)
                            <!-- Doctors -->
                            <li class="nav-item">
                                <a href="{{ route('doctors') }}" class="nav-link @if (Request::url() == Request::is('admin/doctors')) active @endif()">
                                    <i class="fas fa-user-md"></i>
                                    <p>Doctors</p>
                                </a>
                            </li>
                        @endif

                        @if($per == 4)
                            <!-- LAB TESTS -->
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="fas fa-vials"></i>
                                    <p>Laboratories</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>

                                <ul class="nav nav-treeview">
                                    <!-- LAB REPORTS -->
                                    <li class="nav-item">
                                        <a href="{{ route('lab_reports') }}" class="nav-link">
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
                            </li>
                        @endif

                        @if($per == 5)
                            @if(Session::get('user')->role == 'admin')
                                <!-- PATIENTS -->
                                <li class="nav-item">
                                    <a class="nav-link @if (Request::url() == Request::is('all_patients') || Request::url() == Request::is('admitted_patients') || Request::url() == Request::is('dpatients')) active @endif()">
                                        <i class="ft-users"></i>
                                        <p>
                                            Patients
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <!-- ALL PATIENTS -->
                                        <li class="nav-item">
                                            <a href="{{ route('patients') }}" class="nav-link @if (Request::url() == Request::is('patients')) active @endif()"
                                                class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>All Patients</p>
                                            </a>
                                        </li>

                                        <!-- ADMITTED PATIENTS -->
                                        <li class="nav-item">
                                            <a href="{{ route('admitted_patients') }}" class="nav-link @if (Request::url() == Request::is('admit-patients')) active @endif()"
                                                class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Admitted</p>
                                            </a>
                                        </li>

                                        <!-- DISCHARGED PATIENTS -->
                                        <li class="nav-item">
                                            <a href="{{ route('discharged_patients') }}"
                                                class="nav-link @if (Request::url() == Request::is('dpatients')) active @endif()" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Discharged</p>
                                            </a>
                                        </li>   
                                    </ul>
                                </li>
                            @elseif(Session::get('user')->role == 'doctor')

                            @endif
                        @endif

                        @if($per == 6)
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
                                        <a href="trackingSheet" class="nav-link @if (Request::url() == Request::is('trackingSheet')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Weekly Tracking Sheet</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if($per == 7)
                            <!-- PHARMACISTS -->
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="fas fa-first-aid"></i>
                                    <p>Pharmacy</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>

                                <!-- PHARMACISTS DROPDOWN -->
                                <ul class="nav nav-treeview">

                                    <!-- CATEGORIES -->
                                    <li class="nav-item">
                                        <a href="{{ route('categories') }}" class="nav-link">
                                            <i class="far fa-circle"></i>
                                            <p>Categories</p>
                                        </a>
                                    </li>

                                    <!-- MEDICINES -->
                                    <li class="nav-item">
                                        <a href="{{ route('medicines') }}" class="nav-link">
                                            <i class="far fa-circle"></i>
                                            <p>Medicines</p>
                                        </a>
                                    </li>

                                    <!-- PHARMACISTS -->
                                    <li class="nav-item">
                                        <a href="{{ route('pharmacists') }}" class="nav-link">
                                            <i class="far fa-circle"></i>
                                            <p>Pharmacists</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if($per == 8)
                            <li class="nav-item">
                                <a href="{{ url('/roles') }}" class="nav-link @if (Request::url() == Request::is('/roles')) active @endif">
                                    <i class="ft-layers"></i>
                                    <p>Manage Roles</p>
                                </a>
                            </li>
                        @endif

                        @if($per == 9)
                            <li class="nav-item">
                                <a href="#" class="nav-link @if (Request::url() == Request::is('edit_profile')) active @endif">
                                    <i class="fas fa-cog"></i>
                                    <p>
                                        Settings
                                        <i class="fas fa-angle-left right"></i>
                                    </p>

                                </a>

                                <ul class="nav nav-treeview">
                                    {{-- <li class="nav-item">
                                        <a href="{{ url('/permissions') }}" class="nav-link @if (Request::url() == Request::is('permissions')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Permissions</p>
                                        </a>
                                    </li> --}}

                                    <li class="nav-item">
                                        <a href="{{ route('addLetter') }}" class="nav-link @if (Request::url() == Request::is('addLetter')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Template Letter</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('emailLetter') }}" class="nav-link @if (Request::url() == Request::is('emailLetter')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Email Template Letter</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('edit_profile') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Edit Profile</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if($per == 10)
                            <!-- Sepcializations -->
                            <li class="nav-item">
                                <a href="{{ route('specializations') }}" class="nav-link @if (Request::url() == Request::is('admin/specializations')) active @endif()">
                                    <i class="fas fa-briefcase"></i>
                                    <p>Specializations</p>
                                </a>
                            </li>
                        @endif

                        @if($per == 11)
                            <!-- Users -->
                            <li class="nav-item">
                                <a href="{{ route('aUsers') }}" class="nav-link @if (Request::url() == Request::is('aUsers')) active @endif()">
                                    <i class="ft-users"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif

                
                @if(Session::get('user')->role == 'user')
                    <li class="nav-item">
                        <a href="{{ route('fix_appointment') }}" class="nav-link">
                            <i class="ft-layers"></i>
                            <p>Set Appointment</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link @if (Request::url() == Request::is('edit_profile')) active @endif">
                            <i class="fas fa-cog"></i>
                            <p>
                                Settings
                                <i class="fas fa-angle-left right"></i>
                            </p>

                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('edit_profile') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Edit Profile</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

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
