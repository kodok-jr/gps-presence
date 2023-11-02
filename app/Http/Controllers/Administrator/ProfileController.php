<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\ProfileUpdateRequest;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        larapattern()->allow('administrator.profile.index');

        $data['user'] = auth()->user();

        return view('larapattern.profile.index', $data);
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
    public function update(ProfileUpdateRequest $request, $id)
    {
        larapattern()->allow('administrator.profile.update');

        try {
            DB::beginTransaction();

            if (!is_null($request->password)) {
                $request->merge([
                    'password' => bcrypt($request->password)
                ]);

                auth()->user()->update($request->all());
            }else {
                auth()->user()->update($request->except(['password']));
            }

            DB::commit();

            session()->flash('success', [__('Profile successfully updated!')]);

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAvatar(Request $request, $id, ToastrFactory $flasher)
    {
        try {
            DB::beginTransaction();

            if ($request->hasFile('avatar')) {
                if (auth()->user()->avatar && file_exists(storage_path('app/public/avatars/' .auth()->user()->name.'.png'))) {
                    unlink(storage_path('app/public/avatars/'.auth()->user()->name.'.png'));
                }

                $file = $request->file('avatar')->store('avatars', 'public');
                auth()->user()->avatar = $file;
                auth()->user()->update();
            }

            DB::commit();

            $flasher->title(__('dashboard.flash.success.title'))->addSuccess(__('dashboard.flash.success.avatar'));

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            $flasher->title('Whoops!')->addError($e->getMessage());

            return redirect()->back();
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
