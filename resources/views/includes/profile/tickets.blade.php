          <div class="clearfix"><br/></div>
          <div class="row">
            @if(count($tickets) > 0)
              @foreach($tickets as $ticket)
            <div class="col-md-12">
              <div class="applied row no-gutters">
                <div class="col-md-2 border-right"><p class="text-secondary">{{$ticket->type}}</p></div>
                <div class="col-md-3 border-right"><span>{{$ticket->description}}</span></div>
                <div class="col-md-3 border-right"><span>@if($ticket->response == null) Not Responded @else {{$ticket->response}} @endif</span></div>
                <div class="col-md-2 border-right"><span>{{$ticket->updated_at}}</span></div>
                <div class="col-md-2 border-right"><span class="text-info">@if($ticket->status == 0) Open @else Closed @endif</span></div>
                </div>
            </div>
              @endforeach
              @else
              <div class="text-center col-12">
            <br /><br /><br />
            <p>
                Your list of raised tickets is currently empty.
            </p>
            <br /><br /><br />
            <br /><br /><br />
        </div>
              @endif
          </div>