@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        
        @if($paginator->currentPage() > 3)
            <li class="page-item first-link hidden-xs">
                <a href="{{ $paginator->url(1) }}#search" class="page-link">First</a>
            </li>
        @endif

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())  
            <li class="page-item prev-link disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">Prev</span>
            </li>
        @else
            <li class="page-item prev-link">
                <a href="{{ $paginator->previousPageUrl() }}#search" class="page-link" rel="prev" aria-label="@lang('pagination.previous')">Prev</a>
            </li>
        @endif

        @if($paginator->currentPage() > 4)
            <li class="page-item disabled hidden-xs">
                <span class="page-link">...</span>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                @if ($i == $paginator->currentPage())
                    <li class="page-item active">
                        <span class="page-link">{{ $i }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $paginator->url($i) }}#search" class="page-link">{{ $i }}</a>
                    </li>
                @endif
            @endif
        @endforeach

        @if($paginator->currentPage() < $paginator->lastPage() - 3)
            <li class="page-item disabled hidden-xs">
                <span class="page-link">...</span>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item next-link">
                <a href="{{ $paginator->nextPageUrl() }}#search" rel="next" aria-label="@lang('pagination.next')" class="page-link">Next</a>
            </li>
        @else
            <li class="page-item next-link disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">Next</span>
            </li>
        @endif

        @if($paginator->currentPage() < $paginator->lastPage() - 2)
            <li class="page-item last-link hidden-xs">
                <a href="{{ $paginator->url($paginator->lastPage()) }}#search" class="page-link">Last</a>
            </li>
        @endif
        
    </ul>
@endif