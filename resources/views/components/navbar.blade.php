<!-- Navigation -->
<nav id="nav">
    <ul class="main-menu nav navbar-nav navbar-right">
        <li><a href="{{ url('/') }}">@lang('web.home')</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false">@lang('web.cats') <span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach ($cats as $cat)
                    <li><a href='{{ url("categories/show/$cat->id") }}'>{{ $cat->name() }}</a></li>
                @endforeach

            </ul>
        </li>
        <li><a href="{{ url('contact') }}">@lang('web.contact')</a></li>

        @guest
            <li><a href="{{ url('login') }}">@lang('web.signin')</a></li>
            <li><a href="{{ url('register') }}">@lang('web.signup')</a></li>
        @endguest

        @auth
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    @lang('web.logout')
                </a>
            </li>

            <form style="display: none" id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        @endauth

        @if (App::getLocale() == 'ar')
            <li><a href="{{ url('lang/set/en') }}">EN</a></li>
        @else
            <li><a href="{{ url('lang/set/ar') }}">ع</a></li>
        @endif


    </ul>
</nav>
<!-- /Navigation -->
