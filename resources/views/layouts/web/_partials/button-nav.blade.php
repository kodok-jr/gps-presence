<div class="app-footer text-center">
    <div class="app-footer__inner">

        <div class="text-center">
            <div class="footer-dots">
                <div class="dropdown">
                    <a href="{{ route('home') }}" class="dot-btn-wrapper">
                        <i class="dot-btn-icon fa fa-home icon-gradient {{ request()->is('home') ? 'bg-heavy-rain-custom' : 'bg-heavy-rain' }}"></i>
                    </a>
                </div>
                <div class="dots-separator"></div>

                <div class="dropdown">
                    <a class="dot-btn-wrapper" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false">
                        <i class="dot-btn-icon lnr-clock icon-gradient bg-heavy-rain"></i>
                    </a>
                </div>
                <div class="dots-separator"></div>

                <div class="dropdown">
                    <a href="{{ route('presences.create') }}" class="p-0 btn btn-link {{ $presence_today != null && $presence_today->time_out != null ? 'disabled' : '' }}">
                        <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                            <span class="icon-wrapper-bg bg-primary"></span>
                            <i class="icon text-primary fa fa-camera-retro"></i>
                        </span>
                    </a>
                </div>
                <div class="dots-separator"></div>

                <div class="dropdown">
                    <a class="dot-btn-wrapper dd-chart-btn-2" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false">
                        <i class="dot-btn-icon lnr-printer icon-gradient bg-heavy-rain"></i>
                    </a>
                    <div tabindex="-1" role="menu" aria-hidden="true"
                        class="dropdown-menu-xl rm-pointers dropdown-menu">
                        <div class="dropdown-menu-header">
                            <div class="dropdown-menu-header-inner bg-premium-dark">
                                <div class="menu-header-image"
                                    style="background-image: url('assets/images/dropdown-header/abstract4.jpg');">
                                </div>
                                <div class="menu-header-content text-white">
                                    <h5 class="menu-header-title">Users Online</h5>
                                    <h6 class="menu-header-subtitle">Recent Account Activity
                                        Overview</h6>
                                </div>
                            </div>
                        </div>
                        <div class="widget-chart">
                            <div class="widget-chart-content">
                                <div class="icon-wrapper rounded-circle">
                                    <div class="icon-wrapper-bg opacity-9 bg-focus"></div>
                                    <i class="lnr-users text-white"></i>
                                </div>
                                <div class="widget-numbers">
                                    <span>344k</span>
                                </div>
                                <div class="widget-subheading pt-2"> Profile views since last login
                                </div>
                                <div class="widget-description text-danger">
                                    <span class="pr-1"> <span>176%</span></span>
                                    <i class="fa fa-arrow-left"></i>
                                </div>
                            </div>
                            <div class="widget-chart-wrapper">
                                <div id="dashboard-sparkline-carousel-4-pop"></div>
                            </div>
                        </div>
                        <ul class="nav flex-column">
                            <li class="nav-item-divider mt-0 nav-item"></li>
                            <li class="nav-item-btn text-center nav-item">
                                <button class="btn-shine btn-wide btn-pill btn btn-warning btn-sm">
                                    <i class="fa fa-cog fa-spin mr-2"></i> View Details
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="dots-separator"></div>

                <div class="dropdown">
                    <a href="{{ route('profiles.index') }}" class="dot-btn-wrapper dd-chart-btn-2">
                        <i class="dot-btn-icon fa fa-id-card icon-gradient {{ request()->is('profiles') ? 'bg-heavy-rain-custom' : 'bg-heavy-rain' }}"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
