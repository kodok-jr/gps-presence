<div class="form-row">
    <div class="col-md-12 mb-3">
        @if(isset($label_name))
            <label for="{{ $label_id ?? null }}">{{ $label_name }}</label>
            @if(isset($required) && $required)
                <strong class="text-danger font-size-11">*</strong>
            @else
                <sup class="text-muted">(Optional)</sup>
            @endif
        @endif

        {{ $slot }}

        @if (isset($messages))
            <ul>
                @foreach ($messages as $msg)
                    @if (in_array($msg))
                        @foreach ($msg as $ms)
                            <li>{{ $ms }}</li>
                        @endforeach
                    @else
                        <li class="text-danger">{{ $msg }}</li>
                    @endif
                @endforeach
            </ul>
        @endif
        {{-- <div class="invalid-feedback">
            Looks good!
        </div> --}}
    </div>
</div>
