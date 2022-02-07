@if($paginator->hasPages())
<nav>
    <ul class="pagination pagination-md justify-content-center">
        @if($paginator->onFirstPage())

        @else
            <li class="page-item"><a class="page-link" href="{{$paginator->previousPageUrl()}}"><i class="fa fa-angle-double-left"></i></a></li>
        @endif

        @foreach($elements as $element)
            @if(is_array($element))
                @foreach($element as $page=>$url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item disabled"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                @endforeach
            @endif
        @endforeach

        @if($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a></li>
        @endif
    </ul>
</nav>
@endif
