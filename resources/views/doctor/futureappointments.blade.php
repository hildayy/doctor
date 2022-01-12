<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Doc - Medical Center</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="doc/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="doc/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="doc/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./doc/vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./doc/vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./doc/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="logo2.png" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center mt-2">
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="logo2.png" style="width: 50px; height:50px;" alt="logo" class="logo-dark" /><span class="text-sucess">My</span>-Doc
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="logo2.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome to My-Doc!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            
            
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="doc/images/faces/face8.jpg" alt="Profile image"> <span class="font-weight-normal"> Henry Klein </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="doc/images/faces/face8.jpg" alt="Profile image">
                  <p class="mb-1 mt-3">Allen Moreno</p>
                  <p class="font-weight-light text-muted mb-0">allenmoreno@gmail.com</p>
                </div>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-speech text-primary"></i> Messages</a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-energy text-primary"></i> Activity</a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-question text-primary"></i> FAQ</a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
            <li class="nav-item dropdown">
                    <x-app-layout>
    
                    </x-app-layout>
              </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('doctor.sidenav')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
            <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex align-items-center mb-4">
                            <h4 class="card-title mb-sm-0">All Appointments</h4>
                            <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Products</a>
                            </div>
                            <div class="table-responsive border rounded p-1">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="font-weight-bold">Patient name</th>
                                    <th class="font-weight-bold">Email</th>
                                    <th class="font-weight-bold">Phone</th>
                                    <th class="font-weight-bold">Appointment Date</th>
                                    <th class="font-weight-bold">Message</th>
                                    <th class="font-weight-bold">Status</th>
                                    <th class="font-weight-bold">Action</th>


                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $data)
                                    <tr>
                                        <td>{{$data->patientname}}</td>
                                        <td>{{$data->patientEmail}}</td>
                                        <td>{{$data->patientPhone}}</td>
                                        <td>{{$data->appointmentDate}}</td>
                                        <td>{{$data->message}}</td>
                                        <td>{{$data->status}}</td>
                                        @if($data->status=="approved")
                                       
                                        <td>
                                           <a href="{{url('attend_to',$data->id)}}"><div class="badge badge-success p-2">Attend To</div></a>
                                        </td>
                                        @elseif($data->status=="In progress")
                                        <td>
                                           <a href="{{url('approved',$data->id)}}"><div class="badge badge-danger p-2">Approve</div></a>
                                        </td>
                                        @else
                                        <td>
                                           <a href="{{url('view_history',$data->user_id)}}"><div class="badge badge-primary p-2">View History</div></a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach                            
                            
                                </tbody>
                            </table>
                            </div>
                           
                        </div>
                        </div>
                    </div>
            </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="doc/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./doc/vendors/chart.js/Chart.min.js"></script>
    <script src="./doc/vendors/moment/moment.min.js"></script>
    <script src="./doc/vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./doc/vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="doc/js/off-canvas.js"></script>
    <script src="doc/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./doc/js/dashboard.js"></script>
    <!-- End custom js for this page -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    

  </body>
</html>