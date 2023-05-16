<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface NotasInterface
{
    public function __construct(Model $model);

    public function index();

    public function create(array $data);

    public function update(Model $nota, array $data);

    public function delete(Model $nota);

    public function find(int $id);

    public function all();
}
