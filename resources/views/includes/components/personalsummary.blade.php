
			@if($errors)
			<div class="row"> 
			<div class="col-md-12 justify-content-center" style="text-align: center; margin-bottom: 2rem;">
			@foreach ($errors->all() as $error)
		        <span class="invalid-feedback" role="alert" style="display: block;">
		            <strong>{{ $error }}</strong>
		        </span>
		    @endforeach
		   </div> </div>
		   @endif
		   		  	
		  	<div class="tab-form mb-5">
		  		<div class="tab-form-header text-white">
		  			<h4>Personal Summary<span class="asterick">*</span></h4>
            		<span class="text-white edit-summary" style="cursor: pointer;"><i class="fas fa-edit"></i></span>
		  		</div>

				<div id="editablediv" style="padding: 1%">
					@if(!empty($cvdets->PersonalSummary))
					{!! $cvdets->PersonalSummary !!}
					@else
					<p>Tell us about your professional experience, skills and competencies. (Maximum 1000 words)..in smaller font</p>
					@endif
				</div>
		  	</div>

		  	<div class="row">
		  		<div class="col-md-6">
			  	<div class="tab-form mb-5">
			  		<div class="tab-form-header text-white">
			  			<h4>Attributes<span class="asterick">*</span></h4>
						@php
						$attributes = array(
						array("id" => "Adaptable", "name" => "Adaptable"),
						array("id" => "Agreeable", "name" => "Agreeable"),
						array("id" => "Ambitious", "name" => "Ambitious"),
						array("id" => "Brave", "name" => "Brave"),
						array("id" => "Broad-Minded", "name" => "Broad-Minded"),
						array("id" => "Creative", "name" => "Creative"),
						array("id" => "Decisive", "name" => "Decisive"),
						array("id" => "Determined", "name" => "Determined"),
						array("id" => "Diligent", "name" => "Diligent"),
						array("id" => "Diplomatic", "name" => "Diplomatic"),
						array("id" => "Dynamic", "name" => "Dynamic"),
						array("id" => "Easygoing", "name" => "Easygoing"),
						array("id" => "Energetic", "name" => "Energetic"),
						array("id" => "Enthusiastic", "name" => "Enthusiastic"),
						array("id" => "Hard-Working", "name" => "Hard-Working"),
						array("id" => "Honest", "name" => "Honest"),
						array("id" => "Humorous", "name" => "Humorous"),
						array("id" => "Imaginative", "name" => "Imaginative"),
						array("id" => "Impartial", "name" => "Impartial"),
						array("id" => "Independent", "name" => "Independent"),
						array("id" => "Intellectual", "name" => "Intellectual"),
						array("id" => "Intelligent", "name" => "Intelligent"),
						array("id" => "Intuitive", "name" => "Intuitive"),
						array("id" => "Inventive", "name" => "Inventive"),
						array("id" => "Loyal", "name" => "Loyal"),
						array("id" => "Modest", "name" => "Modest"),
						array("id" => "Neat", "name" => "Neat"),
						array("id" => "Optimistic", "name" => "Optimistic"),
						array("id" => "Passionate", "name" => "Passionate"),
						array("id" => "Patient", "name" => "Patient"),
						array("id" => "Persistent", "name" => "Persistent"),
						array("id" => "Pioneering", "name" => "Pioneering"),
						array("id" => "Philosophical", "name" => "Philosophical"),
						array("id" => "Placid", "name" => "Placid"),
						array("id" => "Plucky", "name" => "Plucky"),
						array("id" => "Polite", "name" => "Polite"),
						array("id" => "Powerful", "name" => "Powerful"),
						array("id" => "Practical", "name" => "Practical"),
						array("id" => "Pro-Active", "name" => "Pro-Active"),
						array("id" => "Quick-Witted", "name" => "Quick-Witted"),
						array("id" => "Quiet", "name" => "Quiet"),
						array("id" => "Rational", "name" => "Rational"),
						array("id" => "Reliable", "name" => "Reliable"),
						array("id" => "Reserved", "name" => "Reserved"),
						array("id" => "Resource", "name" => "Resource"),
						array("id" => "Self-Confident", "name" => "Self-Confident"),
						array("id" => "Self-Disciplined", "name" => "Self-Disciplined"),
						array("id" => "Sensible", "name" => "Sensible"),
						array("id" => "Sensitive", "name" => "Sensitive"),
						array("id" => "Shy", "name" => "Shy"),
						array("id" => "Sincere", "name" => "Sincere"),
						array("id" => "Sociable", "name" => "Sociable"),
						array("id" => "Straightforward", "name" => "Straightforward"),
						array("id" => "Sympathetic", "name" => "Sympathetic"),
						array("id" => "Thoughtful", "name" => "Thoughtful"),
						array("id" => "Tidy", "name" => "Tidy"),
						array("id" => "Tough", "name" => "Tough"),
						array("id" => "Unassuming", "name" => "Unassuming"),
						array("id" => "Understanding", "name" => "Understanding"),
						array("id" => "Versatile", "name" => "Versatile"),
						array("id" => "Willing", "name" => "Willing"),
						array("id" => "Witty", "name" => "Witty"),
						);
						@endphp				  			
				  		<select class="selectpicker selectdropdown"data-width="200px;" data-live-search="true" data-size="10" name="attr[]" multiple="multiple" autocomplete="off"  style="width: 100%" data-max-options="5" required>
			  			@foreach($attributes as $attribute)
				  			@if(in_array($attribute['id'],array_values($attrs)))
							<option data-content="<span class='badge badge-success'>{{$attribute['name']}}</span>" selected value="{{$attribute['id']}}">{{$attribute['name']}}</option>
				  			@else
							<option data-content="<span class='badge badge-success'>{{$attribute['name']}}</span>" value="{{$attribute['id']}}">{{$attribute['name']}}</option>
							@endif
						@endforeach
						</select>
			  		</div>
					 <div class="form-group multiselect-form" style="height: 130px;">
					    <label for="multiselect2">Choose five attributes from the dropdown</label>
					</div>
			  	</div>
		  		</div>
		  		<div class="col-md-6">
			  	<div class="tab-form mb-5">
			  		<div class="tab-form-header text-white">
			  			<h4>Skills<span class="asterick">*</span></h4>
			  		@php 
			  		$skill = array(
	  				array("id" => "Business_Management ", "name" => "Business Management"),
					array("id" => "Computer", "name" => "Computer"),
					array("id" => "Construction", "name" => "Construction"),
					array("id" => "Customer_Service", "name" => "Customer Service"),
					array("id" => "Diplomacy", "name" => "Diplomacy"),
					array("id" => "Effective_Listening", "name" => "Effective Listening"),
					array("id" => "Financial_Management", "name" => "Financial Management"),
					array("id" => "Interpersonal", "name" => "Interpersonal"),
					array("id" => "Multi-tasking", "name" => "Multi-tasking"),
					array("id" => "Negotiating", "name" => "Negotiating"),
					array("id" => "Organisation", "name" => "Organisation"),
					array("id" => "People_Management", "name" => "People Management"),
					array("id" => "Planning", "name" => "Planning"),
					array("id" => "Presentation", "name" => "Presentation"),
					array("id" => "Problem_Solving", "name" => "Problem Solving"),
					array("id" => "Programming", "name" => "Programming"),
					array("id" => "Report_Writing", "name" => "Report Writing"),
					array("id" => "Research", "name" => "Research"),
					array("id" => "Resourcefulness", "name" => "Resourcefulness"),
					array("id" => "Sales_Ability", "name" => "Sales Ability"),
					array("id" => "Technical", "name" => "Technical"),
					array("id" => "Time_Management", "name" => "Time Management"),
					array("id" => "Training", "name" => "Training"),
					array("id" => "Verbal_Communication", "name" => "Verbal Communication"),
					array("id" => "Written_Communication", "name" => "Written Communication"),
					);
			  		@endphp

				  		<select class="selectpicker selectdropdown" data-width="200px;" data-live-search="true" data-size="10" id="multiselect2" name="skill[]" multiple="multiple" autocomplete="off"  data-max-options="5" required>
				  			@foreach($skill as $skill)
				  			@if(in_array($skill['id'],array_values($skills)))
							<option data-content="<span class='badge badge-success'>{{$skill['name']}}</span>" selected value="{{$skill['id']}} ">{{$skill['name']}}</option>
							@else
							<option data-content="<span class='badge badge-success'>{{$skill['name']}}</span>" value="{{$skill['id']}} ">{{$skill['name']}}</option>
							@endif
							@endforeach
				  		</select>

			  		</div>
					 <div class="form-group multiselect-form" style="height: 130px;">
					    <label for="multiselect2">Choose five skills from the dropdown</label>
				  	</div>
			  	</div>
		  		</div>
		  	</div>


		  	<div class="row">
		  		<div class="col-md-6">
			  	<div class="tab-form mb-5">
			  		<div class="tab-form-header text-white">
			  			<h4>Hard Skills<span class="asterick">*</span></h4>
				  		<select class="selectpicker selectdropdown" data-width="200px;" data-live-search="true" data-size="10" id="multiselect3" name="hardskill[]" multiple="multiple"  data-max-options="5" autocomplete="off" required>
				  			@foreach($hardskills as $hardskill)
				  			@if(in_array($hardskill->ID,array_values($hskills)))
							<option data-content="<span class='badge badge-success'>{{$hardskill->Name}}</span>" selected value="{{$hardskill->ID}}">{{$hardskill->Name}}</option>	
							@else
							<option data-content="<span class='badge badge-success'>{{$hardskill->Name}}</span>" value="{{$hardskill->ID}}">{{$hardskill->Name}}</option>
							@endif	
				  			@endforeach			  			
				  		</select>
			  		</div>
					 <div class="form-group multiselect-form" style="height: 130px;">
					    <label for="multiselect3">Choose five hard skills from the dropdown</label>
				  	</div>
			  	</div>
			  	</div>
		  		<div class="col-md-6">
			  	<div class="tab-form mb-5">
			  		<div class="tab-form-header text-white">
			  			<h4>Social Media</h4>
			  		</div>
			  		<div class="container multiinput-form" style="height: 130px;">
				  		<div class="form-group row">
					    <label for="colFormLabel" class="col-md-4 offset-md-1 text-primary text-center col-form-label label">Skype</label>
					    <div class="col-md-6">
				  			@if(!empty($cvdets->SkypeContact))
					      <input type="text" name="skype" class="form-control" id="colFormLabel" value="{{$cvdets->SkypeContact}}">
				  			@else
					      <input type="text" name="skype" class="form-control" id="colFormLabel" placeholder="Skype Link">
				  			@endif
					    </div>
						</div>  

					    <div class="form-group row">
					    <label for="colFormLabel" class="col-md-4 offset-md-1 text-primary text-center col-form-label label">LinkedIn</label>
					    <div class="col-md-6">
					    	
				  			@if(!empty($cvdets->LinkedInContact))
					      <input type="text" name="linkedin" class="form-control" id="colFormLabel" value="{{$cvdets->LinkedInContact}}">				  			@else
					      <input type="text" name="linkedin" class="form-control" id="colFormLabel" placeholder="LinkedIn Link">
				  			@endif
					    </div>
					    </div>
				  	</div>

			  	</div>
			  	</div>
			</div>

			<div class="row">
		  		<div class="col-md-6">

			  	<div class="tab-form mb-5">
			  		<div class="tab-form-header text-white">
			  			<h4>Language<span class="asterick">*</span></h4>
			  		</div>	
					 <div class="form-group"  style="padding: 4% 2% 10%">
					    <label for="multiselect4">Choose a language from the dropdown</label>
		    			<div class="row">
		    			<div class="col-md-10">	
				  		<select class="selectpicker selectdropdown mb-3" data-width="100%" data-live-search="true" data-size="10" name="language1" autocomplete="off" required>
				  		@foreach($languages as $language1) 
				  		@if(!empty($lang) && $language1->LanguageName == $lang->Language1)
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
					    <label for="multiselect4">Choose fluency</label>
				  		@foreach($fluencies as $fluency1) 
				  		@if(!empty($lang) && $fluency1['id'] == $lang->Fluency1)
						<label class="fancyradio radio-inline">{{$fluency1['name']}}<input type="radio" name="fluency1" value="{{$fluency1['id']}}" checked><span class="radiomark"></span>
						</label>
						@else
						<label class="fancyradio radio-inline">{{$fluency1['name']}}<input type="radio" name="fluency1" value="{{$fluency1['id']}}"><span class="radiomark"></span>
						</label>     	
						@endif   	
				  		@endforeach	


				  		@if(!empty($lang) && $lang->Language2 != null)
						<div class="form-group">
			    			<label for="multiselect4" style="margin-top:2rem;">Choose another language from the dropdown</label>
			    			<div class="row">
			    			<div class="col-md-10">	
			    			<select class="selectpicker selectdropdown mb-3 language2" data-width="100%" data-live-search="true" data-size="10" name="language2">
					  		@foreach($languages as $language2) 
					  		@if(!empty($lang) && $language2->LanguageName == $lang->Language2)
								<option value="{{$language2->LanguageName}}" selected>{{$language2->LanguageName}}</option>	
							@else	
								<option value="{{$language2->LanguageName}}">{{$language2->LanguageName}}</option>
							@endif		
					  		@endforeach	
					  		</select>
					  		</div>
					  		<div class="col-md-1"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
					  		</div>
						    <label for="multiselect4">Choose fluency</label>
					  		@foreach($fluencies as $fluency2) 
					  		@if(!empty($lang) && $fluency2['id'] == $lang->Fluency2)
							<label class="fancyradio radio-inline">{{$fluency2['name']}}<input type="radio" name="fluency2" value="{{$fluency2['id']}}" checked><span class="radiomark"></span>
							</label>
							@else
							<label class="fancyradio radio-inline">{{$fluency2['name']}}<input type="radio" name="fluency2" value="{{$fluency2['id']}}"><span class="radiomark"></span>
							</label>     	
							@endif  	
					  		@endforeach	
			    		</div>
			    		@endif


				  		@if(!empty($lang) && $lang->Language3 != null)
						<div class="form-group">
			    			<label for="multiselect4" style="margin-top:2rem;">Choose another language from the dropdown</label>
			    			<div class="row">
			    			<div class="col-md-10">	 
			    			<select class="selectpicker selectdropdown mb-3 language3" data-width="100%" data-live-search="true" data-size="10" name="language3">
				  		@foreach($languages as $language3) 
				  		@if(!empty($lang) && $language3->LanguageName == $lang->Language3)
							<option value="{{$language3->LanguageName}}" selected>{{$language3->LanguageName}}</option>	
						@else	
							<option value="{{$language3->LanguageName}}">{{$language3->LanguageName}}</option>
						@endif		
				  		@endforeach	
				  			</select>
					  		</div>
					  		<div class="col-md-1"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
					  		</div>

					    	<label for="multiselect4">Choose fluency</label>
				  		@foreach($fluencies as $fluency3) 
				  		@if(!empty($lang) && $fluency3['id'] == $lang->Fluency3)
							<label class="fancyradio radio-inline">{{$fluency3['name']}}<input type="radio" name="fluency3" value="{{$fluency3['id']}}" checked><span class="radiomark"></span>
							</label>
						@else
							<label class="fancyradio radio-inline">{{$fluency3['name']}}<input type="radio" name="fluency3" value="{{$fluency3['id']}}"><span class="radiomark"></span>
							</label>     	
						@endif  	
				  		@endforeach	
			    		</div>
			    		@endif


				  		@if(!empty($lang) && $lang->Language4 != null)
						<div class="form-group">
			    			<label for="multiselect4" style="margin-top:2rem;">Choose another language from the dropdown</label>
			    			<div class="row">
			    			<div class="col-md-10">	 
			    			<select class="selectpicker selectdropdown mb-3 language4" data-width="100%" data-live-search="true" data-size="10" name="language4">
					  		@foreach($languages as $language4) 
					  		@if(!empty($lang) && $language4->LanguageName == $lang->Language4)
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
					  		@if(!empty($lang) && $fluency4['id'] == $lang->Fluency4)
							<label class="fancyradio radio-inline">{{$fluency4['name']}}<input type="radio" name="fluency4" value="{{$fluency4['id']}}" checked><span class="radiomark"></span>
							</label>
							@else
							<label class="fancyradio radio-inline">{{$fluency4['name']}}<input type="radio" name="fluency4" value="{{$fluency4['id']}}"><span class="radiomark"></span>
							</label>     	
							@endif  	
					  		@endforeach	
			    		</div>
			    		@endif


				  		@if(empty($lang))
			    		<div class="form-group" id="language2" style="display: none;">
			    			<label for="multiselect4" style="margin-top:2rem;">Choose another language from the dropdown</label>
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


				  		@if(empty($lang))
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

				  		@if(empty($lang))
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

				  	</div>	
			  	</div>
			  	</div>
				<div class="alert alert-warning alert-dismissible fade" role="alert">
				  <strong>Sorry !</strong> You have reached the maximum number of language selection.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			</div>