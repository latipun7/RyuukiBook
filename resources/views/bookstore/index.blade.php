@extends('layouts.app')

@section('body', 'product-page')
@section('navclass', 'navbar navbar-rose navbar-transparent navbar-fixed-top navbar-color-on-scroll')

@section('header')
<div class="page-header" data-parallax="active" filter-color="rose" style="background-image: url('/images/backgrounds/background-1.jpg');">
    <div class="container">
        <div class="row title-row">
            <div class="col-md-4 col-md-offset-8">
                <a href="{{ route('bookstore.showCart') }}" class="btn btn-white pull-right"><i class="material-icons">shopping_cart</i> {{ Cart::instance('shopping')->count() }} Items</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="section section-gray">
    <div class="container">
        <div class="main main-raised main-product">
            <div class="row">
                @include('layouts._flash')

                <div class="col-md-6 col-sm-6">
                    <div class="tab-content">
                        <div class="img-base">
                            {{-- <div class="tab-pane" id="product-page1"> --}}
                                @if (!empty($featured->cover))
                                    <img class="img-base" src="{{ asset('/images/book_covers/'.$featured->cover) }}" />
                                @else
                                    <img class="img-base" src="{{ asset('/images/book_covers/no_image.jpg') }}" />
                                @endif
                            {{-- </div> --}}   
                            <div class="top">
                                <img class="top" src="{{ asset('/images/tag_popular.png') }}" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <h2 class="title">{{ $featured->title }}</h2>
                    <h3 class="title text-rose" style="margin-top: 10px;">{{ $featured->category->name }}</h3>
                    <h3 class="main-price">{{ "Rp ".number_format($featured->price,2, ',', '.') }}</h3>
                    <div id="acordeon">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-border panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h4 class="panel-title text-rose">
                                        Description
                                        <i class="material-icons">keyboard_arrow_down</i>
                                        </h4>
                                    </a>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body" style="text-align: justify; text-justify: inter-word;">
                                        <p>{{ $featured->desc }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-border panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-controls="collapseOne">
                                        <h4 class="panel-title text-rose">
                                            Details
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </h4>
                                    </a>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li>Author : {{ $featured->author }}</li>
                                            <li>Publisher : {{ $featured->publisher }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!--  end acordeon -->

                    <div class="row text-right">
                        <a href="{{ route('bookstore.addToCart', $featured->id) }}" class="btn btn-rose btn-round">Add to Cart &nbsp;<i class="material-icons">shopping_cart</i></a>
                    </div>
                </div>

            </div>

        </div>

        {{--  --}}

        <div class="related-products">
            <h3 class="title text-center">All books:</h3>

            <div>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('bookstore.filter') }}">
                {{ csrf_field() }}
                    <div class="form-group col-sm-10">
                        <select class="form-control input-lg" name="opt_category">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                            
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-2">
                        <button type="submit" class="btn btn-rose">Filter</button>
                    </div>
                </form>
            </div>

            <div class="row">
                
                @foreach($books as $item)

                    <div class="col-sm-6 col-md-3">
                        <div class="card card-product">
                            <div class="card-image">
                                <a href="#">
                                    @if (!empty($item->cover))
                                        <img class="img" src="{{ asset('/images/book_covers/'.$item->cover) }}" />
                                    @else
                                        <img class="img" src="{{ asset('/images/book_covers/no_image.jpg') }}" />
                                    @endif
                                </a>
                            </div>

                            <div class="content">
                                <h6 class="category text-rose">{{ $item->category->name }}</h6>
                                <h4 class="card-title">
                                    <a href="{{ route('bookstore.show', $item->id) }}">{{ $item->title }}</a>
                                </h4>
                                <div class="card-description" style="text-align: justify; text-justify: inter-word;">
                                    {{ str_limit($item->desc, 100) }}
                                </div>
                                <div class="footer">
                                    <div class="price">
                                        <h4>{{ "Rp ".number_format($item->price,2, ',', '.') }}</h4>
                                    </div>
                                    <div class="stats">
                                        <a href="{{ route('bookstore.addToCart', $item->id) }}" type="button" rel="tooltip" title="Add to cart" class="btn btn-just-icon btn-simple btn-rose">
                                            &nbsp;&nbsp;<i class="material-icons">shopping_cart</i>&nbsp;
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                @endforeach

            </div>
            
            <div class="card"><div class="card-content text-center">{!! $books->links() !!}</div></div>
        </div>

    </div>
</div>
@endsection

@section('footer')
@include('layouts.subviews.footer-simple')
@endsection
