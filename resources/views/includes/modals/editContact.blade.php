
<div class="modal" id="contactDetailsModal" tabindex="-1" role="dialog" aria-labelledby="contactDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        	<h4 class="modal-title text-primary text-center">Edit Your Personal Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="{{route('edit.contact.details')}}">
        	 @csrf
      <div class="modal-body">
<div class="row">
	<div class="col-md-12">
		<div class="container">

  		<div class="form-group row">
	    <label for="name" class="col-md-4 text-center text-white col-form-label label label-primary">Name</label>
	    <div class="col-md-4">
	      <input type="text" class="form-control" id="name" name="fname" value="{{$details->Firstname}}">
	       @error('fname')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
           @enderror
	  	</div>
	    <div class="col-md-4">
	      <input type="text" class="form-control" name="lname" value="{{$details->Lastname}}">
	       @error('lname')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
           @enderror
	    </div>
	    </div>

  		<div class="form-group row">
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Mobile Number</label>
	    <div class="col-md-4">
	    	@if(!empty($cvdets->PhoneNumber))
	      <input type="tel" class="form-control" name="phone" placeholder="Phone Number" value="{{$cvdets->PhoneNumber}}">
	      	@else
	      <input type="tel" class="form-control" name="phone" placeholder="Phone Number">
	      	@endif
	       @error('phone')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
           @enderror
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
  				<div class="col-md-4"><input class="form-control" id="other_number" type="tel"  value="{{$cvdets->PhoneNumberOther}}" name="phone1"/></div>
  				<div class="col-md-4"><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>
  			</div>
	      	@endif

  		</div>

  		<div class="form-group row">
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Email Account</label>
	    <div class="col-md-4">
	      <input type="email" class="form-control" name="email" value="{{$details->EmailAddress}}" disabled="disabled">
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
  				<div class="col-md-4"><input type="email" class="form-control" name="email1" value="{{$cvdets->EmailAddressOther}}"></div>
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
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Driving Licence</label>
	    <div class="col-md-4">
	    	<select class="selectpicker" data-width="100%;" name="licence" required>
	    	  @if(!empty($cvdets->DL) && $cvdets->DL == 'Yes')
		      <option value="null">Yes/No</option>
		      <option value="Yes" selected>Yes</option>
		      <option value="No">No</option>
	    	  @elseif(!empty($cvdets->DL) && $cvdets->DL == 'No')
		      <option value="null">Yes/No</option>
		      <option value="Yes">Yes</option>
		      <option value="No" selected>No</option>
		      @else
		      <option value="null" selected>Yes/No</option>
		      <option value="Yes">Yes</option>
		      <option value="No">No</option>
		      @endif
		    </select>
	  	</div>
	    <div class="col-md-4"></div>
	    </div>

  		<div class="form-group row">
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Car Owner</label>
	    <div class="col-md-4">
	    	<select class="selectpicker" data-width="100%;" name="owner" required>
	    	  @if(!empty($cvdets->CarOwner) && $cvdets->CarOwner == 'Yes')
		      <option value="null">Yes/No</option>
		      <option value="Yes" selected>Yes</option>
		      <option value="No">No</option>
	    	  @elseif(!empty($cvdets->CarOwner) && $cvdets->CarOwner == 'No')
		      <option value="null">Yes/No</option>
		      <option value="Yes">Yes</option>
		      <option value="No" selected>No</option>
		      @else
		      <option value="null" selected>Yes/No</option>
		      <option value="Yes">Yes</option>
		      <option value="No">No</option>
		      @endif
		    </select>
	  	</div>
	    <div class="col-md-4"></div>
	    </div>

  		<div class="form-group row">
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Nationality</label>
	    <div class="col-md-4">
	    	<select class="selectpicker" data-width="100%;" name="nationality" required>
	    	  @if(!empty($cvdets->Nationality) && $cvdets->Nationality == 'Kenyan')
		      <option value="null">Nationality</option>
		      <option value="Kenyan" selected>Kenyan</option>
		      <option value="Non-Kenyan">Non-Kenyan</option>
	    	  @elseif(!empty($cvdets->Nationality) && $cvdets->Nationality == 'Non-Kenyan')
		      <option value="null">Nationality</option>
		      <option value="Kenyan">Kenyan</option>
		      <option value="Non-Kenyan" selected>Non-Kenyan</option>
		      @else
		      <option value="null" selected>Nationality</option>
		      <option value="Kenyan">Kenyan</option>
		      <option value="Non-Kenyan">Non-Kenyan</option>
		      @endif
		    </select>
	  	</div>
	    <div class="col-md-4"></div>
	    </div>

  		<div class="form-group row">
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Identification</label>
	    <div class="col-md-4">
			<label class="fancyradio">ID
	    	@if(!empty($cvdets->Identification) && $cvdets->Identification == 'Passport')
			  <input type="radio" name="identification" value="ID">
			@else
			  <input type="radio" name="identification" value="ID" checked>
			@endif  
			  <span class="radiomark"></span>
			</label>
			<label class="fancyradio">Passport
	    	@if(!empty($cvdets->Identification) && $cvdets->Identification == 'Passport')
			  <input type="radio" name="identification" value="Passport" checked>
			@else
			  <input type="radio" name="identification" value="Passport">
			@endif  
			  <span class="radiomark"></span>
			</label>
	  	</div>
	    <div class="col-md-4"></div>
	    </div>

  		<div class="form-group row">
	    <div class="col-md-4"></div>
	    <div class="col-md-4">
	      @if(!empty($cvdets->ID_No) && $cvdets->ID_No != null)
	      <input type="tel" class="form-control id" placeholder="ID Number" value="{{$cvdets->ID_No}}" name="id">
	      @else
	      <input type="tel" class="form-control id" placeholder="ID Number" name="id">
	      @endif
	      @if(!empty($cvdets->Passport_No) && $cvdets->Passport_No != null)
	      <input type="tel" class="form-control  passport" placeholder="Passport Number" value="{{$cvdets->Passport_No}}" name="passport">
	      @else
	      <input type="tel" class="form-control  passport" placeholder="Passport Number" name="passport">
	      @endif
	    </div>
	    <div class="col-md-4 passport">
	      <select class="selectpicker" data-width="100%;" data-live-search="true" data-size="10" name="passport_country">
		      <option value="null" selected>Passport Country</option>
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
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Location</label>
	    <div class="col-md-4">
	    	<select class="selectpicker" data-width="100%;" data-size="10" data-live-search="true" name="country" required>
		      <option value="null" selected>Country</option>
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
	      @if(!empty($cvdets->PhysicalAddress))
	      <input type="tel" class="form-control" placeholder="Physical Address" name="address" value="{{$cvdets->PhysicalAddress}}">
	      @else
	      <input type="tel" class="form-control" placeholder="Physical Address" name="address" required>
	      @endif
	       @error('address')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
           @enderror
	  	</div>
	    </div>

  		<div class="form-group row">
	    <div class="col-md-4"></div>
	    <div class="col-md-4">

	      @if(!empty($cvdets->PO_BOX))
	      <input type="tel" class="form-control" placeholder="P.O Box" name="pobox" value="{{$cvdets->PO_BOX}}">
	      @else
	      <input type="tel" class="form-control" placeholder="P.O Box" name="pobox">
	      @endif

	       @error('pobox')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
           @enderror
	  	</div>
	    <div class="col-md-4"></div>
	    </div>

  		<div class="form-group row">
	    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Birth Details</label>
	    <div class="col-md-4">

	      @if(!empty($cvdets->DOB))
        	<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="date"  value="{{$cvdets->DOB}}"/>
	      @else
        	<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="date"/>
	      @endif

	  	</div>
	    <div class="col-md-4">
	    	@php 
	    	$gender = array(
	    		array("name" => "Female"),
	    		array("name" => "Male"),
	    	);
	    	@endphp
	    	<select id="gender" class="selectpicker" data-width="100%;" name="gender" required>
	    		<option></option>
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
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
  	  </form>
    </div>
  </div>
</div>

