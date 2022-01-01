@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <ul>
            <li class="page-item">
                {!! __('pagination.previous') !!}
            </li>
        @else
        <li class="page-item">
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link">
                {!! __('pagination.previous') !!}
            </a>
        </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link">
                {!! __('pagination.next') !!}
            </a>
        </li>
        @else
            <li class="page-item">
                {!! __('pagination.next') !!}
            </li>
        @endif
    </ul>
    </nav>


@endif
