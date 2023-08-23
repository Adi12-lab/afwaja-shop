<div>
    @if ($paginator->hasPages())
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : ($this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1))

        <div class="ltn__pagination-area text-center">
            <div class="ltn__pagination">
                <ul>
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li aria-disabled="true" aria-label="@lang('pagination.previous')" aria-label="@lang('pagination.previous')">
                            <i class="fas fa-angle-double-left text-secondary"></i>
                        </li>
                    @else
                        <li>
                            <a 
                                dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                                wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                                rel="prev" aria-label="@lang('pagination.previous')">
                                <i class="fas fa-angle-double-left"></i>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li aria-disabled="true">
                                <a>{{ $element }}</a>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active"
                                        wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}"
                                        aria-current="page">
                                        <span>{{ $page }}</span> <!-- Harus span -->
                                    </li>
                                @else
                                    <li
                                        wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}">
                                        <a
                                            wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li>
                            <a  
                                dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                                wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                                rel="next" aria-label="@lang('pagination.next')">
                                <i class="fas fa-angle-double-right"></i>
                            </a>
                        </li>
                    @else
                        <li aria-disabled="true" aria-label="@lang('pagination.next')">
                            <i class="fas fa-angle-double-right text-secondary"></i>
                        </li>
                    @endif
                </ul>

            </div>
        </div>
    @endif
</div>

