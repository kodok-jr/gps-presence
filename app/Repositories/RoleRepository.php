<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleRepository extends Repository implements RepositoryInterface
{
    /**
     * Call a model
     *
     * @return Collection
     */
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    public function createNewRole(Request $request, $flasher)
    {
        try {
            DB::beginTransaction();

            $request->merge(['gates' => []]);

            $this->model->create($request->except(['slug']));

            DB::commit();

            $flasher->title(__('dashboard.flash.success.title'))->addSuccess(__('dashboard.flash.success.role'));

            return redirect()->route('administrator.management.access.roles.index');
        } catch (\Exception $e) {
            DB::rollBack();

            $flasher->title('Whoops!')->addError($e->getMessage());

            return redirect()->back();
        }
    }

    public function updateRole($request, $uuid, $flasher)
    {
        try {
            DB::beginTransaction();

            $request->merge(['slug' => Str::slug($request->name)]);

            $this->findOrFailByUuid($uuid)->update($request->all());

            DB::commit();

            $flasher->title(__('dashboard.flash.success.title'))->addSuccess(__('dashboard.flash.edit.role'));

            return redirect()->route('administrator.management.access.roles.index');
        } catch (\Exception $e) {
            DB::rollBack();

            $flasher->title('Whoops!')->addError($e->getMessage());

            return redirect()->back();
        }
    }

    public function deleteRole($uuid, $flasher)
    {
        try {
            DB::beginTransaction();

            $role = $this->findOrFailByUuid($uuid);

            if ($role->users()->count() > 0) {
                $flasher->title('Whoops!')->addWarning(__('dashboard.flash.delete.role.cannot'));

                return redirect()->back();
            }

            $role->delete();

            DB::commit();

            $flasher->title(__('dashboard.flash.success.title'))->addSuccess(__('dashboard.flash.delete.role.can'));

            return redirect()->route('administrator.management.access.roles.index');
        } catch (\Exception $e) {
            DB::rollBack();

            $flasher->title('Whoops!')->addError($e->getMessage());

            return redirect()->back();
        }
    }
}
