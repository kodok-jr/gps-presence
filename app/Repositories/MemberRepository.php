<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contracts\RepositoryInterface;
use App\Mail\Member\SendMailAfterRegistering;
use Illuminate\Support\Facades\Mail;

class MemberRepository extends Repository implements RepositoryInterface
{
    /**
     * Call a model
     *
     * @return Collection
     */
    public function __construct(Member $model)
    {
        parent::__construct($model);
    }

    public function createNewMember(Request $request, $flasher)
    {
        try {
            DB::beginTransaction();

            $data['password'] = Str::upper(Str::random(8));

            $request->merge([
                'password' => bcrypt($data['password'])
            ]);

            $data['member'] = $this->model->create($request->all());

            DB::commit();

            Mail::to($request->email)->send(new SendMailAfterRegistering($data));

            $flasher->title(__('dashboard.flash.success.title'))->addSuccess(__('dashboard.flash.success.user'));

            return redirect()->route('administrator.management.accounts.student.index');
        } catch (\Exception $e) {
            DB::rollBack();

            $flasher->title('Whoops!')->addError($e->getMessage());

            return redirect()->back();
        }
    }

    public function updateUser($request, $uuid, $flasher)
    {
        try {
            DB::beginTransaction();

            $user = $this->findOrFailByUuid($uuid);

            if (!is_null($request->password)) {
                $request->merge([
                    'password' => bcrypt($request->password)
                ]);

                $user->update($request->all());
            }else {
                $user->update($request->except(['password']));
            }

            if ($request->has('role_id')) {
                $user->roles()->sync($request->role_id);
            }

            DB::commit();

            $flasher->title(__('dashboard.flash.success.title'))->addSuccess(__('dashboard.flash.edit.user'));

            return redirect()->route('administrator.management.accounts.admin.index');
        } catch (\Exception $e) {
            DB::rollBack();

            $flasher->title('Whoops!')->addError($e->getMessage());

            return redirect()->back();
        }
    }

    public function deleteUser($uuid, $flasher)
    {
        try {
            DB::beginTransaction();

            $user = $this->findOrFailByUuid($uuid);
            $role_id = $user->role->id;

            if ($user) {
                $user->delete();
                $user->roles()->detach([$role_id]);
            }

            DB::commit();

            $flasher->title(__('dashboard.flash.success.title'))->addSuccess(__('dashboard.flash.delete.user'));

            return redirect()->route('administrator.management.accounts.admin.index');
        } catch (\Exception $e) {
            DB::rollBack();

            $flasher->title('Whoops!')->addError($e->getMessage());

            return redirect()->back();
        }
    }
}
