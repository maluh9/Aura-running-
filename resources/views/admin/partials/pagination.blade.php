@if ($paginator->hasPages())

    @php
        $currentPage = $paginator->currentPage();
        $lastPage = $paginator->lastPage();

        $startPage = max(1, $currentPage - 2);
        $endPage = min($lastPage, $currentPage + 2);
    @endphp


    <nav class="admin-custom-pagination">


        {{-- ANTERIOR --}}

        @if ($paginator->onFirstPage())

            <span class="admin-page-link disabled">

                <i class="fa-solid fa-chevron-left"></i>

            </span>

        @else

            <a
                href="{{ $paginator->previousPageUrl() }}"
                class="admin-page-link"
                title="Página anterior"
            >

                <i class="fa-solid fa-chevron-left"></i>

            </a>

        @endif



        {{-- PRIMEIRA PÁGINA --}}

        @if ($startPage > 1)

            <a
                href="{{ $paginator->url(1) }}"
                class="admin-page-link"
            >
                1
            </a>

            @if ($startPage > 2)

                <span class="admin-page-dots">
                    ...
                </span>

            @endif

        @endif



        {{-- PÁGINAS --}}

        @for ($page = $startPage; $page <= $endPage; $page++)

            @if ($page == $currentPage)

                <span class="admin-page-link active">

                    {{ $page }}

                </span>

            @else

                <a
                    href="{{ $paginator->url($page) }}"
                    class="admin-page-link"
                >

                    {{ $page }}

                </a>

            @endif

        @endfor



        {{-- ÚLTIMA PÁGINA --}}

        @if ($endPage < $lastPage)

            @if ($endPage < $lastPage - 1)

                <span class="admin-page-dots">
                    ...
                </span>

            @endif

            <a
                href="{{ $paginator->url($lastPage) }}"
                class="admin-page-link"
            >

                {{ $lastPage }}

            </a>

        @endif



        {{-- PRÓXIMA --}}

        @if ($paginator->hasMorePages())

            <a
                href="{{ $paginator->nextPageUrl() }}"
                class="admin-page-link"
                title="Próxima página"
            >

                <i class="fa-solid fa-chevron-right"></i>

            </a>

        @else

            <span class="admin-page-link disabled">

                <i class="fa-solid fa-chevron-right"></i>

            </span>

        @endif


    </nav>

@endif