@extends('web.layout')

@section('title')
    @lang('web.verify')
@endsection

@section('main')

<div class="alert alert-success">
    @lang('web.sendsuccessfully')
</div>
<div id="contact" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="contact-form">
                    <form method="POST" action="{{url('/email/verification-notification')}}">
                        @csrf
                        <button type="submit" class="main-button icon-button pull-right">@lang('web.resend')</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
