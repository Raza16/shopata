
              <div class="pagination__wrapper">
                @if ($paginator->hasPages())
                  <ul class="pagination">
                    @if ($paginator->onFirstPage())
                        {{-- <li class="disabled"><span>← Previous</span></li> --}}
                        <li class="disabled"><a class="prev"><span>❮</span></a></li>
                      @else
                        <li><a href="{{ $paginator->previousPageUrl() }}" class="prev" title="previous page" rel="prev">❮</a></li>
                        {{-- <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li> --}}
                    @endif
                    @foreach ($elements as $element)
       
                      @if (is_string($element))
                          <li class="disabled"><span>{{ $element }}</span></li>
                      @endif
                    
                      @if (is_array($element))
                          @foreach ($element as $page => $url)
                              @if ($page == $paginator->currentPage())
                                  <li class="active"><a class="active"><span>{{ $page }}</span></a></li>
                              @else
                                  <li><a href="{{ $url }}">{{ $page }}</a></li>
                              @endif
                          @endforeach
                      @endif

                    @endforeach

                    @if ($paginator->hasMorePages())
                        <li><a href="{{ $paginator->nextPageUrl() }}" class="next" title="next page" rel="next">❯</a></li>
                      @else
                        <li class="disabled"><span>❯</span></li>
                    @endif
                  </ul>
                @endif
              </div>