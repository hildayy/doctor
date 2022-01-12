<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="{{url('/home')}}" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="doc/images/faces/face8.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"> {{Auth::user()->name}} </p>
                 
                </div>
                
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/home')}}">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">MY TASKS</span></li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Appointments</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{url('today_appointments')}}">Today's Appointments</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('future_appointments')}}">Future Appointments</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('all_appointments')}}">All Appointments</a></li>

                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('allPatients')}}">
                <span class="menu-title">Patient List</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>