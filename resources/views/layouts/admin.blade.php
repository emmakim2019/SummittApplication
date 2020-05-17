<!DOCTYPE html>
<html lang="en">

<link>

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
  
  <link type="text/css" rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sidebar/0.2.2/css/sidebar.css"></link>

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
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
</script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sidebar/0.2.2/js/sidebar.js"></script>

  <script>

$(document).ready(function(){
  $('#dataTable').DataTable({
    responsive: true,
    "deferRender": true,
    "processing": true,
    "serverSide": true,
    "ordering": true, //disable column ordering
    "lengthMenu": [
      [5, 10, 15, 20, 25, -1],
      [5, 10, 15, 20, 25, "All"] // change per page values here
    ],
    "pageLength": 25,
    "ajax": {
      url: '{!! route('jobAds.json') !!}',
      method: 'GET'
    },
    // dom: '<"html5buttons"B>lTfgitp',
    "dom": "<'row' <'col-md-12'>><'row'<'col-md-8 col-sm-12'lB><'col-md-4 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
    buttons: [
      { extend: 'copy',exportOptions: {columns: [0, 1, 2, 3,4,5,6]}},
      {extend: 'csv',exportOptions: {columns: [0, 1, 2, 3,4,5,6]}},
      {extend: 'excel', title: '{{ config('app.name', 'Summit') }} - List of all Users',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
      {extend: 'pdf', title: '{{ config('app.name', 'Summit') }} - List of all Users',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
      {extend: 'print',
      customize: function (win){
        $(win.document.body).addClass('white-bg');
        $(win.document.body).css('font-size', '10px');
        $(win.document.body).find('table')
        .addClass('compact')
        .css('font-size', 'inherit');
      }
    }
  ],
  columns: [
    {data: 'ID', name: 'ID', orderable: true, searchable: true},
    {data: 'JobTitle', name: 'JobTitle', orderable: true, searchable: true},
    {data: 'Category', name: 'Category', orderable: true, searchable: true},
    {data: 'client', name: 'client', orderable: true, searchable: false},
    {data: 'JobType', name: 'JobType', orderable: false, searchable: false},
    {data: 'LocationCountry', name: 'LocationCountry', orderable: true, searchable: false},
    {data: 'full_salary', name: 'full_salary', orderable: true, searchable: false},
    {data: 'Deadline', name: 'Deadline', orderable: true, searchable: false},
    {data: 'tools', name: 'tools', orderable: false, searchable: false,"defaultContent": "<i>Not set</i>"},
  ],
});
});
</script>


<script>
$(document).ready(function(){
  $('#myJobAds').DataTable({
    responsive: true,
    "deferRender": true,
    "processing": true,
    "serverSide": true,
    "ordering": true, //disable column ordering
    "lengthMenu": [
      [5, 10, 15, 20, 25, -1],
      [5, 10, 15, 20, 25, "All"] // change per page values here
    ],
    "pageLength": 25,
    "ajax": {
      url: '{!! route('dashboard.json') !!}',
      method: 'GET'
    },
  columns: [
    {data: 'ID', name: 'ID', orderable: true, searchable: true},
    {data: 'JobTitle', name: 'JobTitle', orderable: true, searchable: true},
    {data: 'Category', name: 'Category', orderable: true, searchable: true},
    {data: 'client', name: 'client', orderable: true, searchable: false},
    {data: 'JobType', name: 'JobType', orderable: false, searchable: false},
    {data: 'LocationCountry', name: 'LocationCountry', orderable: true, searchable: false},
    {data: 'full_salary', name: 'full_salary', orderable: true, searchable: false},
    {data: 'Deadline', name: 'Deadline', orderable: true, searchable: false},
    {data: 'tools', name: 'tools', orderable: false, searchable: false,"defaultContent": "<i>Not set</i>"},
  ],
});
});
</script>

{!! Toastr::render() !!}
</body>

</html>
