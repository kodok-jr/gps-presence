@php
    function difference($time_in, $time_out) {
        list($h, $m, $s) = explode(":", $time_in);
        $dt_first = mktime($h, $m, $s, "1", "1", "1");

        list($h, $m, $s) = explode(":", $time_out);
        $dt_last = mktime($h, $m, $s, "1", "1", "1");

        $dt_difference = $dt_last - $dt_first;
        $total_minutes = $dt_difference / 60;

        $hour = explode(".", $total_minutes / 60);
        $over_minutes_1 = ($total_minutes / 60) - $hour[0];
        $over_minutes_2 = $over_minutes_1 * 60;

        $total_hour = $hour[0];

        return $total_hour. ":".round($over_minutes_2);
    }
@endphp

@foreach ($model as $item)
    <tr>
        <td class="text-center">{{ $loop->iteration }}</td>
        <td>{{ $item->user->number_id }}</td>
        <td>{{ $item->user->name }}</td>
        <td>{{ $item->time_in }}</td>
        <td class="text-center">{!! '<img src="'.asset('storage/presences/'.$item->photo_in).'" class="rounded-circle" width="50" style="border-radius: 12% !important;" />' !!}</td>
        <td>{{ $item->time_out }}</td>
        <td class="text-center">{!! (!is_null($item->photo_out)) ? '<img src="'.asset('storage/presences/'.$item->photo_out).'" class="rounded-circle" width="50" style="border-radius: 12% !important;" />' : '<i class="mdi mdi-camera-off" style="font-size: large; background-color: beige; padding: 5px;"></i>' !!}</td>
        <td class="text-right">{!! ($item->time_in >= "07:00") ? '<span class="badge badge-danger">Terlambat '.difference('07:00:00', $item->time_in).'</span>' : '<span class="badge badge-success">Tepat Waktu</span>' !!}</td>
        <td class="text-center">
            <a href="#" class="mb-1 btn btn-outline btn-linkedin btn-sm" id="" data-toggle="modal" data-target="#exampleModallarge-{{ $item->uuid }}">
                <i class="mdi mdi-map-marker-radius"></i>
            </a>

            <script>
                var user_location = "{{ $item->location_in }}";
                var split_loc = user_location.split(",");
                var user_latitude = split_loc[0];
                var user_longitude = split_loc[1];

                var map = L.map('map').setView([user_latitude, user_longitude], 13);
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                var marker = L.marker([user_latitude, user_longitude]).addTo(map);
                // var circle = L.circle([-6.914253916561905, 107.82169067417507], {
                //     color: 'red',
                //     fillColor: '#f03',
                //     fillOpacity: 0.5,
                //     radius: 500
                // }).addTo(map);

                /** radius location */
                var circle = L.circle([-6.914253916561905, 107.82169067417507], {
                            color: 'red',
                            fillColor: '#f03',
                            fillOpacity: 0.5,
                            radius: 500 // set radius
                        }).addTo(map);

                var popup = L.popup()
                    .setLatLng([user_latitude, user_longitude])
                    .setContent("{{ $item->user->name }}")
                    .openOn(map);
            </script>

            {{-- <button type="button" class="btn bg-primary text-white btn-pill mb-3 mb-md-0" data-toggle="modal" data-target="#exampleModallarge">
                Large Modal
            </button> --}}

            <!-- Large Modal -->
            <div class="modal fade" id="exampleModallarge-{{ $item->uuid }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLarge" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLarge">User Location {{ $item->id }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="loadmap">
                            {{-- {{ $item->location_in }} --}}
                            <div id="map"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
@endforeach
