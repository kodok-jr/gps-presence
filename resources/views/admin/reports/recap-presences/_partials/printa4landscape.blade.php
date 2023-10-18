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
        font-size: 10px;
    }
    .presences tr td {
        border: 1px solid #131212;
        padding: 5px;
        font-size: 10px;
    }
    .signature {
        margin-top: 70px;
        font-family: Helvetica, sans-serif;
    }
    .sheet.padding-10mm {
        padding: 2mm !important;
    }
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4 landscape">

    {{-- @php
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
    @endphp --}}
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
                    REKAP PRESENSI MAHASISWA/i
                    PERIODE {{ strtoupper($month_name[$month]) }} {{ $year }}
                </h4>
                <span>PIKSI GANESHA</span> <br/>
                <small>Jl. Soekarno Hatta Gg. Bebedahan No. 155</small>
            </td>
        </tr>
    </table>

    <table class="presences">
        <tr>
            <th rowspan="2">Number ID</th>
            <th rowspan="2" align="left">Fullname</th>
            <th colspan="31" align="center">Date</th>
            <th rowspan="2" align="center">TH</th>
            <th rowspan="2" align="center">TK</th>
        </tr>
        <tr>
            @for ($i=1; $i<=31; $i++)
                <th>{{ $i }}</th>
            @endfor
        </tr>
        @foreach ($recap_presences as $item)
            <tr>
                <td>{{ $item->number_id }}</td>
                <td>{{ $item->name }}</td>
                @php $total_attend = 0; $total_overdue = 0; @endphp
                @for ($i=1; $i<=31; $i++)
                @php
                    $date = "date_".$i;
                    if (empty($item->$date)) {
                        $attend = ['', ''];
                        $total_attend += 0;
                    } else {
                        $attend = explode('-', $item->$date);
                        $total_attend += 1;
                        if ($attend[0] > "07:00:00") {
                            $total_overdue += 1;
                        }
                    }

                @endphp
                <td>
                    <span style="color:{{ $attend[0] > "07:00:00" ? "red" : "" }}">{{ $attend[0] }}</span> <br/>
                    <span style="color:{{ $attend[1] < "16:00:00" ? "red" : "" }}">{{ $attend[1] }}</span> <br/>
                </td>
                @endfor
                <td align="center">{{ $total_attend }}</td>
                <td align="center">{{ $total_overdue }}</td>
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
