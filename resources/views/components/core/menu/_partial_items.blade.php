<li class="has-sub {{ request()->is($menu['active_url']) ? 'active expand' : null }} {{ request()->is(config('larapattern.prefix', 'administrator')."/".$menu['is_active']) ? 'active' : null }}">

    @php
        $router = 'javascript:void(0);';
        if ($menu['route']) {
            $route = $menu['route'][0];
            $params = $menu['route'][1];
            $router = route($route, $params);
        }
    @endphp

    <a class="sidenav-item-link" href="{{ $router }}" @if (is_null($menu['route'])) data-toggle="collapse" data-target="#{{ Str::slug($menu['name'], '-') }}" aria-expanded="false" aria-controls="{{ $menu['name'] }}" @endif>
        @if (isset($menu['icon']))
            <i class="{{ $menu['icon'] }}"></i>
        @endif
        <span class="nav-text">{{ $menu['name'] }}</span>
        @if (isset($menu['submenus'])) <b class="caret"></b> @endif
    </a>

    @if (isset($menu['submenus']))
        <ul class="collapse {{ request()->is($menu['active_url']) ? 'show' : null }}" id="{{ Str::slug($menu['name'], '-') }}" data-parent="#sidebar-menu">
            <div class="sub-menu">
                {!! $view_menu($menu['submenus']) !!}
            </div>
        </ul>
    @endif

</li>
