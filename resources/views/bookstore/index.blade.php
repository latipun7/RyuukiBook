@extends('layouts.app')

@section('body', 'index-page')
@section('navclass', 'navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll')

@section('header')
<div class="header header-filter" style="background-image: url('images/backgrounds/background-1.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="brand">
                    <h1>Ryuuki Bookstore</h1>
                    <h3>A Leading Bookstore for your needs.</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="main main-raised">
    <div class="section section-basic">
        <div class="container">

            <div class="title">
                <h2>Basic Elements</h2>
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

@endsection