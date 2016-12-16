<div class="row">
	<div class="col-md-6">
		<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} label-floating">
			<label for="title" class="control-label">Title</label>
			<input id="title" type="text" class="form-control" name="title" value="{{ old('title', $book->title) }}" required>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} label-floating">
			<label for="title" class="control-label">Title</label>
			<input id="title" type="text" class="form-control" name="title" value="{{ old('title', $book->title) }}" required>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<label>Description</label>
		<div class="form-group {{ $errors->has('desc') ? ' has-error' : '' }} label-floating">
			<label for="desc" class="control-label">Description about the book.</label>
			<textarea class="form-control" rows="5">{{ old('desc', $book->desc) }}</textarea>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="form-group {{ $errors->has('author') ? ' has-error' : '' }} label-floating">
			<label for="author" class="control-label">Author</label>
			<input id="author" type="text" class="form-control" name="author" value="{{ old('author', $book->author) }}" required>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group {{ $errors->has('publisher') ? ' has-error' : '' }} label-floating">
			<label for="publisher" class="control-label">Publisher</label>
			<input id="publisher" type="text" class="form-control" name="publisher" value="{{ old('publisher', $book->publisher) }}" required>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group {{ $errors->has('price') ? ' has-error' : '' }} label-floating">
			<label for="price" class="control-label">Price</label>
			<input id="price" type="number" class="form-control" name="price" value="{{ old('price', $book->price) }}" required>
		</div>
	</div>
</div>

<button type="submit" class="btn btn-primary pull-right">Save Book</button>
<div class="clearfix"></div>