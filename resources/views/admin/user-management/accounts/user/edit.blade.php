<x-larapattern-layout>

    <x-slot name="title">
        {{ __('dashboard.content.title.edit.user') }}
    </x-slot>

    <x-larapattern-card class="col-6" type="center">

        <x-slot name="required">
            <p> {{ __('dashboard.content.required') }} ( <strong class="text-danger">*</strong> )</p>
        </x-slot>

        <x-slot name="form">
            {!! Form::model($user, ['url' => route('administrator.management.accounts.admin.update', $user->uuid), 'method' => 'put', 'id' => 'user-form']) !!}

                @include('admin.user-management.accounts.user._partials.form', ['fill' => ($user), 'edited' => true])

            {!! Form::close() !!}
        </x-slot>

    </x-larapattern-card>


    @push('scripts')
        {!! JsValidator::formRequest('App\Http\Requests\Administrator\UserManagement\Accounts\AdminUpdateRequest', '#user-form') !!}
    @endpush
</x-larapattern-layout>
