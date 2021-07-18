
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <!-- USER PROFILE IMAGE -->
        <div class="image">
          @if(Session::get('user')->profile_img)
          <img src="{{ asset('images/'.Session::get('user')->profile_img) }}" class="img-circle elevation-2" alt="User Image" style='width:50px; height:50px'>
          @else
          <img src="{{ asset('images/user.png') }}" class="img-circle elevation-2" alt="User Image" style='width:50px; height:50px'>
          @endif
        </div>
        
        <!-- USER FIRST AND LAST NAME -->
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
                <p>DASHBOARD</p>
            </a>
          </li>

          @if(Session::get('user')->role == "admin")
          <li class="nav-item">
            <a href="{{ route('addPatients') }}" class="nav-link @if(Request::url() == Request::is('addPatients')) active @endif()">
              <i class="ft-user-plus"></i>
                <p>ADD PATIENT</p>
            </a>
          </li>
          @endif

          @if(Session::get('user')->role == 'admin')
            <li class="nav-item">
              <a href="{{ route('doctors') }}" class="nav-link @if(Request::url() == Request::is('admin/doctors')) active @endif()">
                <i class="fas fa-user-medical"></i>
                <p>DOCTORS</p>
              </a>
            </li>
          @endif


          @if(Session::get('user')->role == "admin")
          <!-- PATIENTS -->
          <li class="nav-item">
            <a class="nav-link @if(Request::url() == Request::is('all_patients') || Request::url() == Request::is('admitted_patients') || Request::url() == Request::is('dpatients')) active @endif()">
              <i class="ft-users"></i>
              <p>
                PATIENTS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">              
              <!-- ALL PATIENTS -->
              <li class="nav-item">
                <a href="{{ route('all_patients') }}" class="nav-link @if(Request::url() == Request::is('all_patients')) active @endif()" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Patients</p>
                </a>
              </li>

              <!-- ADMITTED PATIENTS -->
              <li class="nav-item">
                <a href="{{ route('admitted_patients') }}" class="nav-link @if(Request::url() == Request::is('patients')) active @endif()" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admitted</p>
                </a>
              </li>

              <!-- DISCHARGED PATIENTS -->
              <li class="nav-item">
                <a href="{{ route('dpatients') }}" class="nav-link @if(Request::url() == Request::is('dpatients')) active @endif()" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Discharged</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          
          <!-- APPOINTMENT FOR ADMIN -->
          @if(Session::get('user')->role == 'admin')
          <!--Admin Can See All Fixed Appointments-->
            <li class="nav-item">
            <a class="nav-link @if(Request::url() == Request::is('appointments') || Request::url() == Request::is('deleted_appointments')) active @endif">
              <i class="ft-layers"></i>
                <p>
                  APPOINTMENT
                  <i class="fas fa-angle-left right"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">
              <!-- APPONINTMENTS -->
              <li class="nav-item">
                <a href="{{ route('appointments') }}" class="nav-link @if(Request::url() == Request::is('appointments')) active @endif">
                  <i class="far fa-circle"></i>
                  <p>All</p>
                </a>
              </li>

              <!-- TRASHED RECORDS -->
              <li class="nav-item">
                <a href="{{ route('trashed_appointments') }}" class="nav-link">
                  <i class="far fa-circle"></i>
                  <p>Trashed</p>
                </a>
              </li>
            </ul>
          </li> 

          <!-- APPOINTMENT FOR USER -->
          @elseif(Session::get('user')->role == 'user')
          <!--User Can Fix Appointments-->
          <li class="nav-item">
            <a href="{{ route('fix_appointment') }}" class="nav-link @if(Request::url() == Request::is('fix_appointment')) active @endif">
              <i class="ft-layers"></i>
                <p>APPOINTMENT</p>
            </a>
          </li> 
          @endif

          
          @if(Session::get('user')->role == "admin")
          <!--Admin Can Add LOCATIONS-->
          <li class="nav-item">
            <a href="{{ route('locations') }}" class="nav-link @if(Request::url() == Request::is('locations')) active @endif()">
              <i class="ft-map-pin"></i>
                <p>LOCATIONS</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="ft-user"></i>
              <p>
                USERS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('aUsers') }}" class="nav-link @if(Request::url() == Request::is('aUsers')) active @endif()">
                  <i class="far fa-circle nav-icon"></i>
                    <p>Staff/Admins</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('users') }}" class="nav-link @if(Request::url() == Request::is('users')) active @endif()">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Users </p>
                </a>
              </li>

            </ul>
          </li>

          @elseif(Session::get('user')->role == 'user')
          <!--User Can Use Locations To Fix Appointment-->

          <li class="nav-item">
            <a href="{{ route('uLocations') }}" class="nav-link @if(Request::url() == Request::is('uLocations')) active @endif()">
              <i class="ft-map-pin"></i>
                <p>LOCATIONS</p>
            </a>
          </li>

          @endif

          @if(Session::get('user')->role == 'admin')
          <!--Admin Can Add PHARMACISTS & LABORATARIES-->

          <!-- PHARMACISTS -->
          <li class="nav-item">
            <a class="nav-link">
              <i class="fas fa-first-aid"></i>
                <p>PHARMACY</p>
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

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user-alt"></i>
                <p>LABORATARIES</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-receipt"></i>
              <p>
                REPORTS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="trackingSheet" class="nav-link @if(Request::url() == Request::is('trackingSheet')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Weekly Tracking Sheet</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link @if(Request::url() == Request::is('edit_profile')) active @endif">
              <i class="fas fa-cog"></i>
              <p>
                SETTINGS
                <i class="fas fa-angle-left right"></i>
              </p>
              
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('emailLetter') }}" class="nav-link @if(Request::url() == Request::is('emailLetter')) active @endif">
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

          @elseif(Session::get('user')->role == 'user')
          <!--User Can Check PHARMACISTS & LABORATARIES-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-first-aid"></i>
                <p>PHARMACY</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user-alt"></i>
                <p>LABORATARIES</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link @if(Request::url() == Request::is('edit_profile')) active @endif">
              <i class="fas fa-cog"></i>
              <p>
                SETTINGS
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
                <p>LOGOUT</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
