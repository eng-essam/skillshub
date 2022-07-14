@extends('web.layout')

@section('title')
    Contact US
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
                        <li><a href="{{ url('/') }}">@lang('web.home')</a></li>
                        <li>@lang('web.contact')</li>
                    </ul>
                    <h1 class="white-text">@lang('web.contact')</h1>

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

                <!-- contact form -->
                <div class="col-md-6">
                    <div class="contact-form">
                        <h4>@lang('web.sendmessage')</h4>
                        @include('web.inc.messages')
                        <form method="PoST" action="{{ url('contact/msg') }}">
                            @csrf
                            <input class="input" type="text" name="name" value="{{old('name')}}" placeholder="@lang('web.name')">
                            <input class="input" type="email" name="email" value="{{old('email')}}" placeholder="@lang('web.email')">
                            <input class="input" type="text" name="subject" value="{{old('subject')}}" placeholder="@lang('web.subject')">
                            <textarea class="input" name="body" value="{{old('body')}}" placeholder="@lang('web.enterMessage')"></textarea>
                            <button type="submit" class="main-button icon-button pull-right">@lang('web.send')</button>
                        </form>
                    </div>
                </div>
                <!-- /contact form -->

                <!-- contact information -->
                <div class="col-md-5 col-md-offset-1">
                    <h4>@lang('web.information')</h4>
                    <ul class="contact-details">
                        <li><i class="fa fa-envelope"></i>{{ $sett->email }}</li>
                        <li><i class="fa fa-phone"></i>{{ $sett->phone }}</li>
                    </ul>

                </div>
                <!-- contact information -->

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Contact -->
@endsection
