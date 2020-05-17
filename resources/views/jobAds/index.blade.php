@extends('layouts.admin')

@section('title','Job Ads')


@section('content')


 <div class="row user-add-button">
  <a href="{{route('jobAds.create')}}" class="btn btn-primary btn-icon-split" style="margin-right: 15px;">
  <span class="icon"><i class="fas fa-plus"></i></span>
  <span class="text">New Job Ad</span> </a>
</div>


<div class="card mb-5">
  <div class="card-header tab-form-header">
    My Job Ads
  </div>
  <div class="card-body">
    <table class="table" id="dataTable" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Job Title</th>
          <th>Category</th>
           <th>Clients</th>
          <th>Job type</th>
          <th>Country</th>
          <th>Salary</th>
          <th>Deadline Date</th>
          <th>Tool</th>
        </tr>
      </thead>
    </table>
            </div>
          </div>


@endsection

@section('footer-js')

<script type="text/javascript" src="{{asset('admin-assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  
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
    {data: 'JobType', name: 'JobType', orderable: false, searchable: false},
    {data: 'LocationCity', name: 'LocationCity', orderable: true, searchable: false},
    {data: 'LocationCountry', name: 'LocationCountry', orderable: true, searchable: false},
    {data: 'full_salary', name: 'full_salary', orderable: true, searchable: false},
    {data: 'Deadline', name: 'Deadline', orderable: true, searchable: false},
    {data: 'tools', name: 'tools', orderable: false, searchable: false,"defaultContent": "<i>Not set</i>"},
  ],
});
});
</script>

@endsection
