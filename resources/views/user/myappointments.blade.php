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
              <a class="nav-link active"  href="{{url('myAppointments')}}">My Appointments</a>
            </li>
            <li class="nav-item">
            <a class="nav-link "  href="{{url('myHistory')}}">My History</a>
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
  
  <div id="dimScreen" class=" bg-image overlay-dark" style=" margin-top:80px;">
 
    <div class="">
      <div class="container  wow zoomIn">
        
        <h1 class="display-4">All Running Appointments</h1>
        
         <table style="width: 80%;">
          <tr >
              <th style="padding: 10px; font: size 20px; ">Doctor Name</th>
              <th style="padding: 10px; font: size 20px;">Date</th>
              <th style="padding: 10px; font: size 20px; ">Message</th>
              <th style="padding: 10px; font: size 20px; ">Status</th>
              <th style="padding: 10px; font: size 20px; ">Action</th>

          </tr>

          @foreach($appoint as $appointments)
            
          <tr style="padding: 100px;"> 
              <td style="padding: 10px; ">{{$appointments->docname}}</td>
              <td style="padding: 10px;">{{$appointments->appointmentDate}}</td>
              <td style="padding: 10px;">{{$appointments->message}}</td>

              <td style="padding: 10px;">{{$appointments->status}}</td>
              @if($appointments->status=="done")
                <td><a class="btn btn-primary" href="{{url('myHistory')}}">View History</a></td>
              @else
              <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?') " href="{{url('cancel_appoint',$appointments->id)}}">Cancel</a></td>
              @endif

          </tr>
          @endforeach 

          
          <a href="{{url('')}}#myappointment"class="btn btn-primary">Make an Appointment</a>
         
                   
      </table>
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