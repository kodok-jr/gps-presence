@if (isset($edit))
    @can($edit['gate'])
        <a href="{{ $edit['url'] }}" class="btn btn-link btn-link-custom"><i class="mdi mdi-square-edit-outline"></i></a>
    @endcan
@endif

@if (isset($destroy))
    @can($destroy['gate'])
        <a href="{{ $destroy['url'] }}" class="btn btn-link btn-link-custom text-danger" data-toggle="modal" data-target="#{{ Str::slug($destroy['url']) }}"><i class="mdi mdi-trash-can-outline"></i></a>
    @endcan

    <div class="modal fade" id="{{ Str::slug($destroy['url']) }}" tabindex="-1" role="dialog" aria-labelledby="{{ Str::slug($destroy['url']) }}" aria-modal="true" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            {!! Form::open(['url' => $destroy['url'], 'method' => 'DELETE']) !!}

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle2">{{ __('dashboard.content.title.delete.header') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>{{ __('dashboard.content.title.delete.body') }}</h5>
                <p>
                    {{ __('dashboard.content.title.delete.text') }}
                </p>
            </div>
            <div class="modal-footer">
                {!! Form::button('<i class="mdi mdi-undo-variant"></i> '.__('dashboard.content.title.delete.buttons.no').'', ['type' => 'submit', 'class' => 'btn btn-secondary btn-sm', 'data-dismiss' => 'modal']) !!}
                {!! Form::button('<i class="mdi mdi-trash-can-outline"></i> '.__('dashboard.content.title.delete.buttons.yes').'', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>
@endif

@if (isset($show))
    @can($show['gate'])
        <a href="{{ $show['url'] }}" class="btn btn-link pl-0 text-info"><i class="mdi mdi-account-key btn-link-custom" style="vertical-align: middle"></i> {{ $show['name'] }}</a>
    @endcan
@endif
