@extends('layouts.web')

@section('content')
    <div class="app-main__inner">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="main-card mb-3 card custom">
                    <div class="card-header" style="border-radius: 50% !important; justify-content: center; text-transform: capitalize !important; display: flex;">
                        <i class="header-icon pe-7s-display1 icon-gradient bg-plum-plate"> </i>
                        Leaderboards
                    </div>
                    <div class="card-body p-1">
                        <div class="scroll-area-sm scroll-area-sm-sm">
                            <div class="scrollbar-container ps--active-y ps">
                                <ul class="list-group list-group-flush pb-3">
                                    @foreach ($leaderboards as $item)
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img width="45" class="rounded" src="{{ file_exists(storage_path('app/public/avatars/'.$item->name.'.png')) ? asset('storage/avatars/'.$item->name.'.png') : asset('storage/'.$item->avatar) }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{ $item->name }}</div>
                                                        {{-- <div class="widget-subheading opacity-10">
                                                            <span class="pr-2"><b>43</b> Sales</span>
                                                            <span><b class="text-success">$156,24</b> Totals</span>
                                                        </div> --}}
                                                    </div>
                                                    <div class="widget-content-right text-right mr-3">
                                                        <div>
                                                            <b><i class="header-icon lnr-enter icon-gradient bg-happy-itmeo"> </i>{{ $item->time_in }}</b>
                                                        </div>
                                                        @if ($item->time_in > "07:10")
                                                            <small class="pl-1">10 min toleransi terlambat</small>
                                                        @endif
                                                    </div>
                                                    {{-- <div class="widget-content-right">
                                                        <div class="progress-circle-wrapper">
                                                            <div class="circle-progress circle-progress-gradient"><canvas width="104" height="104" style="height: 52px; width: 52px;"></canvas>
                                                                <small><span>72%<span></span></span></small>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    {{-- @foreach ($presence_this_month as $item)
                                        <li class="list-group-item p-2 pl-3">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3 text-center">
                                                        <strong class="text-muted">{{ date('D', strtotime($item->presence_date)) }}</strong>
                                                        <div class="icon-wrapper icon-wrapper-custom border-light rounded m-0 text-muted">
                                                            <strong class="text-muted">{{ date('d', strtotime($item->presence_date)) }}</strong>
                                                            <p><small>{{ date('M', strtotime($item->presence_date)) }}</small></p>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">
                                                            <i class="header-icon lnr-enter icon-gradient bg-happy-itmeo"> </i>
                                                            {{ $item->time_in }}
                                                            <i class="header-icon pe-7s-more icon-gradient bg-plum-plate"> </i>
                                                            <i class="header-icon lnr-exit icon-gradient bg-mean-fruit"> </i>
                                                            @if ($presence_today != null && $item->time_out != null)
                                                                {{ $item->time_out }}
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
                                    @endforeach --}}
                                </ul>
                                <div class="ps__rail-x" style="left: 0px; bottom: -418px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
                                <div class="ps__rail-y" style="top: 418px; height: 200px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 136px; height: 64px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
