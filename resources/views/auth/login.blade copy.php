@extends('layouts.auth')

@section('content')

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
@endsection
