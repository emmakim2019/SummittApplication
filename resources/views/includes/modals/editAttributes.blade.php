
<div class="modal" id="editAttributesModal" tabindex="-1" role="dialog" aria-labelledby="editAttributesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        	<h4 class="modal-title text-primary text-center">Edit your attributes</h4>
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
			    <label for="colFormLabel" class="col-md-4 text-center text-white col-form-label label label-primary">Attributes</label>
			    <div class="col-md-8">
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
						<option selected value="{{$attribute['id']}}">{{$attribute['name']}}</option>
			  			@else
						<option value="{{$attribute['id']}}">{{$attribute['name']}}</option>
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

