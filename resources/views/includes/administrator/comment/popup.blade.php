@php 
    $flashMessage = Session::get('redirectMessage');
@endphp    

<div class="modal" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content message-modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <h5 class="modal-title" id="notificationModalLabel">{{ $flashMessage['title'] }}</h5>
        <div class="nav-border"></div>
          {!! $flashMessage['content'] !!}
      </div>
      <div class="modal-footer justify-content-center">
          @if(isset($flashMessage['action']))
          <a href="{{ $flashMessage['link'] }}" class="btn btn-action">
              {{ $flashMessage['action'] }}
          </a>
          @endif
      </div>
    </div>
  </div>
</div>