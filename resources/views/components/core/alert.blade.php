@if ($errors->any())

    <div class="alert alert-dismissible fade show alert-danger alert-highlighted" role="alert">
        Woopps..!
        <ul>
            @foreach ($errors->all() as $error)
                <li><span style="font-weight: 200; font-size: 13px;">{{ $error }}</span></li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

@endif

@foreach ($status as $stts)
    @if(session()->has($stts))

        <div class="alert alert-dismissible fade show alert-{{ $stts }} alert-highlighted" role="alert">
            Done..!
            <ul>
                @foreach (session()->get($stts) as $st)
                    <li><span style="font-weight: 200; font-size: 13px;">{{ $st }}</span></li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

    @endif
@endforeach
