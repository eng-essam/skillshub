@extends('web.layout')

@section('title')
    @lang('web.login')
@endsection

@section('main')
    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('web/img/page-background.jpg') }})">
        </div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="index.html">@lang('web.home')</a></li>
                        <li>@lang('web.signin')</li>
                    </ul>
                    <h1 class="white-text">@lang('web.signexam')</h1>

                </div>
            </div>
        </div>

    </div>
    <!-- /Hero-area -->

    <!-- Contact -->
    <div id="contact" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- login form -->
                <div class="col-md-6 col-md-offset-3">
                    <div class="contact-form">
                        <h4>@lang('web.signin')</h4>

                        @include('web.inc.messages')

                        <form  method="POST" action="{{ url('login') }}">
                            @csrf
                            <input class="input" type="email" value="{{ old('email') }}" name="email"
                                placeholder="@lang('web.email')">
                            <input class="input" type="password" name="password" placeholder="@lang('web.password')">
                            <div style="margin-bottom:5px">
                                <input style="margin-left:5px" type="checkbox" name="remember">@lang('web.remember')
                            </div>

                            <a style="margin: 0 5px 0 5px" href="{{url('/forgot-password')}}" class="main-button icon-button pull-right">@lang('web.forgotpassword')</a>

                            <button type="submit" class="main-button icon-button pull-right">@lang('web.signin')</button>
                        </form>
                    </div>
                </div>
                <!-- /login form -->

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Contact -->
@endsection
