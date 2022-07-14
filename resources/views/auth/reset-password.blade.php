@extends('web.layout')

@section('title')
    @lang('web.forgotpassword')
@endsection

@section('main')
    <!-- Contact -->
    <div id="contact" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- login form -->
                <div class="col-md-6 col-md-offset-3">
                    <div class="contact-form">
                        <h4>@lang('web.resetpassword')?</h4>

                        @include('web.inc.messages')

                        <form method="POST" action="{{ url('/reset-password') }}">
                            @csrf
                            <input class="input" type="email" value="{{ old('email') }}" name="email"
                                placeholder="@lang('web.email')">

                                <input class="input" type="password" name="password"
                                placeholder="@lang('web.password')">

                                <input class="input" type="password" name="password_confirmation "
                                placeholder="@lang('web.password_confirmation')">

                                <input type="hidden" name="token" value="{{request()->route('token')}}">

                            <button type="submit" class="main-button icon-button pull-right">@lang('web.submitBtn')</button>
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
