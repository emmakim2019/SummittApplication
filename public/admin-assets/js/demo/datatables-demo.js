// Call the dataTables jQuery plugin
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
