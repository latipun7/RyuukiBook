@extends('layouts.dashboard')

@section('books', 'active')
@section('nav_title', 'Books')

@section('button')
	<a href="{!! route('books.create') !!}" class="btn btn-primary">Add Book</a>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h4 class="title">Books</h4>
            <p class="category">Manage books here.</p>
        </div>
        <div class="card-content table-responsive">
            <table class="table">
                <thead class="text-primary">
                	{{-- <th class="col-md-1">No</th> --}}
                	<th class="col-md-2">Name</th>
                    <th class="col-md-2">Category</th>
                    <th class="col-md-4">Description</th>
                    <th class="col-md-2 text-center">Price</th>
                	<th class="col-md-1 text-center">Edit</th>
                	<th class="col-md-1 text-center">Delete</th>
                </thead>
                <tbody>
                	<?php $i = 1; ?>
                    @foreach( $book as $books )
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('books.destroy', [$books->id]) }}">
                            <input type="hidden" name="_method" value="DELETE" />
                            {{ csrf_field() }}
                            <tr>
                                {{-- <td>{{ $i }}</td> --}}
                                <td><a style="display: block;" href="{{ route('books.show', [$books->id]) }}">{{ $books->title }}</a></td>
                                <td>{{ $books->category->name }}</td>
                                <td>{{ $books->desc }}</td>
                                <td class="text-right">{{ "Rp ".number_format($books->price,2, ',', '.') }}</td>
                                <td class="text-center"><a href="{!! route('books.edit', [$books->id]) !!}" class="btn btn-info">Edit</a></td>
                                <td class="text-center"><button type="submit" class="btn btn-danger">Delete</button></td>
                            </tr>
                            <?php $i++; ?>
                        </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card"><div class="card-content text-center">{!! $book->links() !!}</div></div>
</div>
@endsection

{{-- @section('modal')
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Book Detail</h4>
            </div>
            <div class="modal-body">asdasd</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection --}}
