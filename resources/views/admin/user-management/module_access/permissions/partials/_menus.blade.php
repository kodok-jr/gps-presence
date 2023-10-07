@php
    $rand = rand();
@endphp

<li style="border-left: 1px solid #ddd;">
    <label class="control outlined control-checkbox checkbox-{{ in_array($menu['gate'], $permissions) ? 'info' : 'danger' }} mb-1">
        <strong>{{ $menu['name'] ?? $menu['title'] }}</strong>
        <input type="checkbox" name="gates[]" value="{{ $menu['gate'] }}" id="{{ $rand }}" {{ in_array($menu['gate'], $permissions) ? 'checked' : null }}>
        <p><code class="font-size-12">{{ $menu['description'] }}</code></p>
        <div class="control-indicator ml-1"></div>
    </label>

    @if (isset($menu['submenus']))
        <ul class="list-permissions-submenus">
            {!! $view_menu($menu['submenus']) !!}
        </ul>
    @endif

    @if(isset($menu['permissions']) && count($menu['permissions']) > 0)
        <button type="button" class="btn btn-light btn-sm ml-5 mb-3 text-left" data-toggle="collapse" data-target="#collapse-{{ $rand }}" aria-expanded="false" style="width: 75%">
            <strong>Open Permission <i class="mdi mdi-download float-right"></i></strong>
        </button>
        <ul class="list-permissions-submenus-collapse collapse mb-3" id="collapse-{{ $rand }}">
            {!! $view_menu($menu['permissions']) !!}
        </ul>
    @endif
</li>
