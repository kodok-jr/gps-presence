<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon-underconstruction.ico') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- Fonts -->
    <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">

    <style>
        ::placeholder {
            font-size: 13px !important;
            color: #afa7a7 !important;
        }
        .app-brand .brand-name{
            font-size: 1.52rem !important;
        }
    </style>

    @stack('styles')
</head>

<body class="" id="body">

    <div id="app">

        <div class="container d-flex flex-column justify-content-between vh-100">
            <div class="row justify-content-center mt-5 pt-5">
                <div class="col-xl-5 col-lg-6 col-md-10 mt-5">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <div class="app-brand">
                                <a href="/index.html">
                                    <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg"
                                        preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
                                        <g fill="none" fill-rule="evenodd">
                                            <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                            <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                                        </g>
                                    </svg>
                                    <span class="brand-name">{{ config('app.name', 'Laravel') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-5">

                            <h4 class="text-dark mb-2">{{ __('auth.login.title') }}</h4>

                            {!! Form::open(['url' => route('administrator.login'), 'method' => 'post']) !!}

                                <div class="row">
                                    <div class="input-group input-group-sm col-md-12 mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16C14.2091 16 16 14.2091 16 12ZM16 12V13.5C16 14.8807 17.1193 16 18.5 16C19.8807 16 21 14.8807 21 13.5V12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21M16.5 19.7942C15.0801 20.614 13.5296 21.0029 12 21.0015" stroke="#4A5568" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                            </span>
                                        </div>
                                        {!! Form::email('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : null), 'id' => 'email', 'placeholder' => 'e.g example@mail.com']) !!}
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-group input-group-sm col-md-12 ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 15V17M6 21H18C19.1046 21 20 20.1046 20 19V13C20 11.8954 19.1046 11 18 11H6C4.89543 11 4 11.8954 4 13V19C4 20.1046 4.89543 21 6 21ZM16 11V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V11H16Z" stroke="#4A5568" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                            </span>
                                        </div>
                                        {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : null), 'id' => 'password', 'placeholder' => '*************************']) !!}
                                        @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <div class="d-flex my-2 justify-content-between">
                                            <div class="d-inline-block mr-3">
                                                <label class="control control-checkbox">{{ __('Remember me') }}
                                                    <input type="checkbox" />
                                                    <div class="control-indicator"></div>
                                                </label>

                                            </div>
                                            <p><a class="text-blue" href="#">{{ __('Forgot Your Password?') }}</a></p>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block mb-4">{{ __('Sign In') }}</button>
                                    </div>
                                </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright pl-0">
                <p class="text-center">&copy; {{ date("Y") }} {{ __('Copyright Larapattern by') }}
                    <a class="text-primary" href="http://www.kodokjr.com/" target="_blank">{{ __('Kodokjr') }}</a>.
                </p>
            </div>
        </div>

    </div>

    @stack('scripts')
</body>

</html>
