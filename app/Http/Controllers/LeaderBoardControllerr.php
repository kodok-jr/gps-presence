<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaderBoardController extends Controller
{
    /**
     * Show the leaderboard page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        /** Presence today */
        $presence_today = DB::table('presences')
                            ->where('user_id', auth()->user()->id)
                            ->where('presence_date', date("Y-m-d"))
                            ->first();

        /** Presences leaderboard */
        $leaderboards = DB::table('presences')
                            ->join('users', 'presences.user_id', '=', 'users.id')
                            ->where('presence_date', date("Y-m-d"))
                            ->orderBy('time_in')
                            ->get();

        return view('web.leaderboards.index', compact('leaderboards', 'presence_today'));
    }
}
