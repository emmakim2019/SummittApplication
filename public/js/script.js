$(document).ready(function() {

    $(".add-education").click(function(e) {
   //
    $('#educationModal').modal('show');
  });

  $(".add-profession").click(function(e) {
    
    $('#professionModal').modal('show');
  });
    
      $('.passport').hide();

    $('select[name=qualification]').on('change', function() {
        var qual = $(this).val();
        $('select[name=bodies] option[value='+ qual +']').attr('selected','selected');
    });
    $('select[name=nationality]').on('change', function() {
        var nationality = $(this).val();
        console.log(nationality);
        if(nationality == 'Kenyan'){
          $('input[name=passport]').val('');
	      $('.passport').hide();
	      $('.id').show();
        }else{
        $('input[name=id]').val('');
      	$('.passport').show();
      	$('.id').hide();

        }
    });

    $('.edit-summary').click(function(e){
    	console.log("oaky");
        $('#editSummaryModal').modal('show');
    });
    $('.edit-attributes').click(function(e){
      id = $(this).attr('data-id');
        comment   = $(this).attr("data-comment");
         aa= $('#commentid');
         aa.val(id);
         $('#comment').val(comment);
         console.log(aa);
        $('#editAttributesModal').modal('show');
    });
    $('.edit-skills').click(function(e){
        $('#editSkillsModal').modal('show');
    });
    $('.edit-hardskills').click(function(e){
        $('#editHardSkillsModal').modal('show');
    });
    $('.edit-languages').click(function(e){
        $('#editLanguageModal').modal('show');
    });
    $('.edit-social').click(function(e){
        $('#editSocialModal').modal('show');
    });
    $('.edit-interests').click(function(e){
      console.log("haa");
        $('#editInterestsModal').modal('show');
    });

    var level = $('.edLevel').val();
    
    if(level == 'Primary_School' || level == 'Secondary_High_School'){
      $('.highLevel').hide();
    }else{
      $('.highLevel').show();
    }

    $('.edLevel').on('change', function() {

    if($(this).val() == 'Primary_School' || $(this).val() == 'Secondary_High_School'){
      $('.highLevel').hide();
    }else{
      $('.highLevel').show();
    }

    });

  $(".add-experience").click(function() {
 
    $('#workModal').modal('show');

  var input = document.querySelector('input[name="referee_phone1"]');
  var hidden = "full_phone";
  international(input, hidden);

  });

  if($('input[name=current]').prop("checked") == true){
  $('#checkcurrent').hide();
        console.log("edd");
  }else{
  $('#checkcurrent').show();
        console.log("cheksseke");
  }

    $('input[name=current]').on('change', function() {
        console.log("chekeke");
      if($(this).prop("checked") == true){
      $('#checkcurrent').hide();
      }else{
      $('#checkcurrent').show();
      }
    });


$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

if($('input[type="tel"]').length){
  
  var input = document.querySelector('input[type="tel"]');
  var hidden = "full_phone";
  international(input, hidden);
}

});


function international(input, hidden){

    intlTelInput(input, {
    initialCountry: "auto",
    hiddenInput: hidden,
    geoIpLookup: function(success, failure) {
        $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "";
            success(countryCode);
        });
    },
    utilsScript: "build/js/utils.js"
});
}

function edit() {
        $('#contactDetailsModal').modal('show');
    }  


  function editEdu(e){
    $('#educationModal'+ e).modal('show');
  }
  function editProf(e){
    $('#professionModal'+ e).modal('show');
  }

    function removeEdu(e) {
      var id = e; 
    $.ajax({
           type:'POST',
           url:'/delete/profile/feducation',
           data:{id: id},
           success:function(data) {
              location.reload();
           }
        });
    }
    function removeProf(e, x) {
      var qid = e; 
      var bid = x;
    $.ajax({
           type:'POST',
           url:'/delete/profile/proffesion',
           data:{qid: qid,bid: bid},
           success:function(data) {
              location.reload();
           }
        });
    }

      function editWork(e){
    $('#workModal'+ e).modal('show');
  var input = document.querySelector('input[name="referee_phone1"]');
  var hidden = "full_phone";
  international(input, hidden);

  }

    function removeWork(e) {
      var wid = e; 
    $.ajax({
           type:'POST',
           url:'/delete/profile/work',
           data:{wid: wid},
           success:function(data) {
              location.reload();
           }
        });
    }