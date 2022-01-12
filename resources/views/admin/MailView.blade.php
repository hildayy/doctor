
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.styles')
    <style type="text/css">
      label
      {
        display: inline-block;
        width: 200px;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       
        <!-- partial -->
            <div class="container" align="center" style="padding-top:70px;">              
            @if(session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">x</button>
              {{session()->get('message')}}
            </div>

            @endif  
            <form action="{{url('sendmail,$data->$id')}}" method="POST">
                @csrf
                <div style="padding: 15px;">
                    <label>Greeting </label>
                    <input type="text"name="greeting"style="color: black;">
                </div> 
                <div style="padding: 15px;">
                    <label>Body </label>
                    <input type="text"name="body" style="color: black;">
                </div> 
                
                <div style="padding: 15px;">
                    <label>Action text </label>
                    <input type="text"name="actiontext" style="color: black;">
                </div>  
                <div style="padding: 15px;">
                    <label>Action url </label>
                    <input type="text"name="actionurl" style="color: black;">
                </div> 
                <div style="padding: 15px;">
                    <label>End part </label>
                    <input type="text"name="endpart" style="color: black;">
                </div>   
                <div style="padding: 15px;">
                    
                    <input type="submit" class="btn btn-success">
                </div>    

              </form>
              
            </div>   
        </div>    
    <!-- container-scroller -->
      @include('admin.scripts')
    <!-- End custom js for this page -->
  </body>
</html>