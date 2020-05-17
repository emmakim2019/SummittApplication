@extends('layouts.candidate')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <form id="regForm" method="POST" action="{{route('add.contact.details')}}">
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
			  <div class="progress-bar" role="progressbar" aria-valuenow="15"
			  aria-valuemin="0" aria-valuemax="100" style="width:15%">
			    15%
			  </div>
		  </div>
		  <!-- One "tab" for each step in the form: -->
		  <div class="tab">
		  	@include('includes.components.personaldetails')
		  </div>
  		 <div class="row justify-content-center">
		      <button type="submit" class="btn btn-secondary disabled" disabled="disabled">Back</button>&nbsp;&nbsp;
		      <button type="submit" class="btn btn-success">Submit and continue</button>
		  </div>

		</form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/script.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {

    var max_fields = 2; //maximum input boxes allowed
    var wrapper = $("#mobile"); //Fields wrapper
    var add_button = $(".add-mobile"); //Add button ID
    var wrapper1 = $("#email"); //Fields wrapper
    var add_button1 = $(".add-email"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
    x++; //text box increment
    $(wrapper).append('<div class="form-group row"><label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Other number</label>' +
    '<div class="col-md-4"><input class="form-control" id="other_number" type="tel" placeholder="" name="phone1" required/></div>' +
    '<div class="col-md-4"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div></div>'); //add input box
    

     setTimeout(function(){ 
    var input = document.querySelector('input[name="phone1"]');
    var hidden = "full_phone1";
    international(input, hidden);
      }, 600);
    }
    });

    var y = 1;
    $(add_button1).click(function(e){ //on add input button click
    e.preventDefault();
    if(y < max_fields){ //max input box allowed
    y++; //text box increment
    $(wrapper1).append('<div class="form-group row"><label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Other email</label>' +
    '<div class="col-md-4"><input type="email" class="form-control" name="email1" required></div>' +
    '<div class="col-md-4"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div></div>'); //add input box

    }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove field
    e.preventDefault();
     $('input[name=phone1]').val(''); 
    $(wrapper).find('.row').remove(); 
    x--;
    })

    $(wrapper1).on("click",".remove_field", function(e){ //user click on remove field
    e.preventDefault();
     $('input[name=email1]').val(''); 
    $(wrapper1).find('.row').remove(); 
    y--;
    })

});



</script>
@endsection