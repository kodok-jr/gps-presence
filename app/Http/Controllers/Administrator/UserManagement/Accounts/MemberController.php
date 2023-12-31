<?php

namespace App\Http\Controllers\Administrator\UserManagement\Accounts;

use App\DataTables\MemberDataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\Usermanagement\Accounts\MemberStoreRequest;
use App\Repositories\MemberRepository;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MemberController extends Controller
{
    protected $repository;

    public function __construct(MemberRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        larapattern()->allow('administrator.management.accounts.student.index');
        // $user = auth()->guard('admin')->user();

        // if (!Gate::forUser($user)->allows('administrator.management.accounts.student.index')) { abort(403); }

        return MemberDataTables::view('larapattern.index', [
            'foo' => 'bar'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        larapattern()->allow('administrator.management.accounts.student.create');

        return view('admin.user-management.accounts.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberStoreRequest $request, ToastrFactory $flasher)
    {
        larapattern()->allow('administrator.management.accounts.student.create');

        return $this->repository->createNewMember($request, $flasher);
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
