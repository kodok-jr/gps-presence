<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\Presence;
use Yajra\DataTables\Facades\DataTables;

class PresencesMonitoringRepository extends Repository implements RepositoryInterface
{
    /**
     * Call a model
     *
     * @return Collection
     */
    public function __construct (Presence $model) {
        $this->model = $model;
    }

    public function datatables()
    {
        return DataTables::of($this->model->whereNotNull('id'))
                ->escapeColumns([])
                ->make(true);
    }
}
