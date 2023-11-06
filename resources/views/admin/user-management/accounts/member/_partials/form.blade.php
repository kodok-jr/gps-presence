
@component(larapattern()->component_path('form_row'), ['label_name' => __('Position'), 'label_id' => 'position', 'message' => $errors->first('position'), 'required' => true])

@php
    ($edited) ? $selected = $role_selected : $selected = [];
@endphp
{{ Form::select('position', ['Dosen' => 'Dosen', 'Mahasiswa' => 'Mahasiswa'], null, ['class' => 'form-control select2-position-id', 'id' => 'position', 'placeholder' => '']) }}

@endcomponent

@component(larapattern()->component_path('form_row'), ['label_name' => __('Number ID'), 'label_id' => 'number_id', 'message' => $errors->first('number_id'), 'required' => true])

    {{ Form::text('number_id', old('number_id', $user->name), ['class' => 'form-control form-control-sm', 'id' => 'number_id', 'placeholder' => __('Number ID')]) }}

@endcomponent

@component(larapattern()->component_path('form_row'), ['label_name' => __('Fullname'), 'label_id' => 'name', 'message' => $errors->first('name'), 'required' => true])

    {{ Form::text('name', old('name', $user->name), ['class' => 'form-control form-control-sm', 'id' => 'name', 'placeholder' => __('Fullname')]) }}

@endcomponent

@component(larapattern()->component_path('form_row'), ['label_name' => __('E-mail'), 'label_id' => 'email', 'message' => $errors->first('email'), 'required' => true])

    {{ Form::email('email', old('email', $user->email), ['class' => 'form-control form-control-sm', 'id' => 'email', 'placeholder' => __('e.g: example@mail.com')]) }}

@endcomponent


<div class="text-right">
    <br/><hr/>
    <a href="{{ route('administrator.management.accounts.admin.index') }}" class="btn btn-secondary btn-sm"><i class="mdi mdi-undo-variant"></i> {{ __('dashboard.content.buttons.cancel') }}</a>
    {!! Form::button('<i class="mdi mdi-content-save"></i> '.__('dashboard.content.buttons.submit').'', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']) !!}
</div>
