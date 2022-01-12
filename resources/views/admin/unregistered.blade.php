
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
        
        <div class="main-panel">
        <div class="row m-4">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Unregistered Doctors</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> User ID</th>
                            <th> Doctor Name</th>
                            <th> Email </th>
                            <th> Phone </th>
                            <th> Address </th>
                            <th> Register </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($unregistered as $data)
                          <tr>
                            <td>{{$data->id}} </td>
                            <td>{{$data->name}} </td>
                            <td> {{$data->email}}</td>
                            <td> {{$data->phone}}</td>
                            <td> {{$data->address}} </td>
                           
                            <td>
                              <a href="{{url('registerdoc',$data->id)}}"><div class="badge badge-outline-success">Register</div></a>
                            </td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
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