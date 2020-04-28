@if ($paginator->hasPages())
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="pagination-previous is-disabled">&lsaquo;</a>
        @else
            <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a>
        @endif
        <ul class="pagination-list">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><a class="pagination-link is-disabled" aria-label="Goto page 1">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="pagination-link is-current" aria-label="{{ 'Goto page ' . $page }}">{{ $page }}</a></li>
                        @else
                            <li><a class="pagination-link" href="{{ $url }}" aria-label="{{ 'Goto page ' . $page }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a>
        @else
            <a class="pagination-next is-disabled">&rsaquo;</a>
        @endif
    </nav>
@endif
