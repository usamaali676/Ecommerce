@if ($paginator->hasPages())
    @if ($paginator->onFirstPage())
    <li class="page-item disabled">
        <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
    </li>
        {{-- <li class="disabled"><span>← Previous</span></li> --}}
    @else
    <li class="page-item">
        <a class="page-link page-link-btn" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="icon-angle-left"></i></a>
    </li>
        {{-- <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li> --}}
    @endif
    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="page-item active">
                    <a class="page-link" >{{ $page }}<span class="sr-only">{{ $page }}</span></a>
                </li>
                @else
                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                {{-- <li class="page-item active">
                    <a class="page-link" href="{{ $url }}">1 <span class="sr-only">{{ $page }}</span></a>
                </li> --}}
                @endif
            @endforeach
        @endif
    @endforeach
    @if ($paginator->hasMorePages())
    <li class="page-item">
        <a class="page-link page-link-btn" href="{{ $paginator->nextPageUrl() }}"><i class="icon-angle-right"></i></a>
    </li>
    @else
    <li class="page-item disabled">
        <a class="page-link page-link-btn" href="{{ $paginator->nextPageUrl() }}"><i class="icon-angle-right"></i></a>
    </li>

    @endif

@endif
