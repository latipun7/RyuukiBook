<div class="col-md-8 col-md-offset-2">
	<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} label-floating">
		<label for="name" class="control-label">Name</label>
		<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
		<span class="material-icons form-control-feedback">clear</span>
		{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
	</div>

	<div class="footer text-center">
	    <button type="submit" class="btn btn-primary">
	        Save Category
	    </button>
	</div>
</div>