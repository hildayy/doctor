
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.styles')
   
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      @include('admin.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @if(session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">x</button>
              {{session()->get('message')}}
            </div>

            @endif 
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-sm-flex align-items-center mb-4">
                        <div>
                          <form action="{{url('editdoc',$data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group"style="padding: 15px;">
                              <label>Doctor Image</label>
                              <img height="200px" width="200px" src="doctorimage/{{$data->docpic}}" class="rounded-circle ">
                            </div>
                            <div  class="form-group" style="padding: 15px;">
                              <label>Doctor Name</label>
                              <input class="form-control" style="color: black;"  type="text" name="docname" value="{{$data->docname}}">
                            </div> 
                            <div  class="form-group" style="padding: 15px;">         
                              <label>Doctor Phone</label>
                              <input class="form-control" style="color:black;" type="text" name="docphone" value=" {{$data->docphone}}">
                            </div>
                            <div style="padding: 15px;"  class="form-group">
                              <label>Doctor Speciality</label>
                              <input class="form-control" style="color:black;" type="text" name="speciality" value="{{$data->speciality}}">
                                  </div>
                            <div style="padding: 15px;"  class="form-group">
                              <label>Change Image</label>
                              <input class="form-control" style="border:black;" type="file" name="docpic">
                            </div>
                            <div style="padding: 15px;">
                            <input type="submit" class="btn btn-primary bg-primary">
                            </div>         
                      
                          </form>    
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>  
        </div>
      </div>
    </div>
    
    
    <!-- container-scroller -->
      @include('admin.scripts')
    <!-- End custom js for this page -->
  </body>
</html>