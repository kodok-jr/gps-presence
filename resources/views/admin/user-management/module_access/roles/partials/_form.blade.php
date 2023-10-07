@component(larapattern()->component_path('form_row'), ['label_name' => __('Role Name'), 'label_id' => 'name', 'message' => $errors->first('name'), 'required' => true])

    {{ Form::text('name', null, ['class' => 'form-control form-control-sm role-slug', 'id' => 'name', 'placeholder' => __('Role name')]) }}

@endcomponent

@component(larapattern()->component_path('form_row'), ['label_name' => __('Slug'), 'label_id' => 'slug', 'message' => $errors->first('slug'), 'required' => true])

    {{ Form::text('slug', null, ['class' => 'form-control form-control-sm', 'id' => 'slug', 'placeholder' => __('Slug role name'), 'readonly' => true]) }}

@endcomponent

@component(larapattern()->component_path('form_row'), ['label_name' => __('Description'), 'label_id' => 'description', 'message' => $errors->first('description'), 'required' => false])

    {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => __('Description role'), 'rows' => 4]) }}

@endcomponent

<div class="text-right">
    <br/><hr/>
    <a href="{{ route('administrator.management.access.roles.index') }}" class="btn btn-secondary btn-sm"><i class="mdi mdi-undo-variant"></i> {{ __('dashboard.content.buttons.cancel') }}</a>
    {!! Form::button('<i class="mdi mdi-content-save"></i> '.__('dashboard.content.buttons.submit').'', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']) !!}
</div>
