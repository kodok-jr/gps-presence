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

    public function original () {
        $this->model;
    }

    public function getModel () {
        return $this->model;
    }

    public function getModelFirst () {
        return $this->model->first();
    }

    public function findByUuid ($uuid) {
        return $this->model->whereUuid($uuid)->first();
    }

    public function findOrFailByUuid ($uuid) {
        return $this->model->whereUuid($uuid)->firstOrFail();
    }

    public function findByMake ($id) {
        return $this->model->where('parent_id', $id)->get();
    }
}
