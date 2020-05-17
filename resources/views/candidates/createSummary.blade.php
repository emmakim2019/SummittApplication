@extends('layouts.candidate')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <form id="regForm" method="POST" action="{{route('add.profile.summary')}}">
        	 @csrf
        			  <!-- Circles which indicates the steps of the form: -->
		  <div class="steps">
            <ul id="progressbar">
                <li class="step active"><span>Personal Details</span></li>
                <li class="step"><span>Education</span></li>
                <li class="step"><span>Work</span></li>
            </ul>
		  </div>
		  <div class="progress">
			  <div class="progress-bar" role="progressbar" aria-valuenow="25"
			  aria-valuemin="0" aria-valuemax="100" style="width:25%">
			    25%
			  </div>
		  </div>
		  <!-- One "tab" for each step in the form: -->
		  <div class="tab">
		  	@include('includes.components.personalsummary')
		  </div>
  		 <div class="row justify-content-center">
		      <a href="{{ route('profile.create')}}" class="btn btn-secondary">Back</a>&nbsp;&nbsp;
		      <button type="submit" class="btn btn-success">Submit and continue</button>
		  </div>

		</form>
        </div>
    </div>
</div>
@include('includes.modals.editSummary')

@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function() {

    $('.edit-summary').click(function(e){
    	console.log("oaky");
        $('#editSummaryModal').modal('show');
    });
    
    var x = '<?php echo $y; ?>';

		console.log(x);
	$(".add-language").click(function() {
		console.log("click");
		x ++;
		console.log(x);
		if(x > 3){
		$('.alert').addClass('show');
		}else{
			if($('#language'+ x).length){
				$('#language'+ x).show();
			}else{
				x++;
				$('#language'+ x).show();
			}
		}
    });

    $(".remove_field").click(function(e) { //user click on remove field
    e.preventDefault();
    x--;
    $(this).closest( ".form-group" ).remove(); 
    })

});
</script>

@endsection