<?php

namespace App\Interfaces;

use App\Models\User;

interface UserInterface
{
    public function index();

    public function create(array $data);

    public function update(User $user, array $data);

    public function delete(User $user);

    public function find(int $id);

    public function all();
}
