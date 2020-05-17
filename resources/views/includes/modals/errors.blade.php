@php 
    $flashMessage = Session::get('redirectError');
@endphp    

<div class="modal" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content error-modal">
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