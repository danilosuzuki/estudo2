<?php

namespace App\Repositories;

use App\Interfaces\NotasInterface;
use App\Models\Notas;
use Illuminate\Database\Eloquent\Model;

class NotasRepository implements NotasInterface
{
    protected $model;

    //OBRIGATÓRIO
    public static function getModelClass()
    {
        return Notas::class;
    }

    public function __construct(Model $model)
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

    public function update(Model $nota, array $data)
    {
        return $nota->update($data);
    }

    public function delete(Model $nota)
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
