
<form method="POST" action="{{route('ticket.send')}}">
 @csrf
<div class="form-group row">
<label for="name" class="text-center text-primary col-form-label label">Ticket Type</label>
	<select class="selectpicker" data-width="100%;" name="type" required>
		<option></option>
		<option value="General Question">General Question</option>
		<option value="Bug Report">Bug Report</option>
		<option value="My Account">My Account</option>
		<option value="Other">Other</option>
    </select>
</div>

<div class="form-group row">
<label for="name" class="text-center text-primary col-form-label label">Ticket Description</label>
	<textarea name="description" class="form-control  @error('description') is-invalid @enderror" row="100" style="border-radius: 0;height: 100px"></textarea>

</div>

<button type="submit" class="btn btn-success">Save changes</button>
</form>        