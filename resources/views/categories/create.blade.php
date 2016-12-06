@extends('layouts.dashboard')

@section('categories', 'active')
@section('nav_title', 'Add Category')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h4 class="title">Add Category</h4>
            <p class="category">Add book category here.</p>
        </div>
        <div class="card-content">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('categories.store') }}">
                {{ csrf_field() }}
                @include('categories._form')
            </form>
        </div>
    </div>
</div>
@endsection
