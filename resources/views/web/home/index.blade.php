@extends('web.layout')

@section('title')
    Home Page
@endsection

@section('main')
    <!-- Home -->
    <div id="home" class="hero-area">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('web/img/home-background.jpg') }})">
        </div>
        <!-- /Backgound Image -->

        <div class="home-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="white-text">@lang('web.heroTitle')</h1>
                        @guest
                            <p class="lead white-text">@lang('web.heroDesc')</p>
                            <a class="main-button icon-button" href="{{ url('login') }}">@lang('web.getStartedBtn')!</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Home -->

    <!-- Courses -->
    <div id="courses" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">
                <div class="section-header text-center">
                    <h2>@lang('web.PopularExamsTitle')</h2>
                    <p class="lead">@lang('web.PopularExamsDesc').</p>
                </div>
            </div>
            <!-- /row -->

            <!-- courses -->
            <div id="courses-wrapper">

                <!-- row -->
                <div class="row">

                    <!-- single course -->
                    @foreach ($exams as $exam)
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="course">
                                <a href="{{ url("exam/show/$exam->id") }}" class="course-img">
                                    <img src="{{ asset("uploads/$exam->img") }}" alt="">
                                    <i class="course-link-icon fa fa-link"></i>
                                </a>
                                <a class="course-title" href="{{ url("exam/show/$exam->id") }}">{{ $exam->name() }}</a>
                                <div class="course-details">
                                    <span class="course-category"><a
                                            href='{{ url('categories/show/' . $exam->skill->cat->id) }}'>{{ $exam->skill->cat->name() . ' | ' }}</a></span>
                                    <span class="course-category"><a
                                            href='{{ url('skills/show/' . $exam->skill->id) }}'>{{ $exam->skill->name() }}</a></span>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- /single course -->

                </div>
                <!-- /row -->

            </div>
            <!-- /courses -->

            <div class="row">
                <div class="center-btn">
                    {{ $exams->links('web.inc.paginator') }}
                </div>
            </div>

        </div>
        <!-- container -->

    </div>
    <!-- /Courses -->


    <!-- Contact CTA -->
    <div id="contact-cta" class="section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('web/img/cta.jpg') }})"></div>
        <!-- Backgound Image -->

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <div class="col-md-8 col-md-offset-2 text-center">
                    <h2 class="white-text">@lang('web.contact')</h2>
                    <p class="lead white-text">@lang('web.contactDesc').</p>
                    <a class="main-button icon-button" href="{{ url('contact') }}">@lang('web.contactBtn')</a>
                </div>

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Contact CTA -->
@endsection
