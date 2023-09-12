<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="{{ asset('images/favicon-underconstruction.ico') }}">
    <title>Login | Gps-Presence</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">
    <meta name="msapplication-tap-highlight" content="no">

    {{-- <link href="{{ asset('assets/templates/architectui/styles/main.d810cf0ae7f39f28f336.css') }}" rel="stylesheet"> --}}


    <!-- Styles -->
    <link href="{{ asset('css/web/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        {{-- <div class="app-logo-inverse mx-auto mb-3"></div> --}}
                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">

                                <!-- Form Input Login & Register //-->
                                @yield('content')

                            </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">Copyright © kodokjr {{ Illuminate\Support\Carbon::now()->format('Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/web/app.js') }}"></script>
</body>

</html>
