
@if ($paginator->hasPages())
        <div class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <a href="#"><i class="fas fa-chevron-left"></i></a>
            @else
            <a href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        <a href="#"><span class="pages">{{ $page }}</span></a>
                        @else
                        <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())   
            <a href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
            @else
            
            <a href="#"><i class="fas fa-chevron-right"></i></a>
            @endif
            </div>
        @endif

