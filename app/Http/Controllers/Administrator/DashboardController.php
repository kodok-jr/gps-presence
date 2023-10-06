<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = date('Y-m-d');

         /** Presence recap */
         $presence_recap = DB::table('presences')
                                ->selectRaw('COUNT(user_id) as sum_present, SUM(IF(time_in > "07:00", 1, 0)) as sum_delayed')    // get summery presence & delayed of this month
                                ->where('presence_date', $today)
                                ->first();

        /** Absences submission recap */
        $absence_recap = DB::table('absences')
                                ->selectRaw('SUM(IF(status="permit", 1, 0)) as sum_permits, SUM(IF(status="diseased", 1, 0)) as sum_diseased')   // get total permits and totally sick
                                ->where('absence_date', $today)
                                ->where('approval', 'approved')
                                ->first();

        return view('admin.home', compact('presence_recap', 'absence_recap'));
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
        //
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
