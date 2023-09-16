<?php

namespace App\Repositories;

abstract class Repository
{
    protected $model;

    /**
     * Create new repository instance
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function findOrFailByUuid($uuid)
    {
        return $this->model->whereUuid($uuid)->firstOrFail();
    }
}
