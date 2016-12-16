<div class="row">
	<div class="col-md-6">
		<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} label-floating">
			<label for="title" class="control-label">{{ $errors->has('title') ? $errors->first('title') : 'Title' }}</label>
			<input id="title" type="text" class="form-control" name="title" value="{{ old('title', $book->title) }}" required>
			<span class="material-icons form-control-feedback">clear</span>
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
			<select class="form-control" id="category" name="category" placeholder="Select category">
				<option class="{{ $errors->has('category') ? 'has-error' : '' }}" value="" disabled selected>Select category</option>
				@foreach ($category as $id => $name) {
		        	<option value="{{ $id }}">{{ $name }}</option>
		        }
		        @endforeach
			</select>
			<span class="material-icons form-control-feedback">clear</span>
			<span>{{ $errors->first('category') }}</span>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<label>Description</label>
		<div class="form-group {{ $errors->has('desc') ? ' has-error' : '' }} label-floating">
			<label for="desc" class="control-label">{{ $errors->has('desc') ? $errors->first('desc') : 'Description about the book.' }}</label>
			<textarea class="form-control" name="desc" rows="5">{{ old('desc', $book->desc) }}</textarea>
			<span class="material-icons form-control-feedback">clear</span>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="form-group {{ $errors->has('author') ? ' has-error' : '' }} label-floating">
			<label for="author" class="control-label">{{ $errors->has('author') ? $errors->first('author') : 'Author' }}</label>
			<input id="author" type="text" class="form-control" name="author" value="{{ old('author', $book->author) }}" required>
			<span class="material-icons form-control-feedback">clear</span>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group {{ $errors->has('publisher') ? ' has-error' : '' }} label-floating">
			<label for="publisher" class="control-label">{{ $errors->has('publisher') ? $errors->first('publisher') : 'Publisher' }}</label>
			<input id="publisher" type="text" class="form-control" name="publisher" value="{{ old('publisher', $book->publisher) }}" required>
			<span class="material-icons form-control-feedback">clear</span>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group {{ $errors->has('price') ? ' has-error' : '' }} label-floating">
			<label for="price" class="control-label">{{ $errors->has('price') ? $errors->first('price') : 'Price' }}</label>
			<input id="price" type="number" class="form-control" name="price" value="{{ old('price', $book->price) }}" required>
			<span class="material-icons form-control-feedback">clear</span>
		</div>
	</div>
</div>

<button type="submit" class="btn btn-primary pull-right">Save Book</button>
<div class="clearfix"></div>