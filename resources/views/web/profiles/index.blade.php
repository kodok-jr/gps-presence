@extends('layouts.web')

@section('content')
<div class="app-main__inner mb-0 pt-2">
    <div class="app-page-title bg-arielle-smile text-white mb-0" style="height: 96px">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon mr-2" style="justify-content: center !important;">
                    <label style="cursor: pointer;" for="change">
                        <img width="45" class="rounded" src="{{ auth()->user()->laravatar_url }}" alt="">
                    </label>
                </div>
                {{ Form::model(auth()->user(), ['url' => route('profiles.avatar.update', auth()->user()->uuid), 'files' => true, 'method' => 'PUT', 'id' => 'avatar-form']) }}
                    <input type="file" id="change" name="avatar" onchange="submit();" style="display: none">
                {!! Form::close() !!}
                <div class="text-left" style="line-height: 19px">
                    <div class="mt-3">
                        <Strong style="font-size: 1.1rem">{{ auth()->user()->name }}</Strong>
                        <p><small style="font-size: 0.9rem">Position : {{ auth()->user()->position }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" style="margin-top: -56px !important;">
        <div class="col-md-6 mt-5">
            <div class="main-card mb-3 card custom">
                <div class="card-header" style="border-radius: 50% !important; text-transform: capitalize !important; display: flex;">
                    <i class="header-icon pe-7s-id icon-gradient bg-plum-plate"> </i>
                    Profile
                </div>
                <div class="card-body pt-0 pb-0">
                    <ul class="list-group list-group-flush" style="line-height: 0px !important;">
                        <a href="javascript:void(0);" class="disabled list-group-item" style="display: flex; border-bottom: 0.1rem solid rgba(0, 0, 0, .125);">
                            <i class="header-icon lnr-envelope icon-gradient bg-happy-itmeo" style="font-size: 1.3rem; margin-right: 0.225rem !important; !important;"> </i>
                            <p class="mb-0" style="padding-top: 11px;">
                                <span class="text-muted">{{ auth()->user()->email }}</span>
                            </p>
                        </a>
                        <a href="javascript:void(0);" class="disabled list-group-item" style="display: flex;">
                            <i class="header-icon lnr-license icon-gradient bg-mean-fruit" style="font-size: 1.3rem; margin-right: 0.225rem !important; !important;"> </i>
                            <p class="mb-0" style="padding-top: 11px;">
                                <span class="text-muted">{{ auth()->user()->number_id }}</span>
                            </p>
                        </a>
                        {{-- <a href="javascript:void(0);" class="list-group-item">Morbi leo risus</a>
                        <a href="javascript:void(0);" class="list-group-item">Porta ac consectetur ac</a>
                        <a href="javascript:void(0);" class="list-group-item">Vestibulum at eros</a> --}}
                    </ul>

                    {{-- <i class="header-icon pe-7s-more icon-gradient bg-plum-plate" style="font-size: 1.3rem; margin-left: 1.625rem !important; margin-right: 1.625rem !important;"> </i> --}}

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::open(['url' => route('profiles.update', auth()->user()->uuid), 'method' => 'put', 'id' => 'updateProfileForm']) !!}

                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                    </div>
                                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="form-control-sm form-control" id="name" autocomplete="off">
                                </div>
                                <div class="input-group input-group-sm mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="lnr-smartphone"></i></span>
                                    </div>
                                    <input type="text" name="phone" value="{{ auth()->user()->phone }}" class="form-control-sm form-control" id="phone" placeholder="Ex: +62 821 1899 xxxx" autocomplete="false">
                                </div>
                                <div class="input-group input-group-sm mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="lnr-lock"></i></span>
                                    </div>
                                    <input type="password" name="password" placeholder="**********" class="form-control-sm form-control" id="password" autocomplete="new-password">
                                </div>
                                <div class="position-relative form-group input-group-sm mt-2">
                                    <label for="address" class="">Address</label>
                                    <textarea name="address" id="address" class="form-control">{{ old('address', auth()->user()->address) }}</textarea>
                                </div>
                                {{-- <div class="position-relative form-group">
                                    <label for="password" class="">Password</label>
                                    <input type="password" name="password" placeholder="password placeholder" class="form-control-sm form-control" id="password" >
                                </div> --}}

                                <small class="form-text text-muted">
                                    This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.
                                </small>

                                <button type="submit" class="mt-1 btn btn-primary pull-right">Update</button>

                            {!! Form::close() !!}
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div class="text-center card-footer" style="display: flex; justify-content: center;">
                    <i class="header-icon pe-7s-coffee icon-gradient bg-plum-plate" style="font-size: 1.3rem; margin-right: 0.425rem !important;"> </i>
                    <small class="text-muted">11:00 s/d 13:00 (60menit)</small>
                </div> --}}
            </div>
        </div>
    </div>
