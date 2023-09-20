<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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

        return view('web.profiles.index', compact('presence_today'));
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
    public function update(Request $request, $uuid)
    {
        if ($request->password) {
            $request->merge([
                'password' => bcrypt($request->password)
            ]);

            auth()->user()->update($request->all());
            auth()->logout();

            return redirect()->route('login')->withSuccess(['Password successfully updated, please logged in with new password..!']);
        } else {
            auth()->user()->update($request->except(['password']));
        }

        return redirect()->back()->withSuccess(['Profile successfully updated..!']);
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

    /**
     * Update avatar resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function avatar (Request $request, $uuid) {
        $user = Member::where('uuid', $uuid)->first();

        if ($request->hasFile('avatar')) {
            if (file_exists(storage_path('app/public/avatars/'.$user->name.'.png'))) {
                unlink(storage_path('app/public/avatars/'.$user->name.'.png'));
            }

            if (file_exists(storage_path('app/public/'.$user->avatar))) {
                unlink(storage_path('app/public/'.$user->avatar));
            }

            $file = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $file;
            $user->update();

            return redirect()->route('profiles.index')->withSuccess(['Avatar has been updated..!']);
        }
    }
}
