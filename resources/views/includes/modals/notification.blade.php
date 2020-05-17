@php 
    $flashMessage = Session::get('redirectMessage');
@endphp    

<div class="modal" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content message-modal">
      <div class="modal-header">
        <h2 class="modal-title" id="notificationModalLabel">{{ $flashMessage['title'] }}</h2>
        <br/>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center text-primary">
          {!! $flashMessage['content'] !!}
      </div>
          @if(isset($flashMessage['action']))
      <div class="modal-footer justify-content-center">
          <a href="{{ $flashMessage['link'] }}" class="btn btn-action">
              {{ $flashMessage['action'] }}
          </a>
      </div>
          @endif
    </div>
  </div>
</div>