<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbsenceStoreRequest;
use App\Models\Absence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** Presence today */
        $presence_today = DB::table('presences')
                                ->where('user_id', auth()->user()->id)
                                ->where('presence_date', date("Y-m-d"))
                                ->first();

        /** Absence submission */
        $absences = Absence::where('user_id', auth()->user()->id)->get();

        return view('web.absences.index', compact('presence_today', 'absences'));
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
    public function store(AbsenceStoreRequest $request)
    {
        $user_id = auth()->user()->id;

        $request->merge([
            'user_id' => $user_id
        ]);

        $check = Absence::where('user_id', $user_id)->where('absence_date', $request->absence_date)->count();
        
        if ($check > 0) {
            return redirect()->route('absences.index')->withErrors(["Sorry, You have submitted your application on that day..!"]);
        }

        $save = Absence::create($request->all());

        if (!$save) {
            return redirect()->route('absences.index')->withErrors(['Oupsss, bad request..!']);
        }

        return redirect()->route('absences.index')->withSuccess(['Your request has been submited..!']);
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
