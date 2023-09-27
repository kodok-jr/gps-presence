<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = date("Y-m-d");
        $this_month = date("m");
        $this_year = date("Y");
        $user_id = auth()->user()->id;

        /** Presence today */
        $presence_today = DB::table('presences')
                                ->where('user_id', $user_id)
                                ->where('presence_date', $today)->first();

        /** Presence this month */
        $presence_this_month = DB::table('presences')
                                    ->where('user_id', $user_id)
                                    ->whereRaw('MONTH(presence_date)="'.$this_month.'"')    // take data this month
                                    ->whereRaw('YEAR(presence_date)="'.$this_year.'"')  // take data this year
                                    ->orderBy('presence_date')
                                    ->get();

        /** Presence recap */
        $presence_recap = DB::table('presences')
                                ->selectRaw('COUNT(user_id) as sum_present, SUM(IF(time_in > "07:00", 1, 0)) as sum_delayed')    // get summery presence & delayed of this month
                                ->where('user_id', $user_id)
                                ->whereRaw('MONTH(presence_date)="'.$this_month.'"')    // take data this month
                                ->whereRaw('YEAR(presence_date)="'.$this_year.'"')  // take data this year
                                ->first();

        /** Presences leaderboard */
        $leaderboards = DB::table('presences')
                                ->join('users', 'presences.user_id', '=', 'users.id')
                                ->where('presence_date', date("Y-m-d"))
                                ->orderBy('time_in')
                                ->get();

        /** Absences submission recap */
        $absence_recap = DB::table('absences')
                                ->selectRaw('SUM(IF(status="permit", 1, 0)) as sum_permits, SUM(IF(status="diseased", 1, 0)) as sum_diseased')   // get total permits and totally sick
                                ->where('user_id', $user_id)
                                ->whereRaw('MONTH(absence_date)="'.$this_month.'"')    // take data this month
                                ->whereRaw('YEAR(absence_date)="'.$this_year.'"')  // take data this year
                                ->where('approval', 'approved')
                                ->first();

        return view('home', compact('presence_today', 'presence_this_month', 'presence_recap', 'leaderboards', 'absence_recap'));
    }
}
