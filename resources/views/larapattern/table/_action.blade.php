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

{{-- @if (isset($approval))
    @can($approval['gate'])
        @if ($approval['status'] == 'rejected')
            <a href="{{ $approval['url'] }}" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#{{ Str::slug($approval['url']) }}"><i class="mdi mdi-repeat"></i> Cancel</a>
        @endif

        @if ($approval['status'] == 'pending')
        <a href="{{ $approval['url'] }}" class="btn btn-sm btn-success" data-toggle="modal" data-target="#{{ Str::slug($approval['url']) }}" data-whatever="approved"><i class="mdi mdi-check-all"></i> Approve</a>
        <a href="{{ $approval['url'] }}" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#{{ Str::slug($approval['url']) }}" data-whatever="rejected"><i class="mdi mdi-close-network"></i> Reject</a>
        @endif

        <div class="modal fade" id="{{ Str::slug($approval['url']) }}" tabindex="-1" role="dialog" aria-labelledby="{{ Str::slug($approval['url']) }}" aria-modal="true" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    {!! Form::model($approval['data'], ['url' => $approval['url'], 'method' => 'put', 'id' => 'user-form']) !!}

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle2">Confirm Approval</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <h5>{{ __('dashboard.content.title.delete.body') }}</h5>
                            <p>
                                {{ __('dashboard.content.title.delete.text') }}
                            </p>
                        </div>
                        <div class="modal-footer">
                            {!! Form::button('<i class="mdi mdi-undo-variant"></i> '.__('dashboard.content.title.delete.buttons.no').'', ['type' => 'submit', 'class' => 'btn btn-secondary btn-sm', 'data-dismiss' => 'modal']) !!}
                            {!! Form::button('<i class="mdi mdi-trash-can-outline"></i> '.__('dashboard.content.title.delete.buttons.yes').'', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'name' => $approval['status']]) !!}
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    @endcan
@endif --}}

@if (isset($show))
    @can($show['gate'])
        <a href="{{ $show['url'] }}" class="btn btn-link pl-0 text-info"><i class="mdi mdi-account-key btn-link-custom" style="vertical-align: middle"></i> {{ $show['name'] }}</a>
    @endcan
@endif

@if (isset($approved))
    @if ($approved['status'] == 'pending')
        @if (isset($approved))
            @can($approved['gate'])
                <a href="{{ $approved['url'] }}" class="btn btn-sm btn-success" data-toggle="modal" data-target="#{{ Str::slug($approved['url']) }}" data-whatever="approved"><i class="mdi mdi-check-all"></i> Approve</a>

                <div class="modal fade" id="{{ Str::slug($approved['url']) }}" tabindex="-1" role="dialog" aria-labelledby="{{ Str::slug($approved['url']) }}" aria-modal="true" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            {{-- {!! Form::open(['url' => $approved['url'], 'method' => 'PUT']) !!} --}}
                            {!! Form::model($approved['data'], ['url' => $approved['url'], 'method' => 'put', 'id' => 'user-form']) !!}

                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle2">Confirm Approval</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <h5>{{ __('dashboard.content.title.delete.body') }}</h5>
                                    <p>
                                        Want to approve this absence..!
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    {!! Form::button('<i class="mdi mdi-undo-variant"></i> '.__('dashboard.content.title.delete.buttons.no').'', ['type' => 'submit', 'class' => 'btn btn-secondary btn-sm', 'data-dismiss' => 'modal']) !!}
                                    {!! Form::button('<i class="mdi mdi-check-all"></i> Approve', ['type' => 'submit', 'class' => 'btn btn-success btn-sm', 'name' => 'status', 'value' => 'approved']) !!}
                                </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            @endcan
        @endif

        @if (isset($rejected))
            @can($rejected['gate'])
                <a href="{{ $rejected['url'] }}" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#{{ Str::slug($rejected['url']."-".$rejected['status']) }}" data-whatever="rejected"><i class="mdi mdi-close-network"></i> Rejec</a>

                <div class="modal fade" id="{{ Str::slug($rejected['url']."-".$rejected['status']) }}" tabindex="-1" role="dialog" aria-labelledby="{{ Str::slug($rejected['url']) }}" aria-modal="true" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            {{-- {!! Form::open(['url' => $rejected['url'], 'method' => 'PUT']) !!} --}}
                            {!! Form::model($rejected['data'], ['url' => $rejected['url'], 'method' => 'put', 'id' => 'user-form']) !!}

                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle2">Confirm Approval</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <h5>{{ __('dashboard.content.title.delete.body') }}</h5>
                                    <p>
                                        Want to reject this absence..!
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    {!! Form::button('<i class="mdi mdi-undo-variant"></i> '.__('dashboard.content.title.delete.buttons.no').'', ['type' => 'submit', 'class' => 'btn btn-secondary btn-sm', 'data-dismiss' => 'modal']) !!}
                                    {!! Form::button('<i class="mdi mdi-check-all"></i> Reject', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'name' => 'status', 'value' => 'rejected']) !!}
                                </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            @endcan
        @endif
    @endif
@endif

@if (isset($pending))
    @if ($pending['status'] == 'rejected')
        <a href="{{ $pending['url'] }}" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#{{ Str::slug($pending['url']."-pending") }}"><i class="mdi mdi-repeat"></i> Cancel</a>

        <div class="modal fade" id="{{ Str::slug($rejected['url']."-pending") }}" tabindex="-1" role="dialog" aria-labelledby="{{ Str::slug($rejected['url']) }}" aria-modal="true" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    {{-- {!! Form::open(['url' => $rejected['url'], 'method' => 'PUT']) !!} --}}
                    {!! Form::model($rejected['data'], ['url' => $rejected['url'], 'method' => 'put', 'id' => 'user-form']) !!}

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle2">Confirm Approval</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <h5>{{ __('dashboard.content.title.delete.body') }}</h5>
                            <p>
                                Want to cancel approval..!
                            </p>
                        </div>
                        <div class="modal-footer">
                            {!! Form::button('<i class="mdi mdi-undo-variant"></i> '.__('dashboard.content.title.delete.buttons.no').'', ['type' => 'submit', 'class' => 'btn btn-secondary btn-sm', 'data-dismiss' => 'modal']) !!}
                            {!! Form::button('<i class="mdi mdi-refresh"></i> Return', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm', 'name' => 'status', 'value' => 'pending']) !!}
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    @endif
@endif
