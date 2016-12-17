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

                        <div class="tab-content">
                            <div class="tab-pane" id="product-page1">
                                 <img src="/images/book_covers/product1.jpg"/>
                              </div>
                        </div>

                   </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <h2 class="title"> Becky Silk Blazer </h2>
                    <h3 class="title text-rose" style="margin-top: 10px;">Category</h3>
                    <h3 class="main-price">$335</h3>
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
                                        <p>Eres' daring 'Grigri Fortune' swimsuit has the fit and coverage of a bikini in a one-piece silhouette. This fuchsia style is crafted from the label's sculpting peau douce fabric and has flattering cutouts through the torso and back. Wear yours with mirrored sunglasses on vacation.</p>
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
                                            <li>Author : </li>
                                            <li>Publisher : </li>
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
            <h3 class="title text-center">You may also be interested in:</h3>
            <div class="row">

            </div>
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