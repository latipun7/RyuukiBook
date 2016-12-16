@extends('layouts.dashboard')

@section('books', 'active')
@section('nav_title', 'Add Book')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h4 class="title">Add Book</h4>
            <p class="category">Add books here.</p>
        </div>
        <div class="card-content">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('books.store') }}">
                {{ csrf_field() }}
                @include('books._form')
            </form>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card card-profile">
        <div class="card-avatar">
            <a href="#">
                <img class="img" src="#" />
            </a>
        </div>

        <div class="content">
            <a href="#" class="btn btn-primary btn-round">Cover Image</a>
        </div>
    </div>
</div>
@endsection
