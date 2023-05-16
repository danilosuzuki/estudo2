<?php

namespace App\Services;

use App\Models\Notas;
use App\Repositories\NotasRepository;

class NotasService
{
    private $repo;

    public function __construct(NotasRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return $this->repo->all();
    }

    public function create(array $data)
    {
        return $this->repo->create($data);
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
        return $this->repo->find($id);
    }

    public function all()
    {
        return $this->repo->all();
    }

}

?>
