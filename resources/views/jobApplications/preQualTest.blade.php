@extends('layouts.candidate')

@section('content')

@if(Session::has('redirectMessage'))
@section('js')
<script type="text/javascript">
$(document).ready(function() {
    //console.log("got it");
 $("#notificationModal").modal('show');
});
</script>
@endsection
@elseif(Session::has('redirectError'))
@section('js')
<script type="text/javascript">
$(document).ready(function() {
    //console.log("got it");
 $("#errorModal").modal('show');
});
</script>
@endsection
@endif

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('includes.components.sidebar')
        </div>
        <div class="col-md-9">
		  	<div class="job-application">
		  		<div class="row">
		  			<div class="col-md-12">
		  			<h2 class="text-secondary">{{$jobAd->JobTitle}}</h2>
		  			<p class="text-grey">Posted on {{$jobAd->created_at}} | Pre-Qualification Questions</p>
		  			</div>
		  		</div>
  				<form method="POST" action="{{ route('jobs.jobapply.sendtest') }}">
                @csrf
                <input type="hidden" name="jobid" value="{{$jobAd->ID}}">
		  		<div class="row">
		  			<div class="col-md-12">
		  			<div class="questions">

		  				@php $i = 0; @endphp
		  				@foreach($questions  as $key => $question)
		  				@php $i++; @endphp
		  				<p><b>Question {{$i}}</b> {{$question->Question}}</p>
		  				 @foreach($answers[$key] as $answer)
		  				 <label class="fancyradio">{{$answer->Answers}}
		  				 	<input type="radio" name="{{$answer->PreQualTestID}}" value="{{$answer->Answers}}">
			  				<span class="radiomark"></span>
		  				 </label>
		  				 @endforeach
		  				@endforeach
		  			</div>
		  			</div>
		  		</div>
		  		<br/><br/>
  				<div class="row">
		  			<div class="col-md-12">
			        <button type="button" class="btn btn-light" data-dismiss="modal">Back</button>
			        <button type="submit" class="btn btn-success">Submit</button>
			    	</div>
  				</div>
		  		</form>
		  	</div>
		  </div>
	</div>
</div>
@endsection