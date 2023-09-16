<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Ui\Presets\Preset;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /** Check if user has been take photo for absent */
        $today = date("Y-m-d");
        $user_id = auth()->user()->id;

        $check = Presence::where('presence_date', $today)->where('user_id', $user_id)->count();
        $presence_id = Presence::where('presence_date', $today)->where('user_id', $user_id)->first();

        return view('web.presences.create', compact('check', 'presence_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $user_number_id = auth()->user()->number_id;    // options
        $location = $request->location;
        $image = $request->image;

        $presence_date = date("Y-m-d");
        $time_in = date("H:i:s");
        $folder_path = "public/presences/";
        $format_filename = auth()->user()->uuid."-".$presence_date."-in";

        $convert_image = explode(";base64", $image);
        $file_image = base64_decode($convert_image[1]);
        $filename = $format_filename.".png";
        $file = $folder_path.$filename;

        $data = [
            'number_id' => $user_number_id,
            'user_id' => $user_id,
            'presence_date' => $presence_date,
            'time_in' => $time_in,
            'photo_in' => $filename,
            'location_in' => $location,
        ];

        $save = Presence::create($data);

        if ($save) {
            Storage::put($file, $file_image);
            echo "success|Terimakasih, Sudah melakukan absen masuk|in";
        } else {
            echo "error|Maaf Gagal Absen, Silahkan Hubungi Tim IT|in";
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $location = $request->location;
        $image = $request->image;

        $presence = Presence::findOrFail($id);

        $folder_path = "public/presences/";
        $format_filename = auth()->user()->uuid."-".date("Y-m-d")."-out";

        $convert_image = explode(";base64", $image);
        $file_image = base64_decode($convert_image[1]);
        $filename = $format_filename.".png";
        $file = $folder_path.$filename;

        $update = $presence->update([
            'time_out' => date("H:i:s"),
            'photo_out' => $filename,
            'location_out' => $location
        ]);

        if ($update) {
            Storage::put($file, $file_image);
            echo "success|Terimakasih, Sudah melakukan absen pulang, Hati-hati dijalan..!|out";
        } else {
            echo "error|Maaf Gagal Absen, Silahkan Hubungi Tim IT|out";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
