<div class="row {{ $typeRow() }}">
    <div {{ $attributes->merge(['class' => '']) }}>
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <h2>{{ $title ?? null }}</h2>

                {!! $buttons ?? null !!}

                {{ $required ?? null }}
            </div>

            <div class="card-body">
                {{ $table ?? null }}

                {{ $form ?? null }}
            </div>
        </div>
    </div>

    {!! $div_no_gutters ?? null !!}
</div>
