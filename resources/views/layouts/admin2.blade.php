<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ config('app.name', 'Summit') }} - @yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('admin-assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   @foreach(config('admin-constants.styles') as $style)
  <link href="{{asset($style)}}" rel="stylesheet" type="text/css" />
  @endforeach
  <!-- Custom styles for this template-->
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

  <script src="{{asset('admin-assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('js/admin.js?t='.time())}}"></script>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
   
    <!-- End of Sidebar -->
     @include('includes.administrator.sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
         @include('includes.administrator.header')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      @include('includes.administrator.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  

  <!-- Bootstrap core JavaScript-->
 @foreach(config('admin-constants.js') as $js)
  <script src="{{asset($js)}}" type="text/javascript"></script>
  @endforeach
<script>

$( document ).ready(function() {
  var phpReqId = {{$reqid}};
  var phpDutyId = {{$dutyid}};
  console.log(phpReqId);
  console.log(phpDutyId);
if( typeof phpDutyId !== 'undefined' ) {
 var dutyId =phpDutyId;
}
else{
var dutyId =2;
}
if( typeof phpReqId !== 'undefined' ) {
 var reqId =phpReqId;
}
else{
var reqId =2;
}
$('#addduties').click( function(j) {

 $("#duties").append(

             '<div class="form-group">'+
             '<label for="JobFields_duties_'+dutyId+'" class="required">Duty '+dutyId+' <span class="required">*</span></label>'+
             '<input size="60" maxlength="100" name="JobFields[duties]['+dutyId+']" id="JobFields_duties_'+dutyId+'" type="text" value="" class="form-control">'+
             '</div>'
 );
 dutyId++;
 });
$('#addrequirementes').click( function(j) {

 $("#requirements").append(

             '<div class="form-group">'+
             '<label for="JobFields_requirements_'+reqId+'" class="required">Requirement '+reqId+' <span class="required">*</span></label>'+
             '<input size="60" maxlength="100" name="JobFields[requirements]['+reqId+']" id="JobFields_requirements_'+reqId+'" type="text" value="" class="form-control">'+
             '</div>'
 );
 reqId++;
 });
});
</script>
</body>

</html>
