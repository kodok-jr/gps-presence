@extends('layouts.web')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title bg-arielle-smile text-white">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    {{-- <div class="page-title-icon mr-2">
                        <i class="fa fa-map-signs icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div class="text-left">
                        Gps Presence
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="row justify-content-center" style="margin-top: -56px !important;">
            <div class="col-md-6">
                <div class="main-card mb-3 card custom">
                    <div class="card-header" style="border-radius: 50% !important; justify-content: center; text-transform: capitalize !important; display: flex;">
                        <i class="header-icon lnr-laptop-phone icon-gradient bg-plum-plate"> </i>
                        Jadwal Anda Hari Ini
                    </div>
                    <div class="card-body text-center" style="display: flex; justify-content: center;">
                        <i class="header-icon lnr-enter icon-gradient bg-happy-itmeo" style="font-size: 1.3rem; margin-right: 0.425rem !important;"> </i>
                        <strong>07:00</strong>
                        <i class="header-icon pe-7s-more icon-gradient bg-plum-plate" style="font-size: 1.3rem; margin-left: 1.625rem !important; margin-right: 1.625rem !important;"> </i>
                        <i class="header-icon lnr-exit icon-gradient bg-mean-fruit" style="font-size: 1.3rem; margin-right: 0.425rem !important;"> </i>
                        <strong>16:00</strong>
                    </div>
                    <div class="text-center card-footer" style="display: flex; justify-content: center;">
                        <i class="header-icon pe-7s-coffee icon-gradient bg-plum-plate" style="font-size: 1.3rem; margin-right: 0.425rem !important;"> </i>
                        <small class="text-muted">11:00 s/d 13:00 (60menit)</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert alert-success-custom fade show pt-1 pb-1" role="alert" style="display: flex;">
                    <i class="header-icon lnr-hourglass icon-gradient bg-happy-itmeo" style="font-size: 1.3rem; margin-right: 0.425rem !important; font-weight: bold;"> </i>
                    <strong>Presence In </strong>
                    <div class="ml-2 mr-2 badge badge-dot badge-dot-sm badge-success" style="margin-top: 7px; background-color: #1b8477 !important;">Success</div>
                    <span>Jum, 7 Sept 2023</span>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        {{-- <h5 class="card-title">Today</h5> --}}
                        <div class="grid-menu grid-menu-3col">
                            <div class="no-gutters row">
                                <div class="col-sm-6 col-xl-4">
                                    <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-secondary">
                                        <span class="badge badge-secondary badge-dot badge-dot-inside"> </span>
                                        @if ($presence_today != null)
                                            <img width="42" class="rounded image-rounded-custom" src="{{ asset('storage/presences/'.$presence_today->photo_in) }}" alt="">
                                            <strong>
                                                Masuk
                                                <code class="">{{ $presence_today->time_in }}</code>
                                            </strong>
                                        @else
                                            <i class="lnr-camera btn-icon-wrapper"> </i>
                                            <strong><code class="">Belum Absen Masuk</code></strong>
                                        @endif
                                    </button>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-secondary">
                                        <span class="badge badge-secondary badge-dot badge-dot-inside"> </span>
                                        @if ($presence_today != null && $presence_today->time_out != null)
                                            <img width="42" class="rounded image-rounded-custom" src="{{ asset('storage/presences/'.$presence_today->photo_out) }}" alt="">
                                            <strong>
                                                Pulang
                                                <code class="">{{ $presence_today->time_out }}</code>
                                            </strong>
                                        @else
                                            <i class="lnr-camera btn-icon-wrapper"> </i>
                                            <strong><code class="">Belum Absen Pulang</code></strong>
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="font-icon-wrapper">
                                    {{-- <i class="fa fa-street-view icon-gradient bg-happy-itmeo"> </i> --}}
                                    <button class="m-0 btn-icon btn-icon-only btn btn-link btn-sm">
                                        {{-- <i class="pe-7s-settings btn-icon-wrapper font-size-xlg"> </i> --}}
                                        <i class="fa fa-thumbs-up icon-gradient bg-happy-itmeo"> </i>
                                        <span class="badge badge-pill badge-pill-custom badge-danger">{{ $presence_recap->sum_present }}</span>
                                    </button>
                                    <p>Hadir</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="font-icon-wrapper">
                                    <button class="m-0 btn-icon btn-icon-only btn btn-link btn-sm">
                                        <i class="fa fa-thumbs-down icon-gradient bg-happy-itmeo"> </i>
                                        <span class="badge badge-pill badge-pill-custom badge-danger">0</span>
                                    </button>
                                    <p>Alpha</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="font-icon-wrapper">
                                    <button class="m-0 btn-icon btn-icon-only btn btn-link btn-sm">
                                        <i class="fa fa-taxi icon-gradient bg-happy-itmeo"> </i>
                                        <span class="badge badge-pill badge-pill-custom badge-danger">0</span>
                                    </button>
                                    <p>Izin</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="font-icon-wrapper">
                                    <button class="m-0 btn-icon btn-icon-only btn btn-link btn-sm">
                                        <i class="fa fa-medkit icon-gradient bg-happy-itmeo"> </i>
                                        <span class="badge badge-pill badge-pill-custom badge-danger">0</span>
                                    </button>
                                    <p>Sakit</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="font-icon-wrapper">
                                    <button class="m-0 btn-icon btn-icon-only btn btn-link btn-sm">
                                        <i class="fa fa-map-signs icon-gradient bg-happy-itmeo"> </i>
                                        <span class="badge badge-pill badge-pill-custom badge-danger">{{ $presence_recap->sum_delayed }}</span>
                                    </button>
                                    <p>Terlambat</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="font-icon-wrapper">
                                    <a href="{{ route('leaderboards.index') }}" class="m-0 btn-icon btn-icon-only btn btn-link btn-sm">
                                        <i class="fa fa-history icon-gradient bg-happy-itmeo"> </i>
                                        <span class="badge badge-pill badge-pill-custom badge-danger">{{ $leaderboards->count() }}</span>
                                    </a>
                                    <p>Leaderboard</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="main-card mb-3 card custom">
                    <div class="card-header" style="border-radius: 50% !important; justify-content: center; text-transform: capitalize !important; display: flex;">
                        <i class="header-icon pe-7s-cloud-download icon-gradient bg-plum-plate"> </i>
                        Attendance this month
                    </div>
                    <div class="card-body p-1">
                        <div class="scroll-area-sm scroll-area-sm-sm">
                            <div class="scrollbar-container ps--active-y ps">
                                <ul class="list-group list-group-flush pb-3">
                                    @foreach ($presence_this_month as $item)
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
                                    @endforeach
                                </ul>
                                <div class="ps__rail-x" style="left: 0px; bottom: -418px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
                                <div class="ps__rail-y" style="top: 418px; height: 200px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 136px; height: 64px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="d-block text-right card-footer">
                        <button class="mr-2 btn btn-link btn-sm">Cancel</button>
                        <button class="btn btn-success btn-lg">Save</button>
                    </div> --}}
                </div>
                {{-- <div class="main-card card">
                    <div class="card-body">
                        <div class="media col-6 align-items-center">
                            <div class="avatar-icon avatar-icon-lg rounded text-center">
                                19 Sept
                                <img style="width: 40px; height: auto;" src="{{ auth()->user()->laravatar_url }}" alt="" class="d-block ui-w-30 rounded-circle">
                            </div>
                            <div class="media-body flex-truncate ml-2">
                                <a href="javascript:void(0)" class="d-block text-truncate">Aliquam et velit vel nisi egestas pulvinar sit amet ac tellus</a>
                                <div class="text-muted small text-truncate">1d ago &nbsp;·&nbsp;
                                    <a href="javascript:void(0)" class="text-muted">Leon Wilson</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
