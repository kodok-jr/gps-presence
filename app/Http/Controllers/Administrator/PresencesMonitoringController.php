<?php

namespace App\Http\Controllers\Administrator;

use App\DataTables\PresencesMonitoringDataTables;
use App\Http\Controllers\Controller;
use App\Models\Presence;
use App\Repositories\PresencesMonitoringRepository;
use Illuminate\Http\Request;

class PresencesMonitoringController extends Controller
{
    protected $repository;

    public function __construct (PresencesMonitoringRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        larapattern()->allow('administrator.monitoring.index');

        // return PresencesMonitoringDataTables::view('larapattern.index', [
        //     'foo' => 'bar',
        //     'get_date' => request()->date
        // ]);

        $presences_monitoring = Presence::with('user')->get();

        return view('admin.monitoring.index', ['model' => $presences_monitoring]);
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
        $get_date = $request->date;

        $presences_monitoring = Presence::with('user')->where('presence_date', $get_date)->get();

        return view('admin.monitoring._partials.get_presences', ['model' => $presences_monitoring]);
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
