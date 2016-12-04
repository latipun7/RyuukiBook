@extends('layouts.app')

@section('body', 'signup-page')
@section('navclass', 'navbar navbar-transparent navbar-absolute')

<!-- Main Content -->
@section('header')
<div class="header header-filter" style="background-image: url('/images/backgrounds/bg1.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-signup">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}
                        <div class="header header-primary text-center">
                            <h4>Reset Password</h4>
                            {{-- <div class="social-line">
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div> --}}
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="content">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    <span class="material-icons form-control-feedback">clear</span>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="footer text-center">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.subviews.footer-simple')
</div>
@endsection
