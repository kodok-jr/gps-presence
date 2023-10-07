@component(larapattern()->component_path('form_row'), ['label_name' => __('Fullname'), 'label_id' => 'name', 'message' => $errors->first('name'), 'required' => true])

    {{ Form::text('name', old('name', $user->name), ['class' => 'form-control form-control-sm', 'id' => 'name', 'placeholder' => __('Fullname')]) }}

@endcomponent

@component(larapattern()->component_path('form_row'), ['label_name' => __('E-mail'), 'label_id' => 'email', 'message' => $errors->first('email'), 'required' => true])

    {{ Form::email('email', old('email', $user->email), ['class' => 'form-control form-control-sm', 'id' => 'email', 'placeholder' => __('e.g: example@mail.com')]) }}

@endcomponent

@component(larapattern()->component_path('form_row'), ['label_name' => __('Password'), 'label_id' => 'password', 'message' => $errors->first('password'), 'required' => $edited ? false : true])

    {{ Form::password('password', ['class' => 'form-control form-control-sm', 'id' => 'password', 'placeholder' => '************']) }}

@endcomponent

@if (isset($roles))
    @component(larapattern()->component_path('form_row'), ['label_name' => __('Roles'), 'label_id' => 'role_id', 'message' => $errors->first('roles'), 'required' => true])

        @php
            ($edited) ? $selected = $role_selected : $selected = [];
        @endphp
        {{ Form::select('role_id', $roles->pluck('name', 'id')->all(), $selected, ['class' => 'form-control select2-role-id', 'id' => 'role_id', 'placeholder' => '']) }}

    @endcomponent
@endif


<div class="text-right">
    <br/><hr/>
    <a href="{{ route('administrator.management.accounts.admin.index') }}" class="btn btn-secondary btn-sm"><i class="mdi mdi-undo-variant"></i> {{ __('dashboard.content.buttons.cancel') }}</a>
    {!! Form::button('<i class="mdi mdi-content-save"></i> '.__('dashboard.content.buttons.submit').'', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']) !!}
</div>
