

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.styles')
    <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
  
  </head>
  <body>
    <div class="container-scroller">
      
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
      
        
        <div class="container mt-5 ml-0">
          <div class="row justify-content-center">
            <div class="col-lg-10">
              <div class="row">
                @foreach($doctors as $data) 
                  <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                    <div class="card-doctor" style="width: 600px;">
                        <div class="header">
                          <img src="doctorimage/{{$data->docpic}}" alt="">
                              <div class="meta">
                                  <a onclick="return confirm('Are you sure you want to delete this?')" href="{{url('deleteDoc',$data->id)}}"><span class="mdi mdi-delete">delete</span></a>
                                  <a href="{{url('updateDoc',$data->id)}}"><span class="mdi mdi-account-edit">update</span></a>
                                </div>
                              </div>
                              <div class="body">
                                <p class="text-xl mb-0">{{$data->docname}}</p>
                                <span class="text-sm text-grey">{{$data->speciality}}</span>
                              </div>
                        </div>
                      </div>
                @endforeach
               </div>
            </div>
          </div>
        </div>
    </div>    
    <!-- container-scroller -->
      {{--@include('admin.scripts')--}}
      <script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>