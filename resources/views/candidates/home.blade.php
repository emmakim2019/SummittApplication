@extends('layouts.candidate')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('includes.components.sidebar')
        </div>
        <div class="col-md-9">
            @if(auth()->user()->unreadNotifications->count() > 0)
            <div class="row notification-bg bg-white">
              <div class="col-md-12">
                <div class="notification">
                  <div class="notification-header"><span>Notifications</span></div>
                      <div class="notification-content">
                        <div class="row">
                      @foreach(auth()->user()->unreadNotifications as $notification)
                           <div class="col-md-3 border-right"> 
                            <h4 class="text-primary">{{ $notification->data['title'] }}</h4>
                            <p>{{ $notification->data['data'] }}</p>
                            @if($notification->type == 'App\Notifications\Tickets')
                            <a href="{{route('tickets')}}" class="text-info">View</a>
                            @endif 
                          </div>
                      @endforeach
                        </div>
                      </div>
                  <div class="notification-footer"><span><a href="{{route('markAsRead')}}">Close <i class="fas fa-times"></i></a></span></div>
                </div>
              </div>
            </div>
            @endif

            <div class="row profile bg-darkblue">
                <div class="col-md-3 profile-image">
                  <my-upload current="{{ $details->CandidatePhoto ?: 'your-picture.png' }}" action="{{ route('profile.ppic.change') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  </my-upload>
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
                            <span class="text-primary edit-contact" onclick="edit();" style="cursor: pointer;position: absolute;right: 0"><i class="fas fa-edit"></i></span>
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
                </ul>

                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @include('includes.profile.personaldetails')
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @include('includes.profile.education')
                  </div>
                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                      
                    @include('includes.profile.work')
                  </div>
                </div>
            </div>

        </div>
    </div>
</div>    

@include('includes.modals.editContact')
@include('includes.modals.editSummary')
@include('includes.modals.editAttributes')
@include('includes.modals.editSkills')
@include('includes.modals.editHardSkills')
@include('includes.modals.editLanguages')
@include('includes.modals.editSocialMedia')
@include('includes.modals.editEducation')
@include('includes.modals.editProfession')
@include('includes.modals.education')
@include('includes.modals.profession')
@include('includes.modals.editWork')
@include('includes.modals.work')
@include('includes.modals.editInterests')

@endsection


@section('js')
<script src="{{asset('js/script.js')}}"></script>
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
    $('.notification-footer').on("click","span", function(e){ 

    $('.notification').remove(); 
    })

})

</script>
@endsection    