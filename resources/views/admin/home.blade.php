
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.styles')
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        @include('admin.content')
    <!-- container-scroller -->
      @include('admin.scripts')
    <!-- End custom js for this page -->
  </body>
</html>