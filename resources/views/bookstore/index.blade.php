@extends('layouts.app')

@section('body', 'product-page')
@section('navclass', 'navbar navbar-rose navbar-transparent navbar-fixed-top navbar-color-on-scroll')

@section('header')
<div class="page-header" data-parallax="active" filter-color="rose" style="background-image: url('images/backgrounds/background-1.jpg');">
    <div class="container">
        <div class="row title-row">
            <div class="col-md-4 col-md-offset-8">
                <button class="btn btn-white pull-right"><i class="material-icons">shopping_cart</i> 0 Items</button>
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

                <div class="col-md-6 col-sm-6">
                    <div class="tab-content">

                        {{-- <div class="tab-pane" id="product-page1"> --}}
                            @if (!empty($featured->cover))
                                <img src="{{ asset('images/book_covers/'.$featured->cover) }}" />
                            @else
                                <img src="{{ asset('images/book_covers/no_image.jpg') }}" />
                            @endif
                          {{-- </div> --}}

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
                                    <div class="panel-body">
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
                        <button class="btn btn-rose btn-round">Add to Cart &nbsp;<i class="material-icons">shopping_cart</i></button>
                    </div>
                </div>

            </div>

        </div>

        {{--  --}}

        <div class="related-products">
            <h3 class="title text-center">Newest book:</h3>
            <div class="row">
                
                @foreach($books as $item)

                    <div class="col-sm-6 col-md-3">
                        <div class="card card-product">
                            <div class="card-image">
                                <a href="#">
                                    @if (!empty($item->cover))
                                        <img class="img" src="{{ asset('images/book_covers/'.$item->cover) }}" />
                                    @else
                                        <img class="img" src="{{ asset('images/book_covers/no_image.jpg') }}" />
                                    @endif
                                </a>
                            </div>

                            <div class="content">
                                <h6 class="category text-rose">{{ $item->category->name }}</h6>
                                <h4 class="card-title">
                                    <a href="#">{{ $item->title }}</a>
                                </h4>
                                <div class="card-description">
                                    {{ str_limit($item->desc, 100) }}
                                </div>
                                <div class="footer">
                                    <div class="price">
                                        <h4>{{ "Rp ".number_format($item->price,2, ',', '.') }}</h4>
                                    </div>
                                    <div class="stats">
                                        <button type="button" rel="tooltip" title="Saved to Wishlist" class="btn btn-just-icon btn-simple btn-rose">
                                            <i class="material-icons">favorite</i>
                                        </button>
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

@section('modal')

@endsection

@section('script')
<script type="text/javascript">
    $(window).load(function() {
        $("#flexiselFeatured").flexisel({
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 3
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 3
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });
    });
</script>
@endsection