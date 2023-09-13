<header class="main-header " id="header">

    <nav class="navbar navbar-static-top navbar-expand-lg">

        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
        </button>

        <!-- search form -->
        <div class="search-form d-none d-lg-inline-block">
            {{-- <div class="input-group">
                <button type="button" name="search" id="search-btn" class="btn btn-flat">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <input type="text" name="query" id="search-input" class="form-control" placeholder="'button', 'chart' etc." autofocus autocomplete="off" />
            </div>
            <div id="search-results-container">
                <ul id="search-results"></ul>
            </div> --}}
        </div>

        <div class="navbar-right ">
            <ul class="nav navbar-nav">
                <!-- Notifications -->
                {{-- <li class="dropdown notifications-menu">
                    <button class="dropdown-toggle" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-header">You have 5 notifications</li>
                        <li>
                            <a href="#">
                                <i class="mdi mdi-account-plus"></i> New user registered
                                <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="mdi mdi-account-remove"></i> User deleted
                                <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 07 AM</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                                <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 12 PM</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="mdi mdi-account-supervisor"></i> New client
                                <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="mdi mdi-server-network-off"></i> Server overloaded
                                <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 05 AM</span>
                            </a>
                        </li>
                        <li class="dropdown-footer">
                            <a class="text-center" href="#"> View All </a>
                        </li>
                    </ul>
                </li> --}}

                <!-- Settings -->
                {{-- <li class="right-sidebar-in right-sidebar-2-menu">
                    <i class="mdi mdi-settings mdi-spin"></i>
                </li> --}}

                <!-- Locale -->
                <div class="dropdown p-2">
                    @php $locale = session()->get('locale'); @endphp
                    {{-- <a class="dropdown-toggle icon-burger-mini dropdown-toggle-hide-caret" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="flag-icon flag-icon-{{ ($locale == 'en' || App::getLocale() == 'en') ? 'gb' : $locale }} h3 border" title="{{ ($locale == 'en') ? 'gb' : $locale }}" id="{{ ($locale == 'en') ? 'gb' : $locale }}"></i>
                    </a> --}}
                    {{-- <div class="dropdown-menu dropdown-menu-custom bg-transparent border-0" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item dropdown-item-custom {{ in_array(App::getLocale(), ['id']) ? 'd-none' : '' }}" href="{{ url('lang/id') }}"> <i class="flag-icon flag-icon-id h3 border" title="id" id="id"></i></a>
                        <a class="dropdown-item dropdown-item-custom {{ in_array(App::getLocale(), ['en']) ? 'd-none' : '' }}" href="{{ url('lang/en') }}"> <i class="flag-icon flag-icon-gb h3 border" title="gb" id="gb"></i></a>
                    </div> --}}
                </div>

                <!-- User Account -->
                <li class="dropdown user-menu">
                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <img src="{{ Auth::guard('admin')->user()->laravatar_url }}" class="user-image" alt="User Image" />
                        <span class="d-none d-lg-inline-block">{{ Auth::guard('admin')->user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <!-- User image -->
                        <li class="dropdown-header">
                            <div class="d-inline-block">
                                {{ Auth::guard('admin')->user()->email }} <sup class="text-muted">{{ Auth::guard('admin')->user()->role->name }}</sup>
                            </div>
                        </li>

                        @foreach ($menu->top_right as $menu)
                            @if (in_array($menu['gate'], $permissions))
                                @php
                                    $router = 'javascript:void(0);';

                                    if ($menu['route']) {
                                        $route = $menu['route'][0];
                                        $params = $menu['route'][1] ?? [];

                                        $router = route($route, $params);
                                    }
                                @endphp
                                <li>
                                    <a href="{{ $router }}"><i class="mdi mdi-account"></i> {{ $menu['name'] }}</a>
                                </li>
                            @endif
                        @endforeach

                        <li class="dropdown-footer">
                            <a href="{{ route('administrator.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="mdi mdi-logout"></i> {{ __('Log Out') }} </a>
                            {!! Form::open(['url' => route('logout'), 'method' => 'POST', 'id' => 'logout-form', 'class' => 'd-none']) !!} {!! Form::close() !!}
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>

</header>
