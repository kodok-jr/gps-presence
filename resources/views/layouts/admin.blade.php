<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />

    <!-- CDN -->
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">
    <link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
    @stack('styles')

    <!-- Scripts -->
    {{-- <script src="{{ mix('js/admin/app.js') }}" defer></script> --}}
    <script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>
</head>

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <div id="app">

        <div class="wrapper">
            <!-- Github link -->

            <a href="https://github.com/tafcoder/sleek-dashboard" target="_blank" class="github-link">
                <svg width="70" height="70" viewBox="0 0 250 250" aria-hidden="true">
                    <defs>
                        <linearGradient id="grad1" x1="0%" y1="75%" x2="100%" y2="0%">
                            <stop offset="0%" style="stop-color:#896def;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#482271;stop-opacity:1" />
                        </linearGradient>
                    </defs>
                    <path d="M 0,0 L115,115 L115,115 L142,142 L250,250 L250,0 Z" fill="url(#grad1)"></path>
                </svg>
                <i class="mdi mdi-github-circle"></i>
            </a><!-- ENd Github link -->

            <!-- Left sidebar with footer
                /=====================================/-->
            <aside class="left-sidebar bg-sidebar">
                <div id="sidebar" class="sidebar sidebar-with-footer">

                    <!-- Aplication Brand -->
                    <div class="app-brand">
                        <a href="{{ route('administrator.index') }}" title="Sleek Dashboard" style="padding-left: 0.56rem !important;">
                            {{-- <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid"
                                width="30" height="33" viewBox="0 0 30 33">
                                <g fill="none" fill-rule="evenodd">
                                    <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                                </g>
                            </svg> --}}
                            <img src="{{ asset('images/logo/icon-under-construction.png') }}" width="55" alt="{{ config('app.name', 'Sleek Dashboard') }}">
                            <span class="brand-name text-truncate ml-1" style="font-size: 1.32rem !important;">{{ config('app.name', 'Sleek Dashboard') }}</span>
                        </a>
                    </div>

                    <div class="sidebar-scrollbar">

                        <x-larapattern-sidebar />

                    </div>

                    <div class="sidebar-footer">
                        <hr class="separator mb-0" />
                        <div class="sidebar-footer-content">
                            <h6 class="text-uppercase">
                                Cpu Uses <span class="float-right">40%</span>
                            </h6>
                            <div class="progress progress-xs">
                                <div class="progress-bar active" style="width: 40%;" role="progressbar"></div>
                            </div>
                            <h6 class="text-uppercase">
                                Memory Uses <span class="float-right">65%</span>
                            </h6>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-warning" style="width: 65%;" role="progressbar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- End Left sidebar with footer /=====================================/-->

            <div class="page-wrapper">

                <!-- Header
                    /=====================================/-->
                <x-larapattern-header></x-larapattern-header>
                <!-- End Header /=====================================/-->


                <!-- Content
                    /=====================================/-->
                <div class="content-wrapper">
                    <div class="content pt-3">
                        <div class="breadcrumb-wrapper mb-3 breadcrumb-contacts">
                            <div>
                                <h1>{{ $title ?? 'Title page not found...!' }}</h1>
                                <nav aria-label="breadcrumb">
                                    <x-larapattern-breadcrumb />
                                </nav>
                            </div>
                            <div></div>
                        </div>

                        {{ $slot }}

                    </div>
                </div>
                <!-- End Content /=====================================/-->
            </div>
        </div>

    </div>

    <!-- Scripts -->
    {{-- <script data-search-pseudo-elements src="{{ asset('js/app.js') }}"></script> --}}
    <script data-search-pseudo-elements src="{{ asset('js/admin/app.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    @stack('scripts')
</body>
</html>
