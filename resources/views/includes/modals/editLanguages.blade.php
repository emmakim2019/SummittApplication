
<div class="modal" id="editLanguageModal" tabindex="-1" role="dialog" aria-labelledby="editLanguageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        	<h4 class="modal-title text-primary text-center">Edit your hard skills</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="{{route('edit.profile.summary')}}">
        	 @csrf
      <div class="modal-body">
<div class="row">
	<div class="col-md-12">
		<div class="container">

		 <div class="form-group row">
		    <label for="multiselect4" class="col-md-4 text-center text-white col-form-label label label-primary">Choose a language</label>
			<div class="col-md-6">	
	  		<select class="selectpicker selectdropdown mb-3" data-width="100%" data-live-search="true" data-size="10" name="language1" autocomplete="off" required>
	  		@foreach($languages as $language1) 
	  		@if(!empty($lang->Language1) && $language1->LanguageName == $lang->Language1)
				<option value="{{$language1->LanguageName}}" selected>{{$language1->LanguageName}}</option>	
			@else	
				<option value="{{$language1->LanguageName}}">{{$language1->LanguageName}}</option>
			@endif		
	  		@endforeach			  			
	  		</select>
		  	</div>
		  </div>
	  		@php
	  		 $fluencies = array(
	  		 	array('id' => 'Native', 'name' => 'Native'),
	  		 	array('id' => 'Fluent', 'name' => 'Fluent'),
	  		 	array('id' => 'Speaking Only', 'name' => 'Speaking Only'),
	  		 	array('id' => 'Writing Only', 'name' => 'Writing Only'),
	  		 	array('id' => 'Learning Only', 'name' => 'Learning Only'),
	  		 );
	  		@endphp

		 <div class="form-group row">
		    <label for="multiselect4" class="col-md-4 text-center text-white col-form-label label label-primary">Choose fluency</label>
	  		<div class="col-md-6"> 
	  		@foreach($fluencies as $fluency1) 
	  		@if(!empty($lang->Fluency1) && $fluency1['id'] == $lang->Fluency1)
			<label class="fancyradio radio-inline">{{$fluency1['name']}}<input type="radio" name="fluency1" value="{{$fluency1['id']}}" checked><span class="radiomark"></span>
			</label>
			@else
			<label class="fancyradio radio-inline">{{$fluency1['name']}}<input type="radio" name="fluency1" value="{{$fluency1['id']}}"><span class="radiomark"></span>
			</label>     	
			@endif   	
	  		@endforeach
	  		</div>
	  	</div>	

  		@if(!empty($lang) && $lang->Language2 != null)
		<div class="form-group row">
			<label for="multiselect4" class="col-md-4 text-center text-white col-form-label label label-primary">Choose another language</label>
			<div class="col-md-6">	
			<select class="selectpicker selectdropdown mb-3 language2" data-width="100%" data-live-search="true" data-size="10" name="language2">
	  		@foreach($languages as $language2) 
	  		@if(!empty($lang->Language2) && $language2->LanguageName == $lang->Language2)
				<option value="{{$language2->LanguageName}}" selected>{{$language2->LanguageName}}</option>	
			@else	
				<option value="{{$language2->LanguageName}}">{{$language2->LanguageName}}</option>
			@endif		
	  		@endforeach	
	  		</select>
	  		</div>
			<div class="col-md-2"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
	  	</div>
		<div class="form-group row">
		    <label for="multiselect4" class="col-md-4 text-center text-white col-form-label label label-primary">Choose fluency</label>
	  		<div class="col-md-6"> 
	  		@foreach($fluencies as $fluency2) 
	  		@if(!empty($lang->Fluency2) && $fluency2['id'] == $lang->Fluency2)
			<label class="fancyradio radio-inline">{{$fluency2['name']}}<input type="radio" name="fluency2" value="{{$fluency2['id']}}" checked><span class="radiomark"></span>
			</label>
			@else
			<label class="fancyradio radio-inline">{{$fluency2['name']}}<input type="radio" name="fluency2" value="{{$fluency2['id']}}"><span class="radiomark"></span>
			</label>     	
			@endif  	
	  		@endforeach
	  		</div>	
		</div>
		@endif

  		@if(!empty($lang) && $lang->Language3 != null)
		<div class="form-group row">
			<label for="multiselect4" class="col-md-4 text-center text-white col-form-label label label-primary">Choose another language</label>
			<div class="col-md-6">	 
			<select class="selectpicker selectdropdown mb-3 language3" data-width="100%" data-live-search="true" data-size="10" name="language3">
	  		@foreach($languages as $language3) 
	  		@if(!empty($lang->Language3) && $language3->LanguageName == $lang->Language3)
				<option value="{{$language3->LanguageName}}" selected>{{$language3->LanguageName}}</option>	
			@else	
				<option value="{{$language3->LanguageName}}">{{$language3->LanguageName}}</option>
			@endif		
	  		@endforeach	
  			</select>
	  		</div>
	  		<div class="col-md-2"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
	  	</div>

		<div class="form-group row">
	    	<label for="multiselect4" class="col-md-4 text-center text-white col-form-label label label-primary">Choose fluency</label>
			<div class="col-md-6">	 
	  		@foreach($fluencies as $fluency3) 
	  		@if(!empty($lang->Fluency3) && $fluency3['id'] == $lang->Fluency3)
				<label class="fancyradio radio-inline">{{$fluency3['name']}}<input type="radio" name="fluency3" value="{{$fluency3['id']}}" checked><span class="radiomark"></span>
				</label>
			@else
				<label class="fancyradio radio-inline">{{$fluency3['name']}}<input type="radio" name="fluency3" value="{{$fluency3['id']}}"><span class="radiomark"></span>
				</label>     	
			@endif  	
	  		@endforeach	
	  		</div>
		</div>
		@endif

  		@if(!empty($lang) && $lang->Language4 != null)
		<div class="form-group">
			<label for="multiselect4" style="margin-top:2rem;">Choose another language</label>
			<div class="row">
			<div class="col-md-10">	 
			<select class="selectpicker selectdropdown mb-3 language4" data-width="100%" data-live-search="true" data-size="10" name="language4">
	  		@foreach($languages as $language4) 
	  		@if(!empty($lang->Language4) && $language4->LanguageName == $lang->Language4)
				<option value="{{$language4->LanguageName}}" selected>{{$language4->LanguageName}}</option>	
			@else	
				<option value="{{$language4->LanguageName}}">{{$language4->LanguageName}}</option>
			@endif		
	  		@endforeach	
  			</select>
	  		</div>
	  		<div class="col-md-1"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
	  		</div>

	    	<label for="multiselect4">Choose fluency</label>
	  		@foreach($fluencies as $fluency4) 
	  		@if(!empty($lang->Fluency4) && $fluency4['id'] == $lang->Fluency4)
			<label class="fancyradio radio-inline">{{$fluency4['name']}}<input type="radio" name="fluency4" value="{{$fluency4['id']}}" checked><span class="radiomark"></span>
			</label>
			@else
			<label class="fancyradio radio-inline">{{$fluency4['name']}}<input type="radio" name="fluency4" value="{{$fluency4['id']}}"><span class="radiomark"></span>
			</label>     	
			@endif  	
	  		@endforeach	
		</div>
		@endif


  		@if(!empty($lang) && $lang->Language2 == null)
		<div class="form-group" id="language2" style="display: none;">
			<label for="multiselect4" style="margin-top:2rem;">Choose another language</label>
			<div class="row">
			<div class="col-md-10">	 
			<select class="selectpicker selectdropdown mb-3 language2" data-width="100%" data-live-search="true" data-size="10" name="language2">
			<option></option>
  		@foreach($languages as $language2) 
			<option value="{{$language2->LanguageName}}">{{$language2->LanguageName}}</option>	
  		@endforeach	
  			</select>
  			</div>
	  		<div class="col-md-1"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
	  		</div>
	    <label for="multiselect4">Choose fluency</label>
  		@foreach($fluencies as $fluency2) 
		<label class="fancyradio radio-inline">{{$fluency2['name']}}<input type="radio" name="fluency2" value="{{$fluency2['id']}}"><span class="radiomark"></span>
		</label>    	
  		@endforeach	
		</div>
		@endif


  		@if(!empty($lang) && $lang->Language3 == null)
		<div class="form-group" id="language3" style="display: none;">
			<label for="multiselect4" style="margin-top:2rem;">Choose another language from the dropdown</label> 
			<div class="row">
			<div class="col-md-10">	 
			<select class="selectpicker selectdropdown mb-3 language3" data-width="100%" data-live-search="true" data-size="10" name="language3">
			<option></option>
  		@foreach($languages as $language3) 
			<option value="{{$language3->LanguageName}}">{{$language3->LanguageName}}</option>	
  		@endforeach	
  			</select>
  			</div>
	  		<div class="col-md-1"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
	  		</div>

	    	<label for="multiselect4">Choose fluency</label>
  		@foreach($fluencies as $fluency3) 
			<label class="fancyradio radio-inline">{{$fluency3['name']}}<input type="radio" name="fluency3" value="{{$fluency3['id']}}"><span class="radiomark"></span>
			</label>    	
  		@endforeach	
		</div>
		@endif

  		@if(!empty($lang) && $lang->Language4 == null)
		<div class="form-group" id="language4" style="display: none;">
			<label for="multiselect4" style="margin-top:2rem;">Choose another language from the dropdown</label> 
			<div class="row">
			<div class="col-md-10">	 
			<select class="selectpicker selectdropdown mb-3 language4" data-width="100%" data-live-search="true" data-size="10" name="language4">
			<option></option>
	  		@foreach($languages as $language4) 
				<option value="{{$language4->LanguageName}}">{{$language4->LanguageName}}</option>	
	  		@endforeach	
	  		</select>
	  		</div>
	  		<div class="col-md-1"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
	  		</div>

		    <label for="multiselect4">Choose fluency</label>
	  		@foreach($fluencies as $fluency4) 
			<label class="fancyradio radio-inline">{{$fluency4['name']}}<input type="radio" name="fluency4" value="{{$fluency4['id']}}"><span class="radiomark"></span>
			</label>    	
	  		@endforeach	
		</div>
		@endif

		    			<span class="text-primary float-right mb-3 add-language" style="cursor: pointer;"><i class="fas fa-plus"></i> Add</span>

				<div class="alert alert-warning alert-dismissible fade" role="alert">
				  <strong>Sorry !</strong> You have reached the maximum number of language selection.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>

				  	</div>	


  		</div>
	</div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
  	  </form>
    </div>
  </div>
</div>

