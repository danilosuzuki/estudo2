<?php

namespace App\Interfaces;

use App\Models\Notas;

interface NotasInterface
{
    public function index();

    public function create(array $data);

    public function update(Notas $nota, array $data);

    public function delete(Notas $nota);

    public function find(int $id);

    public function all();
}
