@extends('layouts.dashboard')

@section('books', 'active')
@section('nav_title', 'Book Detail')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h4 class="title">Book Detail</h4>
            <p class="category">Book detail here.</p>
        </div>
        <div class="card-content">
            <div class="row">
				<div class="col-md-6">
					<div class="form-group label-floating">
						<label for="title" class="control-label">Title</label>
						<input id="title" type="text" class="form-control" name="title" value="{{ $book->title }}" disabled>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<input id="title" type="text" class="form-control" name="title" value="{{ $book->category->name }}" disabled>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<label>Description</label>
					<div class="form-group label-floating">
						<label for="desc" class="control-label">Description about the book.</label>
						<textarea class="form-control" name="desc" rows="15" disabled>{{ $book->desc }}</textarea>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<div class="form-group label-floating">
						<label for="author" class="control-label">Author</label>
						<input id="author" type="text" class="form-control" name="author" value="{{ old('author', $book->author) }}" disabled>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group label-floating">
						<label for="publisher" class="control-label">Publisher</label>
						<input id="publisher" type="text" class="form-control" name="publisher" value="{{ $book->publisher }}" disabled>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group label-floating">
						<label for="price" class="control-label">Price</label>
						<input id="price" type="number" class="form-control" name="price" value="{{ $book->price }}" disabled>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card card-profile">
        @if (isset($book) && $book->cover)
            <div class="card-image">
                <a href="#">
                    <img class="img" src="{{ asset('images/book_covers/'.$book->cover) }}" />
                </a>
            </div>
        @else
        	<div class="card-image">
                <a href="#">
                    <img class="img" src="{{ asset('images/book_covers/no_image.jpg') }}" />
                </a>
            </div>
        @endif

        <div class="content">
            <h4 class="card-title">Cover Image</h4>
            <p class="card-content"></p>
        </div>
    </div>
</div>

</form>
@endsection
