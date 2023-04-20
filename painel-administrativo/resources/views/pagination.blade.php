<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item {{ ($dados->currentPage() == 1) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $dados->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @for ($i = 1; $i <= $dados->lastPage(); $i++)
            <li class="page-item {{ ($dados->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $dados->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item {{ ($dados->currentPage() == $dados->lastPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $dados->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
