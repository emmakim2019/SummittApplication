 $( document ).ready(function() {
if( typeof phpDutyId !== 'undefined' ) { 
	var dutyId =phpDutyId;
}
else{
var dutyId =2;
}
if( typeof phpReqId !== 'undefined' ) { 
	var reqId =phpReqId;
}
else{
var reqId =2;
}
 $('#addduty').click( function(j) { 
 	
 	$("#duties").append(
 		
			        '<div class="form-group ">'+
			        '<label for="JobFields_duties_'+dutyId+'" class="required">Duty '+dutyId+' <span class="required">*</span></label>'+
			       	'<input size="60" maxlength="100" name="JobFields[duties]['+dutyId+']" id="JobFields_duties_'+dutyId+'" type="text" value="" class="form-control">'+
			        '</div>'
 	);
 	dutyId++;
 	});
 $('#addrequirements').click( function(j) { 
 	
 	$("#requirements").append(
 		
			        '<div class="form-group ">'+
			        '<label for="JobFields_requirements_'+reqId+'" class="required">Requirement '+reqId+' <span class="required">*</span></label>'+
			       	'<input size="60" maxlength="100" name="JobFields[requirements]['+reqId+']" id="JobFields_requirements_'+reqId+'" type="text" value="" class="form-control">'+
			        '</div>'
 	);
 	reqId++;
 	}); 	
});


 $(document).ready(function() {

      $(".add-education").click(function(e) {
   //
    $('#educationModal').modal('show');
  });

  $(".add-profession").click(function(e) {
    
    $('#professionModal').modal('show');
  });

    var radio = $('input[type=radio]:checked').val();
    
    if(radio == 'ID'){
        $('input[name=passport]').val('');
      $('.passport').hide();
    }
    $('input[type=radio]').on('change', function() {
      
      if($(this).val() == 'Passport'){
        $('input[name=id]').val('');
      $('.passport').show();
      $('.id').hide();
      }else{
        $('input[name=passport]').val('');
      $('.passport').hide();
      $('.id').show();
      }
    });

    $('select[name=qualification]').on('change', function() {
        var qual = $(this).val();
        $('select[name=bodies] option[value='+ qual +']').attr('selected','selected');
    });

    $('.edit-contact').on('click',function(e){
        id = $(this).attr('data-id');
        comment   = $(this).attr("data-comment");
         $('#commentid').val(id);
         $('#comment').val(comment);
        
        $('#contactDetailsModal').modal('show');
    });

    $('.view-contact').on('click',function(e){
         comment   = $(this).attr("data-view");
         $('#commentview').val(comment);
        $('#viewDetailsModal').modal('show');
    });

    $('.edit-summary').on('click',function(e){
        id = $(this).attr('data-id');
        comment   = $(this).attr("data-comment");
         $('#summaryid').val(id);
         $('#summarycomment').val(comment);
        
        $('#editSummaryModal').modal('show');
    });

    $('.view-summary').on('click',function(e){
         comment   = $(this).attr("data-view");
         $('#summaryview').val(comment);
        $('#viewSummaryModal').modal('show');
    });
    
    $('.edit-attributes').click(function(e){
    	id = $(this).attr('data-id');
        comment   = $(this).attr("data-comment");
         $('#attributeid').val(id);
         $('#attributecomment').val(comment);
        $('#editAttributesModal').modal('show');
    });
    $('.view-attributes').on('click',function(e){
         comment   = $(this).attr("data-view");
         $('#attributeview').val(comment);
        $('#viewAttributesModal').modal('show');
    });
    $('.edit-skills').click(function(e){
    	id = $(this).attr('data-id');
        comment   = $(this).attr("data-comment");
        
        $('#skillsid').val(id);
         $('#skillscomment').val(comment);
         $('#editSkillsModal').modal('show');
    });

    $('.view-skills').on('click',function(e){
         comment   = $(this).attr("data-view");
         $('#skillsview').val(comment);
        $('#viewSkillsModal').modal('show');
    });

    $('.edit-hardskills').on('click',function(e){
    	 id = $(this).attr('data-id');
        comment   = $(this).attr("data-comment");
         $('#hardskillsid').val(id);
         $('#hardskillscomment').val(comment);
        $('#editHardSkillsModal').modal('show');
    });
    $('.view-hardskills').on('click',function(e){
         comment   = $(this).attr("data-view");
         $('#hardskillsview').val(comment);
        $('#viewHardSkillsModal').modal('show');
    });
    $('.edit-languages').click(function(e){
    	id = $(this).attr('data-id');
        comment   = $(this).attr("data-comment");
         $('#languangesid').val(id);
         $('#languagescomment').val(comment);
        $('#editLanguageModal').modal('show');
    });
    $('.view-languages').on('click',function(e){
         comment   = $(this).attr("data-view");
         $('#languagesview').val(comment);
        $('#viewLanguageModal').modal('show');
    });
    $('.edit-social').click(function(e){
    	id = $(this).attr('data-id');
        comment   = $(this).attr("data-comment");
         $('#socialmediaid').val(id);
         $('#socialmeidacomment').val(comment);
        $('#editSocialModal').modal('show');
    });
    $('.view-social').on('click',function(e){
         comment   = $(this).attr("data-view");
         $('#socialmeidaview').val(comment);
        $('#viewSocialModal').modal('show');
    });
    $('.edit-interests').click(function(e){
      id = $(this).attr('data-id');
        comment   = $(this).attr("data-comment");
         $('#interestsid').val(id);
         $('#interestscomment').val(comment);
        $('#editInterestsModal').modal('show');
    });

    $('.view-interests').on('click',function(e){
         comment   = $(this).attr("data-view");
         $('#interestsview').val(comment);
        $('#viewInterestsModal').modal('show');
    });

    $('.edit-education').click(function(e){
      id = $(this).attr('data-id');
        comment   = $(this).attr("data-comment");
         $('#educationid').val(id);
         $('#educationcomment').val(comment);
       $('#educationModal').modal('show');
    });

    $('.view-education').on('click',function(e){
         comment   = $(this).attr("data-view");
         $('#educationview').val(comment);
        $('#vieweducationModal').modal('show');
    });
    $('.edit-proffesional').click(function(e){
    	console.log('Okay')
      id = $(this).attr('data-id');
        comment   = $(this).attr("data-comment");
         $('#professionid').val(id);
         $('#professioncomment').val(comment);
       $('#professionModal').modal('show');
    });

    $('.view-proffessional').on('click',function(e){
         comment   = $(this).attr("data-view");
         $('#professionview').val(comment);
        $('#viewprofessionModal').modal('show');
    });

    $('.edit-workexperience').click(function(e){
      id = $(this).attr('data-id');
        comment   = $(this).attr("data-comment");
         $('#workid').val(id);
         $('#workcomment').val(comment);
       $('#workModal').modal('show');
    });

    $('.view-workexperience').on('click',function(e){
         comment   = $(this).attr("data-view");
         $('#workview').val(comment);
        $('#viewworkModal').modal('show');
    });



$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });



});




// function edit() {
//         $('#contactDetailsModal').modal('show');
//     }  


//   function editEdu(e){
//     $('#educationModal'+ e).modal('show');
//   }
//   function editProf(e){
//     $('#professionModal'+ e).modal('show');
//   }

    
    
     
    