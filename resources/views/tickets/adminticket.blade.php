@extends('layouts.admin')

@section('title','Tickets')


@section('content')

    <div class="row">

        <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header tab-form-header">
              Raised tickets
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <th>Ticket Type</th>
                  <th>Ticket Description</th>
                  <th>Response</th>
                  <th>Updated At</th>
                  <th>Status</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                <tr>
                 <td>{{$ticket->type}}</td>
                 <td>{{$ticket->description}}</td>
                 <td>@if($ticket->response == null) Not Responded @else {{$ticket->response}} @endif</td>
                 <td>{{$ticket->updated_at}}</td>
                 <<td>@if($ticket->status == 0) Open @else Closed @endif</td>
                 <td>
                  <span style="overflow: visible; position: relative; width: 110px;"  onclick="responde({{$ticket->id}})">
                    <i class="fas fa-edit"></i>
                </span>
                   

                 </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
      </div>
      </div>

@include('includes.administrator.tickets.edit-ticket')



@endsection

<script type="text/javascript">
function responde(id) {
        $('#editTicketModal'+ id).modal('show');
  }
</script>  