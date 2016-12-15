@extends('layouts.dashboard')

@section('categories', 'active')
@section('nav_title', 'Categories')

@section('button')
	<a href="{!! route('categories.create') !!}" class="btn btn-primary">Add Category</a>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h4 class="title">Categories</h4>
            <p class="category">Manage book categories here.</p>
        </div>
        <div class="card-content table-responsive">
            <table class="table">
                <thead class="text-primary">
                	{{-- <th class="col-md-1">No</th> --}}
                	<th class="col-md-7">Name</th>
                	<th class="col-md-2">Edit</th>
                	<th class="col-md-2">Delete</th>
                </thead>
                <tbody>
                	<?php $i = 1; ?>
                    @foreach( $category as $categories )
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('categories.destroy', [$categories->id]) }}">
                            <input type="hidden" name="_method" value="DELETE" />
                            {{ csrf_field() }}
                            <tr>
                                {{-- <td>{{ $i }}</td> --}}
                                <td>{{ $categories->name }}</td>
                                <td><a href="{!! route('categories.edit', [$categories->id]) !!}" class="btn btn-info">Edit</a></td>
                                <td><button type="submit" class="btn btn-danger">Delete</button></td>
                            </tr>
                            <?php $i++; ?>
                        </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card"><div class="card-content text-center">{!! $category->links() !!}</div></div>
</div>
@endsection
