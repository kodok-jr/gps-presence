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

                                {!! Form::open(['url' => route('login'), 'method' => 'post', 'id' => 'loginForm']) !!}

                                    <div class="modal-body">
                                        <div class="h5 modal-title text-center">
                                            <h4 class="mt-2">
                                                <div>Welcome back,</div>
                                                <span>Please sign in to your account below.</span>
                                            </h4>
                                        </div>
                                        {{-- <form method="POST" action="{{ route('login') }}"> --}}
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        {!! Form::email('email', null, ['class' => 'form-control-sm form-control '.($errors->has('email') ? 'is-invalid' : null), 'id' => 'email', 'placeholder' => 'example@mail.com', 'autofocus']) !!}
                                                        @error('email')
                                                            <small id="firstname-error" class="error invalid-feedback">{{ $message }}</small>
                                                        @enderror
                                                        {{-- <input name="email" id="exampleEmail" placeholder="Email here..." type="email" class="form-control"> --}}
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        {!! Form::password('password', ['class' => 'form-control-sm form-control '.($errors->has('password') ? 'is-invalid' : null), 'id' => 'password', 'placeholder' => 'Password here...']) !!}
                                                        @error('password')
                                                            <small id="firstname-error" class="error invalid-feedback">{{ $message }}</small>
                                                        @enderror
                                                        {{-- <input name="password" id="examplePassword" placeholder="Password here..." type="password" class="form-control"> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="position-relative form-check">
                                                <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                                                <label for="exampleCheck" class="form-check-label">Keep me logged in</label>
                                            </div>
                                        {{-- </form> --}}
                                        <div class="divider"></div>
                                        {{-- <h6 class="mb-0">No account? <a href="javascript:void(0);" class="text-primary">Sign up now</a></h6> --}}
                                    </div>
                                    <div class="modal-footer clearfix">
                                        <div class="float-left">
                                            <a href="{{ route('password.request') }}" class="btn-lg btn btn-link">Recover Password</a>
                                        </div>
                                        <div class="float-right">
                                            <button class="btn btn-primary btn-lg">Login to Presence</button>
                                        </div>
                                    </div>

                                {!! Form::close() !!}

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
