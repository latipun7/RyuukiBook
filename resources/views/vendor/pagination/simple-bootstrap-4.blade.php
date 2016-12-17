@if ($paginator->hasPages())
    <ul class="pagination pagination-rose">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link"><i class="material-icons">navigate_before</i></span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="material-icons">navigate_before</i></a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="material-icons">navigate_next</i></a></li>
        @else
            <li class="page-item disabled"><span class="page-link"><i class="material-icons">navigate_next</i></span></li>
        @endif
    </ul>
@endif
