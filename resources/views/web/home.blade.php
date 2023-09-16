@extends('layouts.web')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title bg-arielle-smile text-white">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon mr-2">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div class="text-left">
                        Gps Presence
                    </div>
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
                <div class="alert alert-success-custom fade show" role="alert" style="display: flex;">
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
                        <h5 class="card-title">Icon Buttons Grids I</h5>
                        <div class="grid-menu grid-menu-3col">
                            <div class="no-gutters row">
                                <div class="col-sm-6 col-xl-4">
                                    <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-secondary">
                                        <i class="lnr-camera btn-icon-wrapper"> </i>
                                        {{-- <span class="badge badge-primary badge-dot badge-dot-lg badge-dot-inside"> </span> --}}
                                        <span class="badge badge-secondary badge-dot badge-dot-inside"> </span>
                                        Masuk
                                        <code class="">07:00</code>
                                    </button>
                                </div>
                                <div class="col-sm-6 col-xl-4">
                                    <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-secondary">
                                        <i class="lnr-camera btn-icon-wrapper"> </i>
                                        {{-- <span class="badge badge-success badge-dot badge-dot-inside"> </span>Secondary --}}
                                        <span class="badge badge-secondary badge-dot badge-dot-inside"> </span>
                                        Pulang
                                        <code class="">16:00</code>
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
                                    <i class="fa fa-taxi icon-gradient bg-happy-itmeo"> </i>
                                    <p>Izin</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="font-icon-wrapper">
                                    <i class="fa fa-medkit icon-gradient bg-happy-itmeo"> </i>
                                    <p>Sakit</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="font-icon-wrapper">
                                    <i class="fa fa-thumbs-down icon-gradient bg-happy-itmeo"> </i>
                                    <p>Alpha</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="font-icon-wrapper">
                                    <i class="fa fa-map-signs icon-gradient bg-happy-itmeo"> </i>
                                    <p>Cuti</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="font-icon-wrapper">
                                    <i class="fa fa-history icon-gradient bg-happy-itmeo"> </i>
                                    <p>Histori</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="font-icon-wrapper">
                                    <i class="fa fa-map icon-gradient bg-happy-itmeo"> </i>
                                    <p>Lokasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
