@extends('layouts.candidate')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <form id="regForm" method="POST" action="{{route('add.profile.interest')}}">
        	 @csrf
        			  <!-- Circles which indicates the steps of the form: -->
		  <div class="steps">
            <ul id="progressbar">
                <li class="step finish"><span>Personal Details</span></li>
                <li class="step finish"><span>Education</span></li>
                <li class="step active"><span>Work</span></li>
            </ul>
		  </div>
		  <div class="progress">
			  <div class="progress-bar" role="progressbar" aria-valuenow="75"
			  aria-valuemin="0" aria-valuemax="100" style="width:75%">
			    75%
			  </div>
		  </div>
		  <!-- One "tab" for each step in the form: -->
		  <div class="tab">
		  	@if(session()->has('register_error'))
			    <div class="form-group row">
			        <div class="col-md-12">
			            <div class="form-check">
			            <div class="alert alert-success alert-dismissible fade show" role="alert">
			                {{ session()->get('register_error') }}
			              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>
			            </div>
			        </div>
			    </div>
			@endif
		  	@include('includes.components.work')
		  </div>
  		 <div class="row justify-content-center">
		      <a href="{{ route('profile.create.education')}}" class="btn btn-secondary">Back</a>&nbsp;&nbsp;
		      <button type="submit" class="btn btn-success">Finish</button>
		  </div>
		</form>

        </div>
    </div>
</div>

@if(!empty($work))
@include('includes.modals.editWork')
@endif
@include('includes.modals.work')
@endsection

@section('js')
<script src="{{asset('js/script.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {

     var z = 1;
    $(".add-referee").click(function() {
    z = z + 1;

    if(z > 3){
        $('.ref-alert').addClass('show');
    }else{
        $(this).find('#referee'+ z).css( "background-color", "green" );
    $('#referee'+ z).append($('<div class="form-group row border-line"><label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Other Referee Details</label><div class="col-md-4"><input type="text" class="form-control" placeholder="Name" name="referee_name'+ z +'" required></div><div class="col-md-4"><input type="text" class="form-control" placeholder="Designation" name="referee_desg'+ z +'"></div></div>'));
 

    $('#referee'+ z).append($('<div class="form-group row"><label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Other Referee Contact</label><div class="col-md-4"><input type="email" class="form-control" name="referee_email'+ z +'" placeholder="Email Address"></div><div class="col-md-4"><input type="tel" class="form-control" name="referee_phone'+ z +'" placeholder="Mobile Number"></div></div><span class="text-primary remove_referee" style="cursor: pointer;"><i class="fas fa-trash"></i> Delete</span>'));

      var input = document.querySelector('input[name="referee_phone'+ z +'"]');
      var hidden = "full_phone";
      international(input, hidden);
    }

    });

     var r = 1;
    $(".add-editreferee").click(function() {
    r = r + 1;

    if(r > 3){
        $('.ref-alert').addClass('show');
    }else{
        $(this).find('#referee'+ z).css( "background-color", "green" );
    $('#referee'+ r).append($('<div class="form-group row border-line"><label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Other Referee Details</label><div class="col-md-4"><input type="text" class="form-control" placeholder="Name" name="referee_name'+ r +'" required></div><div class="col-md-4"><input type="text" class="form-control" placeholder="Designation" name="referee_desg'+ r +'"></div></div>'));
 

    $('#referee'+ r).append($('<div class="form-group row"><label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Other Referee Contact</label><div class="col-md-4"><input type="email" class="form-control" name="referee_email'+ r +'" placeholder="Email Address"></div><div class="col-md-4"><input type="tel" class="form-control" name="referee_phone'+ r +'" placeholder="Mobile Number"></div></div><span class="text-primary remove_referee" style="cursor: pointer;"><i class="fas fa-trash"></i> Delete</span>'));

      var input = document.querySelector('input[name="referee_phone'+ r +'"]');
      var hidden = "full_phone";
      international(input, hidden);
    }
    
    });

    wrapp2 = $("#referee2");
    wrapp3 = $("#refere3");

    wrapp4 = $("#referee4");
    wrapp5 = $("#referee5");

    $(wrapp2).on("click",".remove_referee", function(e){ //user click on remove field
    e.preventDefault(); 
     $('input[name=referee_name2]').val(''); 
     $('input[name=referee_desg2]').val(''); 
     $('input[name=referee_email2]').val(''); 
     $('input[name=referee_phone2]').val(''); 
    $(wrapp2).find('.row').remove(); 
    $(this).remove();
        s--;
    })
    $(wrapp3).on("click",".remove_referee", function(e){ //user click on remove field
    e.preventDefault();
     $('input[name=referee_name3]').val(''); 
     $('input[name=referee_desg3]').val(''); 
     $('input[name=referee_email3]').val(''); 
     $('input[name=referee_phone3]').val('');
    $(wrapp3).find('.row').remove(); 
    $(this).remove();
        s--;
    })
    $(wrapp4).on("click",".remove_referee", function(e){ //user click on remove field
    e.preventDefault(); 
     $('input[name=referee_name2]').val(''); 
     $('input[name=referee_desg2]').val(''); 
     $('input[name=referee_email2]').val(''); 
     $('input[name=referee_phone2]').val(''); 
    $(wrapp4).find('.row').remove(); 
    $(this).remove();
        s--;
    })
    $(wrapp5).on("click",".remove_referee", function(e){ //user click on remove field
    e.preventDefault();
     $('input[name=referee_name3]').val(''); 
     $('input[name=referee_desg3]').val(''); 
     $('input[name=referee_email3]').val(''); 
     $('input[name=referee_phone3]').val('');
    $(wrapp5).find('.row').remove(); 
    $(this).remove();
        s--;
    })



	var s = 1;
	$(".add-interest").click(function() {
	s = s + 1;
	if(s > 6){
		$('.interest-alert').addClass('show');
	}else{

    $('#interests'+ s).append($('<div class="form-group row"><label for="colFormLabel" class="col-md-5 text-center text-white col-form-label label label-primary">Other Interest</label><div class="col-md-5"><input class="form-control" type="text" name="Interest'+ s +'"/></div><div class="col-md-2"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div></div>'));

	}
	});
	wrapper2 = $("#interests2");
	wrapper3 = $("#interests3");
	wrapper4 = $("#interests4");

    $(wrapper2).on("click",".remove_field", function(e){ //user click on remove field
    e.preventDefault();
     $('input[name=interest2]').val(''); 
    $(wrapper2).find('.row').remove(); 
    	s--;
    })
	$(wrapper3).on("click",".remove_field", function(e){ //user click on remove field
    e.preventDefault();
     $('input[name=interest3]').val(''); 
    $(wrapper3).find('.row').remove(); 
    	s--;
    })
	$(wrapper4).on("click",".remove_field", function(e){ //user click on remove field
    e.preventDefault();
     $('input[name=interest4]').val(''); 
    $(wrapper4).find('.row').remove(); 
    	s--;
    })

});


</script>

@endsection