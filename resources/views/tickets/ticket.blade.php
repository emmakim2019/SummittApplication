@extends('layouts.candidate')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
        	<div class="aside">
			<div id="sidemenu" class="sidemenu">
			<div class="card">
			  <ul class="list-group list-group-flush">
			    <li class="list-group-item"><a href="#" class="text-white"><i class="fas fa-bars"></i> Close Menu</a></li>
			      <?php foreach (config('app-constants.profile') as $el) : ?>
			      @if (\Route::current()->getName() == $el['route'] || (strpos(\Request::url(), $el['route']) !== false))
			    <li class="list-group-item active"><a href="{{route($el['route'])}}" class="text-white">{{$el['title']}}</a></li>
			                              @else
			    <li class="list-group-item"><a href="{{route($el['route'])}}" class="text-white">{{$el['title']}}</a></li>
			                              @endif
			                              
			                          <?php endforeach; ?>
			  </ul>
			</div>


			</div>
			</div>
        </div>
        <div class="col-md-9"> 
        	<div class="row tickets">
                <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-form-tab" data-toggle="pill" href="#pills-form" role="tab" aria-controls="pills-form" aria-selected="true">Raise a Ticket</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-list-tab" data-toggle="pill" href="#pills-list" role="tab" aria-controls="pills-list" aria-selected="false">Tickets Raised</a></li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-form" role="tabpanel" aria-labelledby="pills-form-tab">
                   <div class="row"><div class="col-md-8">@include('includes.forms.tickets')</div></div>
                  </div>
                  <div class="tab-pane fade" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab">
                    @include('includes.profile.tickets')
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection