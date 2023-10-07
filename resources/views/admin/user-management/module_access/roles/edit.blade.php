<x-larapattern-layout>

    <x-slot name="title">
        {{ __('Update Role') }}
    </x-slot>

    <x-larapattern-card class="col-6" type="center">

        <x-slot name="required">
            <p> {{ __('Required Information') }} ( <strong class="text-danger">*</strong> )</p>
        </x-slot>

        <x-slot name="form">
            {!! Form::model($item, ['url' => route('administrator.management.access.roles.update', $item->uuid), 'method' => 'put', 'id' => 'role-form']) !!}

                @include('admin.user-management.module_access.roles.partials._form', ['fill' => ($item), 'edited' => true])

            {!! Form::close() !!}
        </x-slot>

    </x-larapattern-card>


    @push('scripts')
        {!! JsValidator::formRequest('App\Http\Requests\Administrator\UserManagement\ModuleAccess\RoleRequest', '#role-form') !!}
    @endpush
</x-larapattern-layout>
