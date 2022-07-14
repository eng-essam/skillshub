@if ($paginator->hasPages())
    <!--pagination -->
    <div class="col-md-12">
        <div class="post-pagination">
            {{--Start Button Next--}}
            @if($paginator->onFirstPage())
                <a href="#" class="btn disabled pagination-back pull-left">@lang('web.back')</a>
            @else
                {{--Array Of Links--}}
                <a href="{{$paginator->previousPageUrl()}}" class="pagination-back pull-left">@lang('web.back')</a>
            @endif
            {{--End Button Next--}}
            <ul class="pages">
                {{--Array Of Links--}}
                @foreach($elements as $element)
                    @if(is_array($element))
                        @foreach($element as $page => $url)
                            @if($page == $paginator->currentPage())
                                <li class="active">{{$page}}</li>
                            @else
                                <li><a href="{{$url}}">{{$page}}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </ul>
            {{--buttom Back--}}
            @if($paginator->hasMorePages())
                <a href="{{$paginator->nextPageUrl()}}" class="pagination-next pull-right">@lang('web.next')</a>
            @else
                <a href="#" class="btn disabled pagination-next pull-right">@lang('web.next')</a>
            @endif

            {{--End Button Back--}}

        </div>
    </div>
    <!-- pagination -->
@endif











