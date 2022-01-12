

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.styles')
    <style type="text/css">
      label
      {
        display: inline-block;
        width: 2 00px;
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
            <div class="container" align="center" style="padding-top:100px;">              
            <table>
           <tr style="background-color: black;">
               <th style="padding: 10px;">Patient name</th>
               <th style="padding: 10px;">Email</th>
               <th style="padding: 10px;">Phone</th>
               <th style="padding: 10px;">Doc Name</th>
               <th style="padding: 10px;">Date</th>
               <th style="padding: 10px;">Message</th>
               <th style="padding: 10px;">status</th>
               <th style="padding: 10px;">Action</th>
                               

           </tr>
           @foreach($appointments as $data)
           <tr align="center" style="background-color: white; color:black;">
                <td>{{$data->patientname}}</td>
                <td>{{$data->patientEmail}}</td>
                <td>{{$data->patientPhone}}</td>
                <td>{{$data->docname}}</td>
                <td>{{$data->appointmentDate}}</td>
                <td>{{$data->message}}</td>
                <td>{{$data->status}}</td>
                @if($data->status=="In progress")
                                       
                  <td>
                    <a class="btn btn-success" href="{{url('approved',$data->id)}}">Approved</a>
                    <a class="btn btn-danger" href="{{url('canceled',$data->id)}}">Cancel</a>

                  </td>
                @elseif($data->status=="done")
                <td><p>The appointment is done</p></td>
                    
                @else
                  <td>
                      <a class="btn btn-primary" href="{{url('MailView',$data->id)}}">Send mail</a>                      
                  </td>
                @endif                
           </tr>
           @endforeach
       </table>
              
            </div> 
              
        </div>    
    <!-- container-scroller -->
      @include('admin.scripts')
    <!-- End custom js for this page -->
  </body>
</html>