@extends('layouts.admin')

@section('title','Industry')


@section('content')


    <div class="row user-add-button">
        <a href="{{route('industry.create')}}" class="btn btn-primary btn-icon-split" style="margin-right: 15px;">
            <span class="icon"><i class="fas fa-plus"></i></span>
            <span class="text">New Industry</span> </a>
    </div>


    <div class="card mb-5">
        <div class="card-header tab-form-header">
            My Industry
        </div>
        <div class="card-body">
            <table class="table" id="dataTablenew" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Parent</th>
                    <th>Detail</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($industries as $k => $industry)
                <tr>
                    <td>{{ $k+1 }}</td>
                    <td>{{ $industry->Name }}</td>
                    <td>{{ $industry->Parent }}</td>
                    <td>{{ $industry->Details }}</td>
                    <td>
                        <a href="{{route('industry.view', $industry->ID)}}">
                            <button class="fcbtn btn btn-primary btn-outline btn-1f">
                                View
                            </button>
                        </a>
                        <a href="{{route('industry.edit', $industry->ID)}}">
                            <button class="fcbtn btn btn-warning btn-outline btn-1f">
                                Edit
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('footer-js')

    <script type="text/javascript" src="{{asset('admin-assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('#dataTableaaaaa').DataTable({
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
                    url: '{!! route('industry.json') !!}',
                    method: 'GET'
                },
                // dom: '<"html5buttons"B>lTfgitp',
                "dom": "<'row' <'col-md-12'>><'row'<'col-md-8 col-sm-12'lB><'col-md-4 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                buttons: [
                    { extend: 'copy',exportOptions: {columns: [0, 1, 2, 3]}},
                    {extend: 'csv',exportOptions: {columns: [0, 1, 2, 3]}},
                    {extend: 'excel', title: '{{ config('app.name', 'Summit') }} - List of all Users',exportOptions: {columns: [0, 1, 2, 3]}},
                    {extend: 'pdf', title: '{{ config('app.name', 'Summit') }} - List of all Users',exportOptions: {columns: [0, 1, 2, 3]}},
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
                    {data: 'Name', name: 'JobTitle', orderable: true, searchable: true},
                    {data: 'Parent', name: 'Category', orderable: true, searchable: true},
                    {data: 'Detail', name: 'JobType', orderable: false, searchable: false}
                ],
            });
        });
    </script>

@endsection
