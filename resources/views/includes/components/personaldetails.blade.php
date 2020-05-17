<div class="row">
	<div class="col-md-12">
		<div class="container">
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
  		<div class="form-group row">
	    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Name<span class="asterick">*</span></label>
	    <div class="col-md-4">
	      <input type="text" class="form-control  @error('fname') is-invalid @enderror" id="name" name="fname" value="{{$userdetails->Firstname}}">
	  	</div>
	    <div class="col-md-4">
	      <input type="text" class="form-control  @error('lname') is-invalid @enderror" name="lname" value="{{$userdetails->Lastname}}">
	       @error('lname')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
           @enderror
	    </div>
	    </div>

  		<div class="form-group row">
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Mobile Number<span class="asterick">*</span></label>
	    <div class="col-md-4">
	    	@if(!empty($cvdets->PhoneNumber))
	      	  <input type="tel" class="form-control   @error('phone') is-invalid @enderror" name="phone" value="{{$cvdets->PhoneNumber}}">
	      	@else
	      	<input type="tel" class="form-control phonemask" name="phone" id="phone" required>
	      	@endif
	  	</div>
	    <div class="col-md-4">
	    	@if(!empty($cvdets->PhoneNumberOther))
	    	@else
		    	<span class="text-primary add-mobile" style="cursor: pointer;"><i class="fas fa-plus"></i> Add another</span>
	      	@endif
	    </div>
	    </div>

  		<div id="mobile">
	    	@if(!empty($cvdets->PhoneNumberOther))
  		<div class="form-group row">
  				<label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Other number</label>
  				<div class="col-md-4">
				<input class="form-control  @error('phone1') is-invalid @enderror" id="other_number" type="tel"  value="{{$cvdets->PhoneNumberOther}}" name="phone1"/>
				</div>
  				<div class="col-md-4"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
  			</div>
	      	@endif
  		</div>

  		<div class="form-group row">
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Email Account<span class="asterick">*</span></label>
	    <div class="col-md-4">
	      <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{$userdetails->EmailAddress}}" disabled="disabled">
	       @error('email')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
           @enderror
	  	</div>
	    <div class="col-md-4">
	    	@if(!empty($cvdets->EmailAddressOther))
	    	@else
	    	<span class="text-primary add-email" style="cursor: pointer;"><i class="fas fa-plus"></i> Add another</span>
	      	@endif
	    </div>
	    </div>
	    
  		<div id="email">
  			
	    	@if(!empty($cvdets->EmailAddressOther))
  			<div class="form-group row">
  				<label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Other email</label>
  				<div class="col-md-4"><input type="email" class="form-control  @error('email1') is-invalid @enderror" name="email1" value="{{$cvdets->EmailAddressOther}}">
	       @error('email')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
           @enderror</div>
  				<div class="col-md-4"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
  			</div>
	      	@endif
  		</div>

	    
  		<div class="form-group row">
	    <div class="col-md-4"></div>
	    <div class="col-md-4">
			<label class="check-inline">Contactable
	    	@if(!empty($cvdets->Contactable) && $cvdets->Contactable == 'Yes')
			  <input type="checkbox" name="contactable" value="Yes" checked="checked">
	    	@else
			  <input type="checkbox" name="contactable" value="Yes">
	      	@endif
			  <span class="checkmark"></span>
			</label>	    	
	    </div>
	    <div class="col-md-4"></div>
	    </div>

  		<div class="form-group row">
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Driving Licence<span class="asterick">*</span></label>
	    <div class="col-md-4">
	    	<select class="selectpicker" data-width="100%;" name="licence" required>
	    	  @if(!empty($cvdets->DL) && $cvdets->DL == 'Yes')
		      <option value="">Yes/No</option>
		      <option value="Yes" selected>Yes</option>
		      <option value="No">No</option>
	    	  @elseif(!empty($cvdets->DL) && $cvdets->DL == 'No')
		      <option value="">Yes/No</option>
		      <option value="Yes">Yes</option>
		      <option value="No" selected>No</option>
		      @else
		      <option value="">Yes/No</option>
		      <option value="Yes">Yes</option>
		      <option value="No">No</option>
		      @endif
		    </select>
		    
	  	</div>
	    <div class="col-md-4"></div>
	    </div>

  		<div class="form-group row">
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Car Owner<span class="asterick">*</span></label>
	    <div class="col-md-4">
	    	<select class="selectpicker" data-width="100%;" name="owner" required>
	    	  @if(!empty($cvdets->CarOwner) && $cvdets->CarOwner == 'Yes')
		      <option value="">Yes/No</option>
		      <option value="Yes" selected>Yes</option>
		      <option value="No">No</option>
	    	  @elseif(!empty($cvdets->CarOwner) && $cvdets->CarOwner == 'No')
		      <option value="">Yes/No</option>
		      <option value="Yes">Yes</option>
		      <option value="No" selected>No</option>
		      @else
		      <option value="">Yes/No</option>
		      <option value="Yes">Yes</option>
		      <option value="No">No</option>
		      @endif
		    </select>
	  	</div>
	    <div class="col-md-4"></div>
	    </div>

  		<div class="form-group row">
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Nationality<span class="asterick">*</span></label>
	    <div class="col-md-4">
	    	<select class="selectpicker" data-width="100%;" name="nationality" required>
	    	  @if(!empty($cvdets->Nationality) && $cvdets->Nationality == 'Kenyan')
		      <option value="">Nationality</option>
		      <option value="Kenyan" selected>Kenyan</option>
		      <option value="Non-Kenyan">Non-Kenyan</option>
	    	  @elseif(!empty($cvdets->Nationality) && $cvdets->Nationality == 'Non-Kenyan')
		      <option value="">Nationality</option>
		      <option value="Kenyan">Kenyan</option>
		      <option value="Non-Kenyan" selected>Non-Kenyan</option>
		      @else
		      <option value="">Nationality</option>
		      <option value="Kenyan">Kenyan</option>
		      <option value="Non-Kenyan">Non-Kenyan</option>
		      @endif
		    </select>
	  	</div>
	    <div class="col-md-4"></div>
	    </div>


  		<div class="form-group row">
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Identification<span class="asterick">*</span></label>
	    <div class="col-md-4">
	      @if(!empty($cvdets->ID_No) && $cvdets->ID_No != null)
	      <input type="tel" class="form-control id" placeholder="ID Number" value="{{$cvdets->ID_No}}" name="id">
	      <input type="hidden" name="identification" value="ID">
	      @else
	      <input type="tel" class="form-control id" placeholder="ID Number" name="id">
	      <input type="hidden" name="identification" value="ID">
	      @endif
	      @if(!empty($cvdets->Passport_No) && $cvdets->Passport_No != null)
	      <input type="tel" class="form-control  passport" placeholder="Passport Number" value="{{$cvdets->Passport_No}}" name="passport">
	      <input type="hidden" name="identification" value="Passport">
	      @else
	      <input type="tel" class="form-control  passport" placeholder="Passport Number" name="passport">
	      <input type="hidden" name="identification" value="Passport">
	      @endif
	    </div>
	    <div class="col-md-4 passport">
	      <select class="selectpicker" data-width="100%;" data-live-search="true" data-size="10" name="passport_country">
		      <option value="">Passport Country</option>
		      @foreach($countries as $country)
	      		@if(!empty($cvdets->Passport_Country) && $cvdets->Passport_Country == $country->CountryID)
		      <option value="{{$country->CountryID}}" selected>{{$country->CountryName}}</option>
		      @else
		      <option value="{{$country->CountryID}}">{{$country->CountryName}}</option>
		      @endif
		      @endforeach
		  </select>
	  	</div>
	    </div>

  		<div class="form-group row">
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Location<span class="asterick">*</span></label>
	    <div class="col-md-4">
	    	<select class="selectpicker" data-width="100%;" data-size="10" data-live-search="true" name="country" required>
		      <option value="">Country</option>
		      @foreach($countries as $country)
	      		@if(!empty($cvdets->ID_Country) && $cvdets->ID_Country == $country->CountryID)
		      <option value="{{$country->CountryID}}" selected>{{$country->CountryName}}</option>
		      @else
		      <option value="{{$country->CountryID}}">{{$country->CountryName}}</option>
		      @endif
		      @endforeach
		    </select>
	  	</div>
	    <div class="col-md-4">

	    	<select class="selectpicker" data-width="100%;" data-size="10" data-live-search="true" name="location" required>
		      <option value="">Location</option>
		      @foreach($locations as $location)
	      		@if(!empty($location->LocationID) && $cvdets->location == $location->CountryID)
		      <option value="{{$location->LocationID}}" selected>{{$location->LocationName}}</option>
		      @else
		      <option value="{{$location->LocationID}}">{{$location->LocationName}}</option>
		      @endif
		      @endforeach
		    </select>
	  	</div>
	    </div>

  		<div class="form-group row">
	    <div class="col-md-4"></div>
	    <div class="col-md-4">
	      @if(!empty($cvdets->PhysicalAddress))
	      <input type="tel" class="form-control  @error('address') is-invalid @enderror" placeholder="Physical Address" name="address" value="{{$cvdets->PhysicalAddress}}">
	      @else
	      <input type="tel" class="form-control  @error('address') is-invalid @enderror" placeholder="Physical Address" name="address" required>
	      @endif
	       @error('address')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
           @enderror
	  	</div>
	    <div class="col-md-4">
	    	
	      @if(!empty($cvdets->PO_BOX))
	      <input type="tel" class="form-control  @error('pobox') is-invalid @enderror" placeholder="Postal Code" name="pobox" value="{{$cvdets->PO_BOX}}">
	      @else
	      <input type="tel" class="form-control  @error('pobox') is-invalid @enderror" placeholder="Postal Code" name="pobox">
	      @endif

	       @error('pobox')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
           @enderror

	    </div>
	    </div>

  		<div class="form-group row">
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Birth Details<span class="asterick">*</span></label>
	    <div class="col-md-4">

	      @if(!empty($cvdets->DOB))
        	<input class="form-control  @error('date') is-invalid @enderror" id="date" name="date" placeholder="MM/DD/YYY" type="date"  value="{{$cvdets->DOB}}"/>
	      @else
        	<input class="form-control  @error('date') is-invalid @enderror" id="date" name="date" placeholder="MM/DD/YYY" type="date" required />
	      @endif

	       @error('date')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
           @enderror
	  	</div>
	    <div class="col-md-4">
	    	@php 
	    	$gender = array(
	    		array("name" => "Female"),
	    		array("name" => "Male"),
	    	);
	    	@endphp
	    	<select id="gender" class="selectpicker" data-width="100%;" name="gender" required>
	    		<option value="">Gender</option>
		      @foreach($gender as $value)
	    		@if(!empty($cvdets->Gender) && $cvdets->Gender == $value['name'])
		      <option value="{{$value['name']}}" selected>{{$value['name']}}</option>
		      @else
		      <option value="{{$value['name']}}">{{$value['name']}}</option>
		      @endif
		      @endforeach
		    </select>
	  	</div>
	    </div>

  		</div>
	</div>
</div>