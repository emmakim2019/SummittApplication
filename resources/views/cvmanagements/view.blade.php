@extends('layouts.admin')

@section('title','Users')


@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
       <div class="row">
         <div class="col-md-4 mb-4">  
         <a href="{{ url()->previous() }}" class="btn btn-primary btn-backoverview" > < Back to overview</a>
         </div>

         <div class="col-md-4 mb-4"> 
         @if($details->status == 1)
          <p style="margin-top:5px"><span class="dot-active"></span>
         <span>Active Account</span></p>
         @else
         <p style="margin-top:5px"><span class="dot-inactive"></span>
         <span>Inactive Account</span></p>
         
         @endif 
        
         </div>
       </div>
      </div>
        <div class="col-md-12">

            <div class="row profile bg-darkblue" style="margin-bottom:0">

              <div class="col-md-3 profile-image">
                  <div class="row justify-content-center">
                  <img class="img-profile" src="@if(isset($details->CandidatePhoto)) {{ asset('uploads/'. $details->CandidatePhoto.'')}} @else {{asset('admin-assets/img/default.jpg')}} @endif">
                </div>
                </div>
      
                <div class="col-md-9">
                    <div class="container">
                    <div class="row profile-details bg-white">
                        <div class="col-md-6">
                            <h3 class="text-primary">{{$details->Firstname}} {{$details->Lastname}}</h3>
                            <p>mobile no | {{$cvdets->PhoneNumber}}</p>
                            @if($cvdets->PhoneNumberOther != null)
                            <p>other mobile no | {{$cvdets->PhoneNumberOther}}</p>
                            @endif
                            <p>{{$details->EmailAddress}}</p>
                            @if($cvdets->EmailAddressOther != null)
                            <p>{{$cvdets->EmailAddressOther}}</p>
                            @endif
                            <p>{{$cvdets->Nationality}} | @if($cvdets->Identification != null) {{$cvdets->ID_No}} @else {{$cvdets->Passport_No}} @endif</p>
                        </div>
                        <div class="col-md-6 border-left">
                            <span class="text-primary edit-contact" style="cursor: pointer;position: absolute;right: 0"><i class="fas fa-comment"></i></i></span>
                            <p>Driving License | {{$cvdets->DL}} </p>
                            <p>Car Owner | {{$cvdets->CarOwner}} </p>
                            <p>{{$cvdets->PhysicalAddress}} </p>
                            <p>P.O. Box | {{$cvdets->PO_BOX}}</p>
                            <p>D.O.B | {{$cvdets->DOB}} </p>
                        </div>
                    </div>
                    </div>
                </div>
     
            </div>

  @php $x = 0; @endphp
  @foreach($managements as $management)
  @if(!empty($management->section))
   @if($management->section === "personal")
    @php $x++; @endphp
    <div class="card comment-card" style="margin-bottom:2%">
      <div class="card-body comment-body">
        <p>
           <span class="details-span-first">{{'Comment'}} {{$x}}</span>
           | <span class="details-span">{{$management->StaffDetails->Firstname}} {{$management->StaffDetails->Lastname}}</span>
           | <span class="details-span">{{Carbon\Carbon::parse($management->updated_at)->format('M jS Y')}}</span>
                 
           <span class="details-span" style="float:right">
            @if($management->staffID == Auth::user()->SummitStaff->id)
            <a href="#" class="edit-contact" data-id="{{ $management->id }}" data-comment="{{ $management->comment }}"> Edit </a>
                 
            @else
              <a href="#" class="view-contact" data-view="{{ $management->comment }}"> View </a>
                       
             @endif
           </span>
        </p>
      </div>
    </div>
   @endif
   @endif
   @endforeach

            <div class="row profile">
                <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Personal Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Education</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Work</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-interview-tab" data-toggle="pill" href="#pills-interview" role="tab" aria-controls="pills-interview" aria-selected="false">Interview Notes</a>
                  </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @include('includes.administrator.profile.personaldetails')
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @include('includes.administrator.profile.education')
                  </div>
                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                      
                    @include('includes.administrator.profile.work')
                  </div>
                  <div class="tab-pane fade" id="pills-interview" role="tabpanel" aria-labelledby="pills-interview-tab">
                      
                    
                  </div>
                </div>
            </div>

        </div>
    </div>
</div>    

@include('includes.administrator.comment.editContact')
@include('includes.administrator.comment.viewContact')
@include('includes.administrator.comment.editSummary')
@include('includes.administrator.comment.viewSummary')
@include('includes.administrator.comment.editAttributes')
@include('includes.administrator.comment.viewAttributes')
@include('includes.administrator.comment.editSkills')
@include('includes.administrator.comment.viewSkills')
@include('includes.administrator.comment.editHardSkills')
@include('includes.administrator.comment.viewHardSkills')
@include('includes.administrator.comment.editLanguages')
@include('includes.administrator.comment.viewLanguages')
@include('includes.administrator.comment.editSocialMedia')
@include('includes.administrator.comment.viewSocialMedia')
@include('includes.administrator.comment.editEducation')
@include('includes.administrator.comment.viewEducation')
@include('includes.administrator.comment.editProfession')
@include('includes.administrator.comment.viewProffession')
@include('includes.administrator.comment.editWork')
@include('includes.administrator.comment.viewWork')
@include('includes.administrator.comment.editInterests')
@include('includes.administrator.comment.viewInterests')

@endsection


@section('js')

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
    '<div class="col-md-4"><input class="form-control" id="other_number" type="tel" placeholder="" name="phone1"/></div>' +
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
    '<div class="col-md-4"><input type="email" class="form-control" name="email1"></div>' +
    '<div class="col-md-4"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div></div>'); //add input box
    }
    });

    var l = '<?php echo $y; ?>';
    $(".add-language").click(function() {
    console.log("click");
    l ++;
    console.log(x);
    if(l > 3){
    $('.alert').addClass('show');
    }else{
      if($('#language'+ l).length){
        $('#language'+ l).show();
      }else{
        l++;
        $('#language'+ l).show();
      }
    }
    });

    $(".remLamguage").on("click",".remove_field", function(e){//user click on remove field
    e.preventDefault();
    l--;
    $(this).closest( ".form-group" ).remove(); 
    })

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

     var r = 3;
    $(".add-editreferee").click(function() {
        console.log("okat");
    r = r + 1;

    if(r > 6){
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

})

</script>





@endsection