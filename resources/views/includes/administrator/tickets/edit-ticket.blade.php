
@foreach($tickets as $ticket)
<div class="modal" id="editTicketModal{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="editTicketModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h2 class="modal-title text-primary text-center">Ticket Response</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="{{route('response.ticket')}}">
           @csrf
           <input type="hidden" value="{{$ticket->id}}" name="ticket_id">
      <div class="modal-body">
    <div class="row">
    <div class="col-md-12">
      <div class="container">

        <div class="form-group row mb3">
        <div class="col-md-12">

            <textarea name="response" class="form-control  @error('response') is-invalid @enderror" row="100" style="border-radius: 0;height: 100px" id="response" required>
              {{$ticket->response}}
            </textarea>
        </div>
        </div>

        <div class="form-group row">
        <label for="name" class="col-md-4 text-center text-white col-form-label label ">Status</label>
        <div class="col-md-8">
          <select class="form-control" style="    width: auto;" name="status">
            @if($ticket->status == 0)
            <option value="0" selected>Open</option>
            @else
            <option value="0">Open</option>
            @endif
            @if($ticket->status == 1)
            <option value="1" selected>Closed</option>
            @else
            <option value="1">Closed</option>
            @endif
        </select>
        </div>
        </div>


        </div>
        </div>  

      </div>
    </div> 
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
      </form>     
    </div>
  </div>
</div>
@endforeach
