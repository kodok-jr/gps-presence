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
