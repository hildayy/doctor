
<div id="myappointment" class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form" action="{{url('addAppointment')}}" method="POST">
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input name="patientname" type="text" class="form-control" placeholder="Full name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input name="patientEmail" type="text" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input name="appointmentDate" type="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="docname" id="docname" class="custom-select">
              <option value="general">--Choose the doctor--</option>
              @foreach($doctor as $doctors)
              <option value="{{$doctors->docname}}">{{$doctors->docname}} ----{{$doctors->speciality}}</option>
              @endforeach

            </select>
          </div>
          <div  class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input name="patientPhone" type="text" class="form-control" placeholder="Number..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn" style="background-color:green; color:ivory;">Submit Request</button>
      </form>
    </div>
  </div>