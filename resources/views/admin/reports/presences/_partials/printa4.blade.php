<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
    @page { size: A4 }
    h4 {
        font-family: Helvetica, sans-serif;
        font-weight: 600;
        margin-bottom: 5px;
    }
    span {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 600;
    }
    small {
        font-family: Helvetica, sans-serif;
        font-size: revert;
    }
    .user {
        margin-top: 40px;
        font-family: Helvetica, sans-serif;
        font-size: small
    }
    .user td {
        padding: 1px;
    }
    .presences {
        margin-top: 40px;
        font-family: Helvetica, sans-serif;
        font-size: small;
        width: 100%;
        border-collapse: collapse;
    }
    .presences tr th {
        border: 1px solid #131212;
        padding: 8px;
        background-color: #eae9e9;
    }
    .presences tr td {
        border: 1px solid #131212;
        padding: 5px;
    }
    .signature {
        margin-top: 70px;
        font-family: Helvetica, sans-serif;
    }
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">

    @php
        function difference($base_time, $time_absence) {
            list($h, $m, $s) = explode(":", $base_time);
            $dt_first = mktime($h, $m, $s, "1", "1", "1");

            list($h, $m, $s) = explode(":", $time_absence);
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
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <!-- Write HTML just like a web page -->
    {{-- <article>This is an A4 document.</article> --}}
    <table style="width: 100%">
        <tr>
            <td align="center" style="width: 140px">
                <img src="{{ asset('images/logo/icon-under-construction.png') }}" width="100" height="100" alt="">
            </td>
            <td align="center">
                <h4>
                    LAPORAN PRESENSI MAHASISWA/i
                    PERIODE {{ strtoupper($month_name[$month]) }} {{ $year }}
                </h4>
                <span>PIKSI GANESHA</span> <br/>
                <small>Jl. Soekarno Hatta Gg. Bebedahan No. 155</small>
            </td>
        </tr>
    </table>

    <table class="user">
        <tr>
            <td rowspan="5" style="padding-right: 10px">
                <img src="{{ asset($user->laravatar_url) }}" width="" height="" alt="">
            </td>
        </tr>
        <tr>
            <td>Number ID</td>
            <td>:</td>
            <td>{{ $user->number_id }}</td>
        </tr>
        <tr>
            <td>Fullname</td>
            <td>:</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td>:</td>
            <td>{{ $user->phone }}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>:</td>
            <td>{{ $user->address }}</td>
        </tr>
    </table>

    <table class="presences">
        <tr>
            <th>No.</th>
            <th align="left">Date</th>
            <th align="left">Time In</th>
            <th>Photo In</th>
            <th align="left">Time Out</th>
            <th>Photo Out</th>
            {{-- <th>Location</th> --}}
            <th align="left">Description</th>
        </tr>
        @foreach ($presences as $item)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td>{{ date("d-m-Y", strtotime($item->presence_date)) }}</td>
            <td>{{ $item->time_in }}</td>
            <td align="center">
                <img src="{{ Storage::url('presences/'.$item->photo_in) }}" width="40" height="30" alt="">
            </td>
            <td>{{ $item->time_out != null ? $item->time_out : 'Belum Absen' }}</td>
            <td align="center">
                @if ($item->time_out != null)
                    <img src="{{ Storage::url('presences/'.$item->photo_out) }}" width="40" height="30" alt="">
                @else
                <img src="{{ asset('images/no_camera.png') }}" width="30" height="30" alt="">
                @endif
            </td>
            <td>
                @if ($item->time_in > '07:00')
                    Terlambat : <sup>{{ difference('07:00:00', $item->time_in) }}</sup>
                @else
                    Tepat Waktu
                @endif
            </td>
        </tr>
        @endforeach
    </table>

    <table class="signature" width="100%">
        <tr>
            <td style="width: 70%;"></td>
            <td align="left">
                <small style="word-spacing: 10px"><i><strong>Bandung, {{ date('d M Y') }}</strong></i></small>
            </td>
        </tr>
        <tr>
            <td style="width: 70%; height: 100px"></td>
            <td style="text-align: center; vertical-align: bottom;">
                <u>Rosie Rosmaya Dewi</u><br/>
                <b>B.A.K</b>
            </td>
        </tr>
    </table>
  </section>

</body>

</html>
