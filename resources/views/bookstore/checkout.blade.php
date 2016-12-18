@extends('layouts.app')

@section('body', 'product-page')
@section('navclass', 'navbar navbar-rose navbar-transparent navbar-fixed-top navbar-color-on-scroll')

@section('header')
<div class="page-header" data-parallax="active" filter-color="rose" style="background-image: url('/images/backgrounds/background-1.jpg');">
</div>
@endsection

@section('content')
<div class="section section-gray">
    <div class="container">
        <div class="main main-raised main-product">

            test

        </div>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.subviews.footer-simple')
@endsection
