<?php

namespace App\Repositories;

use App\Interfaces\NotasInterface;
use App\Models\Notas;

class NotasRepository implements NotasInterface
{
    protected $model;

    public function __construct(Notas $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(Notas $nota, array $data)
    {
        return $nota->update($data);
    }

    public function delete(Notas $nota)
    {
        return $nota->delete();
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->all();
    }
}
