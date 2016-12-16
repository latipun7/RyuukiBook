@extends('layouts.dashboard')

@section('books', 'active')
@section('nav_title', 'Add Book')

@section('content')
<form class="form-horizontal" role="form" method="POST" files="true" action="{{ route('books.store') }}">
{{ csrf_field() }}

<div class="col-md-8">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h4 class="title">Add Book</h4>
            <p class="category">Add books here.</p>
        </div>
        <div class="card-content">
            @include('books._form')
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card card-profile">
        @if (isset($book) && $book->cover)
            <div class="card-avatar">
                <a href="#">
                    <img class="img" src="{{ asset('images/book_covers'.$book->cover) }}" />
                </a>
            </div>
        @endif

        <div class="content">
            <h4 class="card-title {{ $errors->has('cover') ? ' has-error' : '' }}">Cover Image</h4>
            <p class="card-content {{ $errors->has('cover') ? ' has-error' : '' }}">{{ $errors->first('cover') }}</p>
            <input type="file" class="btn btn-primary btn-round" style="margin: 15px auto !important;">
        </div>
    </div>
</div>

</form>
@endsection
