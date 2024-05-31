<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1" aria-disabled="true">
                <i class='bx bx-chevrons-left bx-fade-left'></i>
            </a>
        </li>
        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            <li class="page-item">
                <a class="page-link   {{ $page == $paginator->currentPage() ? 'active' : '' }}" href="{{ $url }}">{{ $page }}</a>
            </li>
        @endforeach
        <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                <i class='bx bx-chevrons-right bx-fade-right'></i>
            </a>
        </li>
    </ul>
</nav>
