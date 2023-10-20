<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\Absence;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AbsenceRepository extends Repository implements RepositoryInterface
{
    /**
     * Call a model
     *
     * @return Collection
     */
    public function __construct(Absence $model)
    {
        parent::__construct($model);
    }

    public function updateApproval($request, $uuid)
    {
        try {
            DB::beginTransaction();

            if ($request->status == 'approved') {
                $approval = 'approved';
            } elseif ($request->status == 'rejected') {
                $approval = 'rejected';
            } else {
                $approval = 'pending';
            }


            $this->findOrFailByUuid($uuid)->update(['approval' => $approval]);

            DB::commit();

            return redirect()->route('administrator.approvals.index');
        } catch (\Exception $e) {
            DB::rollBack();

            // $flasher->title('Whoops!')->addError($e->getMessage());

            return redirect()->back();
        }
    }
}
