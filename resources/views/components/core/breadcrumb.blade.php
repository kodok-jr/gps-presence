<ol class="breadcrumb breadcrumb-inverse">
    @foreach ($items as $key => $item)
        @if ($loop->last)
            <li class="breadcrumb-item active">
                @if ($loop->first)
                    <span class="mdi mdi-home"></span>
                @endif
                {{ $item['name'] }}
            </li>
        @else
            @if (@file_get_contents($item['url']))
                <li class="breadcrumb-item" id="{{ $item['url'] }}">
                    <a href="{{ $item['url'] }}">
                        @if ($loop->first)
                            <span class="mdi mdi-home"></span>
                        @endif
                        {{ $item['name'] }}
                    </a>
                </li>
            @endif
        @endif
    @endforeach
</ol>
