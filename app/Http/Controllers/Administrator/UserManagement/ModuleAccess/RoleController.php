<?php

namespace App\Http\Controllers\Administrator\UserManagement\ModuleAccess;

use App\DataTables\RoleDataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\UserManagement\ModuleAccess\RoleRequest;
use App\Repositories\RoleRepository;
use App\Helpers\Menu;
use Flasher\Toastr\Prime\ToastrFactory;

class RoleController extends Controller
{
    protected $repository;

    public function __construct(RoleRepository $repository)
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
        larapattern()->allow('administrator.management.access.roles.index');

        return RoleDataTables::view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        larapattern()->allow('administrator.management.access.roles.create');

        return view('admin.user-management.module_access.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request, ToastrFactory $flasher)
    {
        larapattern()->allow('administrator.management.access.roles.create');

        return $this->repository->createNewRole($request, $flasher);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        larapattern()->allow('administrator.management.access.permission.show');

        $data['role'] = $this->repository->findOrFailByUuid($id);
        $data['menu'] = new Menu;

        return view('admin.user-management.module_access.permissions.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        larapattern()->allow('administrator.management.access.roles.update');

        $data['item'] = $this->repository->findOrFailByUuid($id);

        return view('admin.user-management.module_access.roles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id, ToastrFactory $flasher)
    {
        larapattern()->allow('administrator.management.access.roles.update');

        return $this->repository->updateRole($request, $id, $flasher);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ToastrFactory $flasher)
    {
        larapattern()->allow('administrator.management.access.roles.destroy');

        return $this->repository->deleteRole($id, $flasher);
    }
}
