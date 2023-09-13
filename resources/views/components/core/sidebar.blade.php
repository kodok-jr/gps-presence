@php
    $view_menu = function ($menus) use (&$view_menu, $permissions) {
        $html = '';
        foreach ($menus as $key => $menu) {
            if (in_array($menu['gate'], $permissions)) {
                $html .= view('components.core.menu._partial_items', ['menu' => $menu, 'view_menu' => $view_menu]);
            }
        }
        return $html;
    }
@endphp

{{-- {{ dd($view_menu) }} --}}
<ul class="nav sidebar-inner" id="sidebar-menu">
    <li class="{{ request()->is(config('larapattern.prefix', 'administrator')) ? 'active' : null }}">
        <a class="sidenav-item-link" href="{{ route('administrator.index') }}">
            <i class="mdi mdi-view-dashboard-outline"></i>
            <span class="nav-text">Dashboard</span>
        </a>
    </li>
    {!! $view_menu($menu->sidebar) !!}
</ul>