</div>
{{-- <div class="card-shadow-primary profile-responsive card-border mb-3 card">
    <div class="dropdown-menu-header">
        <div class="dropdown-menu-header-inner bg-danger">
            <div class="menu-header-image" style="background-image: url('assets/images/dropdown-header/abstract1.jpg')"></div>
            <div class="menu-header-content btn-pane-right">
                <div class="avatar-icon-wrapper mr-2 avatar-icon-xl">
                    <div class="avatar-icon">
                        <img src="assets/images/avatars/3.jpg" alt="Avatar 5">
                    </div>
                </div>
                <div>
                    <h5 class="menu-header-title">Mathew Mercer</h5>
                    <h6 class="menu-header-subtitle">Sales Manager</h6>
                </div>
                <div class="menu-header-btn-pane">
                    <button class="btn-icon mr-2 btn-icon-only btn btn-warning btn-sm">
                        <i class="pe-7s-config btn-icon-wrapper"></i>
                    </button>
                    <button class="btn-icon btn btn-success btn-sm">View Profile</button>
                </div>
            </div>
        </div>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <div class="widget-content p-0">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left mr-3">
                        <div class="icon-wrapper m-0">
                            <div class="progress-circle-wrapper">
                                <div class="circle-progress d-inline-block circle-progress-success"><canvas width="104" height="104" style="height: 52px; width: 52px;"></canvas>
                                    <small><span>81%<span></span></span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content-left">
                        <div class="widget-heading">January Sales</div>
                        <div class="widget-subheading">Lorem ipsum dolor</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers widget-numbers-sm text-primary"><span>764</span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="widget-content p-0">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left mr-3">
                        <div class="icon-wrapper m-0">
                            <div class="progress-circle-wrapper">
                                <div class="circle-progress d-inline-block circle-progress-info"><canvas width="104" height="104" style="height: 52px; width: 52px;"></canvas>
                                    <small><span>69%<span></span></span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content-left">
                        <div class="widget-heading">February Sales</div>
                        <div class="widget-subheading">Maecenas tempus, tellus</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers widget-numbers-sm text-warning"><span>194</span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="widget-content p-0">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left mr-3">
                        <div class="icon-wrapper m-0">
                            <div class="progress-circle-wrapper">
                                <div class="circle-progress d-inline-block circle-progress-danger"><canvas width="104" height="104" style="height: 52px; width: 52px;"></canvas>
                                    <small><span>23%<span></span></span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content-left">
                        <div class="widget-heading">March Sales</div>
                        <div class="widget-subheading">Donec vitae sapien</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers widget-numbers-sm text-danger"><span>-54 $</span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="widget-content p-0">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left mr-3">
                        <div class="icon-wrapper m-0">
                            <div class="progress-circle-wrapper">
                                <div class="circle-progress d-inline-block circle-progress-dark"><canvas width="104" height="104" style="height: 52px; width: 52px;"></canvas>
                                    <small><span>69%<span></span></span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content-left">
                        <div class="widget-heading">April Sales</div>
                        <div class="widget-subheading">Curabitur ullamcorper ultricies</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers widget-numbers-sm text-info"><span>45 $</span></div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div> --}}
@endsection
@if(Session::has('success'))
    @push('scripts')
        <script>
            Swal.fire({
                icon: 'success',
                text: "{{ Session::get('success')[0] }}",
                confirmButtonText: 'Ok'
            })
        </script>
    @endpush
@endif

