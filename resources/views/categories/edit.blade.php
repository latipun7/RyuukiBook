@extends('layouts.dashboard')

@section('categories', 'active')
@section('nav_title', 'Edit Category')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h4 class="title">Edit Category</h4>
            <p class="category">Edit book category here.</p>
        </div>
        <div class="card-content">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('categories.update', [$category->id]) }}">
                <input type="hidden" name="_method" value="PUT" />
                {{ csrf_field() }}
                @include('categories._form')
            </form>
        </div>
    </div>
</div>
@endsection
