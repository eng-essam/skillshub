@extends('web.layout')

@section('title')
    @lang('web.profile')
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
                        <li>@lang('web.profile')</li>
                    </ul>
                    <h1 class="white-text">@lang('web.profile')</h1>

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

            <table class="table">
                <thead>
                    <tr style="font-weight: bold;color: black;font-size: 20px">
                        <th scope="col">#</th>
                        <th scope="col">@lang('web.exam-name')</th>
                        <th scope="col">@lang('web.exam-score')</th>
                        <th scope="col">@lang('web.exam-time')</th>
                        <th scope="col">@lang('web.exam-date')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Auth::user()->exams as $index => $exam)
                        <tr style="color: black;font-size: 18px">
                            <th scope="row">{{$index + 1 }}</th>
                            <td><a href="{{ url("exam/show/$exam->id") }}">{{ $exam->name() }}</td></a>
                            <td>{{ $exam->pivot->score }} %</td>
                            <td>{{ $exam->pivot->time_mins }} m</td>
                            <td>{{ carbon\carbon::parse($exam->pivot->created_at)->format('d M, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>



    </div>
    <!-- /Contact -->
@endsection
