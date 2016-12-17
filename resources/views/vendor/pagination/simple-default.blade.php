@if ($paginator->hasPages())
    <ul class="pagination pagination-rose">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span><i class="material-icons">navigate_before</i></span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="material-icons">navigate_before</i></a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="material-icons">navigate_next</i></a></li>
        @else
            <li class="disabled"><span><i class="material-icons">navigate_next</i></span></li>
        @endif
    </ul>
@endif
