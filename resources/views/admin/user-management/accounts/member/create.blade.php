<x-larapattern-layout>

    <x-slot name="title">
        {{ __('dashboard.content.title.create.user') }}
    </x-slot>

    <x-larapattern-card class="col-6" type="center">

        <x-slot name="required">
            <p> {{ __('dashboard.content.required') }} ( <strong class="text-danger">*</strong> )</p>
        </x-slot>

        <x-slot name="form">
            {!! Form::open(['url' => route('administrator.management.accounts.student.store'), 'method' => 'post', 'id' => 'member-form']) !!}

                @include('admin.user-management.accounts.member._partials.form', ['user' => (new App\Models\User()), 'edited' => false])

            {!! Form::close() !!}
        </x-slot>

    </x-larapattern-card>


    @push('scripts')
        {!! JsValidator::formRequest('App\Http\Requests\Administrator\UserManagement\Accounts\MemberStoreRequest', '#member-form') !!}
    @endpush
</x-larapattern-layout>
