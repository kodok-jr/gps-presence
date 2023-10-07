<x-larapattern-layout>

    <x-slot name="title">
        {{ __('dashboard.content.title.create.role') }}
    </x-slot>

    <x-larapattern-card class="col-6" type="center">

        <x-slot name="required">
            <p> {{ __('dashboard.content.required') }} ( <strong class="text-danger">*</strong> )</p>
        </x-slot>

        <x-slot name="form">
            {!! Form::open(['url' => route('administrator.management.access.roles.store'), 'method' => 'post', 'id' => 'role-form']) !!}

                @include('admin.user-management.module_access.roles.partials._form', ['fill' => (new App\Models\Role()), 'edited' => false])

            {!! Form::close() !!}
        </x-slot>

    </x-larapattern-card>


    @push('scripts')
        {!! JsValidator::formRequest('App\Http\Requests\Administrator\UserManagement\ModuleAccess\RoleRequest', '#role-form') !!}
    @endpush
</x-larapattern-layout>
