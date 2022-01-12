<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>My Doc - Medical Center</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
  <style>
    #dimScreen
{
    position:fixed;
    padding:0;
    margin:0;

    top:0;
    left:0;

    width: 100%;
    height: 100%;
   
}

    </style>

</head>
<body >

  <!-- Back to top button -->
  <div class="back-to-top"></div>
  <header>
    @if(session()->has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{session()->get('message')}}
      </div>
     @endif 
    

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">My</span>-Doc</a>

  

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="{{url('')}}">Home</a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="{{url('allDocs')}}">Doctors</a>
            </li>
            @if(Route::has('login'))
            @auth
            <li class="nav-item">
              <a class="nav-link "  href="{{url('myAppointments')}}">My Appointments</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active "  href="{{url('myHistory')}}">My History</a>
            </li>
            <x-app-layout>
    
            </x-app-layout>
          
            @else
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">Register</a>
            </li>
            @endauth
            @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>
  
  <div class="main-panel">
        <div class="content-wrapper">
            <div class="row wow zoomIn">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex align-items-center mb-4">
                            <h4 class="card-title mb-sm-0">My History</h4>
                            </div>
                            <div class="table-responsive border rounded p-1">
                            <table class="table">
                                <tr >
                                    <th style="padding: 10px; font: size 20px;">Date</th>
                                    <th style="padding: 10px; font: size 20px; ">Signs And Symptoms</th>
                                    <th style="padding: 10px; font: size 20px; ">Diagnosis</th>
                                    <th style="padding: 10px; font: size 20px; ">Prescription</th>
                                    <th style="padding: 10px; font: size 20px; ">Notes</th>
                                    <th style="padding: 10px; font: size 20px; ">Doctor Name</th>
                                </tr>
                                @foreach($data as $data)    
                                <tr style="padding: 100px;"> 
                                    <td style="padding: 10px; ">{{$data->updated_at}}</td>
                                    <td style="padding: 10px;">{{$data->signsymptoms}}</td>
                                    <td style="padding: 10px;">{{$data->Diagnosis}}</td>
                                    <td style="padding: 10px;">{{$data->Prescription}}</td>
                                    <td style="padding: 10px;">{{$data->Notes}}</td>
                                    <td style="padding: 10px;">{{$data->docname}}</td>
                                </tr>
                                @endforeach 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
  </div>
  

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>