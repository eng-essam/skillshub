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
                        <h4>@lang('web.forgotpassword')?</h4>

                        @include('web.inc.messages')

                        <form method="POST" action="{{ url('/forgot-password') }}">
                            @csrf
                            <input class="input" type="email" value="{{ old('email') }}" name="email"
                                placeholder="@lang('web.email')">

                            <button type="submit" class="main-button icon-button pull-right">@lang('web.send')</button>
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
