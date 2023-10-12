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
    </tr>
@endforeach
