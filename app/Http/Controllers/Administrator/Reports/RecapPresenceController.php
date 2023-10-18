<?php

namespace App\Http\Controllers\Administrator\Reports;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecapPresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        larapattern()->allow('administrator.reports.recap-presence.index');

        $data['title'] = 'Reports Recap Presences';

        $data['month_name'] = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        return view('admin.reports.recap-presences.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['month'] = $request->month;
        $data['year'] = $request->years;

        $data['month_name'] = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        $data['recap_presences'] = DB::table('presences')
                                    ->selectRaw('presences.user_id,number_id,name,
                                        MAX(IF(DAY(presence_date) = 1, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_1,
                                        MAX(IF(DAY(presence_date) = 2, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_2,
                                        MAX(IF(DAY(presence_date) = 3, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_3,
                                        MAX(IF(DAY(presence_date) = 4, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_4,
                                        MAX(IF(DAY(presence_date) = 5, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_5,
                                        MAX(IF(DAY(presence_date) = 6, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_6,
                                        MAX(IF(DAY(presence_date) = 7, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_7,
                                        MAX(IF(DAY(presence_date) = 8, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_8,
                                        MAX(IF(DAY(presence_date) = 9, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_9,
                                        MAX(IF(DAY(presence_date) = 10, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_10,
                                        MAX(IF(DAY(presence_date) = 11, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_11,
                                        MAX(IF(DAY(presence_date) = 12, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_12,
                                        MAX(IF(DAY(presence_date) = 13, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_13,
                                        MAX(IF(DAY(presence_date) = 14, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_14,
                                        MAX(IF(DAY(presence_date) = 15, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_15,
                                        MAX(IF(DAY(presence_date) = 16, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_16,
                                        MAX(IF(DAY(presence_date) = 17, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_17,
                                        MAX(IF(DAY(presence_date) = 18, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_18,
                                        MAX(IF(DAY(presence_date) = 19, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_19,
                                        MAX(IF(DAY(presence_date) = 20, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_20,
                                        MAX(IF(DAY(presence_date) = 21, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_21,
                                        MAX(IF(DAY(presence_date) = 22, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_22,
                                        MAX(IF(DAY(presence_date) = 23, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_23,
                                        MAX(IF(DAY(presence_date) = 24, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_24,
                                        MAX(IF(DAY(presence_date) = 25, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_25,
                                        MAX(IF(DAY(presence_date) = 26, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_26,
                                        MAX(IF(DAY(presence_date) = 27, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_27,
                                        MAX(IF(DAY(presence_date) = 28, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_28,
                                        MAX(IF(DAY(presence_date) = 29, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_29,
                                        MAX(IF(DAY(presence_date) = 30, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_30,
                                        MAX(IF(DAY(presence_date) = 31, CONCAT(time_in,"-",IFNULL(time_out, "00:00:00")), "")) as date_31')
                                    ->join('users', 'presences.user_id', '=', 'users.id')
                                    ->whereRaw('MONTH(presence_date)= "'.$data['month'].'"')
                                    ->whereRaw('YEAR(presence_date)= "'.$data['year'].'"')
                                    ->groupByRaw('presences.user_id,name')
                                    ->get();

        return view('admin.reports.recap-presences._partials.printa4landscape', $data);
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
        //
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
