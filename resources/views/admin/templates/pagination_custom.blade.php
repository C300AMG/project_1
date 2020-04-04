@if ($paginator->hasPages())
<!-- Pagination -->
<nav aria-label="Page navigation example">
    <ul class="pagination zvn-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="disabled">
            <span><strong>Trở về</strong></span>
        </li>
        @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}">
                <span><strong>Trở về</strong></span>
            </a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active"><span>{{ $page }}</span></li>
        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
        <li><a href="{{ $url }}">{{ $page }}</a></li>
        @elseif ($page == $paginator->lastPage() - 1)
        <li class="disabled"><span><i class="fa fa-ellipsis-h"></i></span></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}">
                <span><strong>Kế tiếp</strong></span>
            </a>
        </li>
        @else
        <li class="disabled">
            <span><strong>Kế tiếp</strong></span>
        </li>
        @endif
    </ul>
</nav>
<!-- Pagination -->
@endif