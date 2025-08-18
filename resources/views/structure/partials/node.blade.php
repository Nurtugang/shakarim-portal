@switch($node->layout_type)
        @case('center_with_sides')
            @php
                $leftChildren = $node->children->where('position', 'left')->sortBy('sort_order');
                $centerChild = $node->children->firstWhere('position', 'center');
                $rightChildren = $node->children->where('position', 'right')->sortBy('sort_order');
            @endphp
            <li>
        <div class="structure-header justify-content-center align-items-center">
            <div class="d-flex flex-column align-items-center">
                @foreach ($leftChildren as $child_l)
                    <a href="{{ $child_l->getUrl() }}"
                    @class([
    'pb-2 w-100 px-4 position-relative',
    'top-inline' => $loop->first,
    'center-inline' => !$loop->first && !$loop->last,
    'bottom-inline' => $loop->last,
])>
                        <button style="z-index:10" class="position-relative main-button d-block w-100">{{ $child_l->{'title_'.app()->getLocale()} }}</button>
                    </a>
                @endforeach
            </div>
                <a class="d-block line position-relative" style="z-index:10" href="{{ $node->getUrl() }}">
                    <button class="position-relative item green-button">{{ $node->{'title_'.app()->getLocale()} }}</button>
                </a>
            <div class="d-flex flex-column align-items-center">
                @foreach ($rightChildren as $child_r)
                 <a
                  @class([
    'pb-2 w-100 px-4 position-relative',
    'top-inline-right' => $loop->first,
    'center-inline-right' => !$loop->first && !$loop->last,
    'bottom-inline-right' => $loop->last,
]) href="{{ $child_r->getUrl() }}">
                    <button style="z-index:10" class="position-relative main-button d-block w-100">{{ $child_r->{'title_'.app()->getLocale()} }}</button>
                </a>
                @endforeach
            </div>
        </div>
    </li>
    @if ($centerChild)
        @include('structure.partials.node', ['node' => $centerChild])
    @endif
    
        @break

        @case('horizontal_row')
        @php
                $leftChildren = $node->children->where('position', 'left')->sortBy('sort_order');
                $centerChild = $node->children->firstWhere('position', 'center');
                $rightChildren = $node->children->where('position', 'right')->sortBy('sort_order');
            @endphp
        <li>
        <div class="structure-header justify-content-center align-items-center">
            <div class="d-flex flex-column align-items-center">
                @foreach ($leftChildren as $child_l)
                    <a href="{{ $child_l->getUrl() }}" @class([
    'pb-2 w-100 position-relative' => count($leftChildren) ===1,
])>
                        <button class="main-button d-block w-100">{{ $child_l->{'title_'.app()->getLocale()} }}</button>
                    </a>
                @endforeach
            </div>
                <a class="d-block line position-relative" style="z-index:10" href="{{ $node->getUrl() }}">
                    <button class="position-relative item green-button">{{ $node->{'title_'.app()->getLocale()} }}</button>
                </a>
            <div class="d-flex flex-column align-items-center">
                @foreach ($rightChildren as $child_r)
                 <a @class([
    'pb-2 w-100 position-relative' => count($leftChildren) ===1,
]) href="{{ $child_r->getUrl() }}">
                    <button style="z-index:10" class="position-relative main-button d-block w-100">{{ $child_r->{'title_'.app()->getLocale()} }}</button>
                </a>
                @endforeach
            </div>
        </div>
    </li>
        <li>
            <ol>
        @foreach ($node->children->where('position', '!=','left')->where('position', '!=','right')->sortBy('sort_order') as $item)
        <li>
                <div>
                    <a href="{{ $item->getUrl() }}"><h2>{{ $item->{'title_'.app()->getLocale()} }}</h2></a>
                </div>
                @if ($item->children->count() > 0)
                <ol>
                    @foreach ($item->children as $child)
                    <li>
                        <div>
                            <a href="{{ $child->getUrl() }}">{{ $child->{'title_'.app()->getLocale()} }}</a>
                        </div> 
                         @if ($child->children->count() > 0)
                <ol>
                    @foreach ($child->children as $child_child)
                    <li>
                        <div>
                            <a href="{{ $child_child->getUrl() }}">{{ $child_child->{'title_'.app()->getLocale()} }}</a>
                        </div>                            
                    </li>
                    @endforeach
                    </ol>
                @endif                           
                    </li>
                    @endforeach
                    </ol>
                @endif
            </li>   
             @endforeach   
        </ol>
        </li>
        @break
        @endswitch