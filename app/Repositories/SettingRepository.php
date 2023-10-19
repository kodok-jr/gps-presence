<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\Role;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SettingRepository extends Repository implements RepositoryInterface
{
    /**
     * Call a model
     *
     * @return Collection
     */
    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }

    public function updateConfig($request, $uuid)
    {
        try {
            DB::beginTransaction();

            // dd($this->findOrFailByUuid($uuid));

            $this->findOrFailByUuid($uuid)->update($request->all());

            DB::commit();

            return redirect()->route('administrator.settings.index');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back();
        }
    }
}
