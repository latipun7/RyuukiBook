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
        

        {{--  --}}

        <div class="related-products">
            <h3 class="title text-center">Search Results:</h3>

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
                
                @unless (count($books))
                    <div class="col-sm-12 text-center"><h3>Unfortunately, no items were found.</h3></div>
                @endunless

            </div>
            
            <div class="card"><div class="card-content text-center">{!! $books->links() !!}</div></div>
        </div>

    </div>
</div>
@endsection

@section('footer')
@include('layouts.subviews.footer-simple')
@endsection
