<?php

namespace App\Http\Controllers\Administrator\UserManagement\Accounts;

use App\DataTables\UserDataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\UserManagement\Accounts\AdminStoreRequest;
use App\Http\Requests\Administrator\UserManagement\Accounts\AdminUpdateRequest;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Flasher\Toastr\Prime\ToastrFactory;

class AdminController extends Controller
{
    protected $repository, $roleRepository;

    public function __construct(UserRepository $repository, RoleRepository $roleRepository)
    {
        $this->repository = $repository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        larapattern()->allow('administrator.management.accounts.admin.index');

        return UserDataTables::view('larapattern.index', [
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
        larapattern()->allow('administrator.management.accounts.admin.create');

        $data['roles'] = $this->roleRepository->getModel();

        return view('admin.user-management.accounts.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminStoreRequest $request, ToastrFactory $flasher)
    {
        larapattern()->allow('administrator.management.accounts.admin.create');

        return $this->repository->createNewUser($request, $flasher);
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
        larapattern()->allow('administrator.management.accounts.admin.update');

        $data['user'] = $this->repository->findOrFailByUuid($id);
        $data['roles'] = $this->roleRepository->getModel();
        $data['role_selected'] = $data['user']->roles()->get();

        return view('admin.user-management.accounts.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateRequest $request, $id, ToastrFactory $flasher)
    {
        larapattern()->allow('administrator.management.accounts.admin.update');

        return $this->repository->updateUser($request, $id, $flasher);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ToastrFactory $flasher)
    {
        larapattern()->allow('administrator.management.accounts.admin.destroy');

        return $this->repository->deleteUser($id, $flasher);
    }
}
