@extends('layouts.web')

@push('styles')

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    {{-- <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script> --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <style>
        .webcam-capture, .webcam-capture video {
            display: inline-block !important;
            width: 100% !important;
            margin: auto !important;
            height: auto !important;
            border-radius: 5px;
        }
        #map {
            height: 250px;
            border-radius: 5px;
            z-index: 1;
        }
    </style>

@endpush
@section('content')
<div class="app-main__inner">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="mb-3 card">
                <div class="card-header-tab card-header text-left pb-1" style="display: flex !important;">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon fa fa-camera-retro mr-3 text-muted opacity-6"> </i>
                        Take Photo
                    </div>
                    <div class="btn-actions-pane-right actions-icon-btn">
                        <div class="btn-group dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                class="btn-icon btn-icon-only btn btn-link">
                                <i class="pe-7s-menu btn-icon-wrapper"></i>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true"
                                class="dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu">
                                <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <i class="dropdown-icon lnr-inbox"> </i><span>Menus</span>
                                </button>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <i class="dropdown-icon lnr-file-empty"> </i><span>Settings</span>
                                </button>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <i class="dropdown-icon lnr-book"> </i><span>Actions</span>
                                </button>
                                <div tabindex="-1" class="dropdown-divider"></div>
                                <div class="p-1 text-right">
                                    <button class="mr-2 btn-shadow btn-sm btn btn-link">View Details</button>
                                    <button class="mr-2 btn-shadow btn-sm btn btn-primary">Action</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-3 card-body pl-2 pr-2 pb-0">

                <!-- WebCam n Maps
                    /=====================================/-->
                    <input type="hidden" id="current_location">
                    <div class="webcam-capture"></div>
                    <hr>
                    <div id="map"></div>
                <!-- End WebCam n Maps
                    /=====================================/-->

                <!-- Sounds
                    /=====================================/-->
                    <audio id="notification_in">
                        <source src="{{ asset('sounds/notification-in.mp3') }}" type="audio/mpeg">
                    </audio>
                    <audio id="notification_out">
                        <source src="{{ asset('sounds/notification-out.mp3') }}" type="audio/mpeg">
                    </audio>
                    <audio id="notification_error">
                        <source src="{{ asset('sounds/notification-error-en.mp3') }}" type="audio/mpeg">
                    </audio>
                    <audio id="notification_error_radius">
                        <source src="{{ asset('sounds/notification-error-outside.mp3') }}" type="audio/mpeg">
                    </audio>
                <!-- End Sounds
                    /=====================================/-->

                </div>
                <div class="pl-1 pr-1 d-block text-center rm-border card-footer">
                    @if ($check > 0)
                        @php
                            $route_path = "/presences/$presence_id->id";
                            $type = 'PUT';
                        @endphp
                        <button class="btn btn-danger btn-sm btn-block btn-icon" id="take_absent">
                            <i class="lnr-camera btn-icon-wrapper"></i>
                            Absen Pulang
                        </button>
                    @else
                        @php
                            $route_path = "/presences";
                            $type = 'POST';
                        @endphp
                    <button class="btn btn-primary btn-sm btn-block btn-icon" id="take_absent">
                        <i class="lnr-camera btn-icon-wrapper"></i>
                        Absen Masuk
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

    <script>
        /**
         * Configuration sounds notification
         * ==================================================================== */
        var notification_in = document.getElementById('notification_in')
        var notification_out = document.getElementById('notification_out')
        var notification_error = document.getElementById('notification_error')
        var notification_error_radius = document.getElementById('notification_error_radius')

        /**
         * Configuration layout webcam
         * ==================================================================== */
        Webcam.set({
            height: 480,
            width: 640,
            image_format: 'jpeg',
            jpeg_quality: 80,
        });

        Webcam.attach('.webcam-capture');

        /**
         * Get current user position
         * ==================================================================== */
        var current_location = document.getElementById('current_location');

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        }

        function successCallback(params) {
            /** user position */
            current_location.value = params.coords.latitude +","+ params.coords.longitude;

            /** base location */
            var base_location = "{{ $setting->base_location }}";
            var explode_location = base_location.split(",");
            var base_latitude = explode_location[0];
            var base_longitude = explode_location[1];

            /** base radius */
            var base_radius = "{{ $setting->radius }}";

            /** set coordinate current user position to map */
            var map = L.map('map').setView([params.coords.latitude, params.coords.longitude], 16);  // change zoom map
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            /** marker position */
            var marker = L.marker([params.coords.latitude, params.coords.longitude]).addTo(map);

            /** radius location */
            var circle = L.circle([base_latitude, base_longitude], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: base_radius // set radius
            }).addTo(map);
        }

        function errorCallback(params) {}

        /**
         * Saving data
         * ==================================================================== */
        $('#take_absent').click(function () {
            /** get user snap image */
            Webcam.snap(function (uri) {
                image = uri;
            })

            /** cath user location */
            var save_location = $('#current_location').val();

            $.ajax({
                type: '{{ $type }}',
                url: "{{ $route_path }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    image: image,
                    location: save_location
                },
                cache: false,
                success: function (response) {
                    var status = response.split("|");

                    if (status[0] == 'success') {
                        /** Sound Notifications */
                        if (status[2] == 'in') {
                            notification_in.play();
                        } else {
                            notification_out.play();
                        }

                        Swal.fire({
                            icon: 'success',
                            text: 'Terimakasih, Telah melakukan absen..!',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            /* return redirect back to home page */
                            location.href = '/home'
                        });
                    } else {
                        if (status[2] == 'radius') {
                            notification_error_radius.play();
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...!',
                                text: status[1],
                                confirmButtonText: 'Ok'
                            })
                        } else {
                            notification_error.play();
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...!',
                                text: 'Something went wrong! Please call support IT',
                                confirmButtonText: 'Ok'
                            });
                        }
                    }
                }
            });
        });

    </script>
@endpush
