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
                    <a href="{{ route('histories.index') }}" class="dot-btn-wrapper">
                    {{-- <a class="dot-btn-wrapper dd-chart-btn-2" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false"> --}}
                        <i class="dot-btn-icon lnr-printer icon-gradient {{ request()->is('histories') ? 'bg-heavy-rain-custom' : 'bg-heavy-rain' }}""></i>
                    </a>
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
