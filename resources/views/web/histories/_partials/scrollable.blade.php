@if ($histories->isEmpty())
    <div class="font-icon-wrapper float-left mr-3 mb-3">
        <div class="loader-wrapper d-flex justify-content-center align-items-center">
            <div class="loader">
                <div class="ball-clip-rotate-multiple">
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <p>No any histories for this time..!</p>
    </div>
@endif
@foreach ($histories as $history)
    <li class="list-group-item p-2 pl-3">
        <div class="widget-content p-0">
            <div class="widget-content-wrapper">
                <div class="widget-content-left mr-3 text-center">
                    <strong class="text-muted">{{ date('D', strtotime($history->presence_date)) }}</strong>
                    <div class="icon-wrapper icon-wrapper-custom border-light rounded m-0 text-muted">
                        <strong class="text-muted">{{ date('d', strtotime($history->presence_date)) }}</strong>
                        <p><small>{{ date('M', strtotime($history->presence_date)) }}</small></p>
                    </div>
                </div>
                <div class="widget-content-left">
                    <div class="widget-heading">
                        <i class="header-icon lnr-enter icon-gradient bg-happy-itmeo"> </i>
                        {{ $history->time_in }}
                        <i class="header-icon pe-7s-more icon-gradient bg-plum-plate"> </i>
                        <i class="header-icon lnr-exit icon-gradient bg-mean-fruit"> </i>
                        @if ($history->time_out != null)
                            {{ $history->time_out }}
                        @else
                            <code>Belum Absen</code>
                        @endif
                    </div>
                    <div class="widget-subheading" style="line-height: 0.8rem !important;">
                        <small class="pl-1">10 min toleransi terlambat</small>
                    </div>
                </div>
            </div>
        </div>
    </li>
@endforeach
