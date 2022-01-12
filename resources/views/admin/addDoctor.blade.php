
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.styles')
  <body>
    <div class="container-scroller">
      
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
      <div class="container-fluid page-body-wrapper"> 
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{session()->get('message')}}
                        </div>
                     @endif
                    <div class="card-body">
                    <form action="{{url('uploadDoc')}}" method="POST"  enctype="multipart/form-data" >
                        @csrf
                                               
                        <div class="form-group">
                            <label for="docname">Doctor Name</label>
                            <input  class="form-control" type="text"name="docname">
                        </div>
                        <div class="form-group">
                            <label for="docphone">Phone Number </label>
                            <input class="form-control" type="number"name="docphone" >
                        </div>
                        <div class="form-group">
                            <label for="docmail">Doctor Email</label>
                           <input type="text" name="docmail" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="Prescription">Doctor's Speciality</label>
                            <select name="speciality" class="form-control" style="background-color: white;color:black">
                              <option value="">---select-----</option>
                              <option value="Heart">Heart</option>
                              <option value="Skin">Skin</option>
                              <option value="physician">Physician</option>
                              <option value="Padeatric">Padeatric</option>
                              <option value="Neurology">Neurology</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label>Doctor's Image </label>
                          <input type="file"name="docpic" class="form-control" style="border: black;">
                        </div>                       
                        <div class="form-group">
                           <input type="submit" class="btn btn-success" style="background-color: green; ">
                        </div>
                        </form>
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
    </div>  
    <!-- container-scroller -->
      @include('admin.scripts')
    <!-- End custom js for this page -->
  </body>
</html>