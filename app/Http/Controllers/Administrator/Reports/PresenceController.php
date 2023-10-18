<?php

namespace App\Http\Controllers\Administrator\Reports;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        larapattern()->allow('administrator.reports.presence.index');

        $data['title'] = 'Reports Presences';

        $data['month_name'] = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        $data['users'] = Member::orderBy('name')->get();

        return view('admin.reports.presences.index', $data);
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
        $data['id'] = $request->user_id;
        $data['month'] = $request->month;
        $data['year'] = $request->years;

        $data['month_name'] = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        $data['user'] = Member::where('id', $data['id'])->first();

        $data['presences'] = DB::table('presences')
                            ->where('user_id', $data['id'])
                            ->whereRaw('MONTH(presence_date)="'.$data['month'].'"')
                            ->whereRaw('YEAR(presence_date)="'.$data['year'].'"')
                            ->orderBy('presence_date')
                            ->get();

        return view('admin.reports.presences._partials.printa4', $data);
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
