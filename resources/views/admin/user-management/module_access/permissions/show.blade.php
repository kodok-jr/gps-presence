<x-larapattern-layout>

    <x-slot name="title">
        {{ __('Assign Permission') }}
    </x-slot>

    <x-larapattern-card class="col-12" type="center">

        <x-slot name="title">
            {{ __('Assign Permission') }}
        </x-slot>

        <x-slot name="form">
            {!! Form::open(['url' => route('administrator.management.access.permissions.update', $role->uuid), 'method' => 'put', 'id' => 'permissions-form']) !!}

                @php
                    $permissions = $role->gates;
                    $view_menu = function($menus) use (&$view_menu, $permissions) {
                        $html = '';
                        foreach ($menus as $key => $menu) {
                            $html .= view('admin.user-management.module_access.permissions.partials._menus', [
                                'menu' => $menu,
                                'permissions' => $permissions,
                                'view_menu' => $view_menu
                            ]);
                        }

                        return $html;
                    }
                @endphp


                <strong>{{ __('Main Menu') }} <sup>({{ __('Sidebar') }})</sup></strong>
                <hr>
                <ul class="list-permissions">
                    {!! $view_menu($menu->sidebar) !!}
                </ul>

                <hr>
                <strong>{{ __('Top Righ Menu') }}</strong>
                <hr>
                <ul class="list-permissions">
                    {!! $view_menu($menu->top_right) !!}
                </ul>

                <div class="text-right">
                    <br/><hr/>
                    <a href="{{ route('administrator.management.access.roles.index') }}" class="btn btn-secondary btn-sm"><i class="mdi mdi-undo-variant"></i> {{ __('Cancel') }}</a>
                    {!! Form::button('<i class="mdi mdi-content-save"></i> '.__('Save Permissions').'', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']) !!}
                </div>

            {!! Form::close() !!}
        </x-slot>

    </x-larapattern-card>

</x-larapattern-layout>
