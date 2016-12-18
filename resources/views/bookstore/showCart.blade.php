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

            <div class="table-responsive">
                <table class="table table-shopping">
                    <thead>
                        <tr>
                            <th class="text-center"></th>
                            <th >Title</th>
                            <th class="text-right">Price</th>
                            <th class="text-right">Qty</th>
                            <th class="text-right">Total Amount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart_content as $cart)
                        <tr>
                            <td>
                                <div class="img-container">
                                    @if ($cart->options->cover != null)
                                        <img src="{{ asset('/images/book_covers/'.$cart->options->cover) }}" alt="{{ $cart->name }}">
                                    @else
                                        <img src="{{ asset('/images/book_covers/no_image.jpg') }}" alt="{{ $cart->name }}">
                                    @endif
                                </div>
                            </td>
                            <td class="td-name">
                                <a href="{{ route('bookstore.show', $cart->id) }}" class="text-rose">{{ $cart->name }}</a>
                                <br /><small>{{ $cart->options->category }}</small>
                            </td>
                            <td class="td-number">
                                {{ "Rp ".number_format($cart->price,2, ',', '.') }}
                            </td>
                            <td class="td-number">
                                {{ $cart->qty }}
                                <div class="btn-group">
                                    <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">remove</i> </button>
                                    <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">add</i> </button>
                                </div>
                            </td>
                            <td class="td-number">
                                {{ "Rp ".number_format($cart->price * $cart->qty,2, ',', '.') }}
                            </td>
                            <td class="td-actions">
                                <a href="{{ route('bookstore.removeItem',$cart->rowId) }}" type="button" rel="tooltip" data-placement="left" title="Remove items" class="btn btn-simple">
                                    <i class="material-icons">close</i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                        <tr>
                            <td colspan="3">
                            </td>
                            <td class="td-total">
                               Subotal
                            </td>
                            <td class="td-price">
                                {{ "Rp ".Cart::instance('shopping')->total(2, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">
                                <a href="{{ url('/') }}" class="btn btn-info btn-round">Continue Shopping <i class="material-icons">add_shopping_cart</i></a>
                                @if (Cart::instance('shopping')->count() != 0)
                                    <a href="{{ route('bookstore.checkout') }}" class="btn btn-rose btn-round"><i class="material-icons">done_all</i> Checkout</a>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.subviews.footer-simple')
@endsection
