<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $userRepository;

    //Construtor
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    //Index
    public function index()
    {
        return response()->json($this->userRepository->index(), Response::HTTP_OK);
    }
    //Create
    public function store(UserRequest $userRequest)
    {
        $user = $this->userRepository->create($userRequest->all());

        return response()->json($user, Response::HTTP_CREATED);
    }
    //Read
    public function show(int $id)
    {
        return response()->json($this->userRepository->find($id), Response::HTTP_OK);
    }
    //Update
    public function update(UserRequest $userRequest, int $id)
    {
        $user = $this->userRepository->find($id);

        if(!$user)
        {
            return response()->json(['message' => 'User não encontrado'], Response::HTTP_NOT_FOUND);
        }
        $userRequest['password'] = bcrypt($userRequest['password']);
        $this->userRepository->update($user, $userRequest->all());

        return response()->json($user, Response::HTTP_OK);
    }
    //Delete
    public function destroy(int $id)
    {
        $user = $this->userRepository->find($id);

        if (!$user) {
            return response()->json(['message' => 'User não encontrado'], Response::HTTP_NOT_FOUND);
        }

        $this->userRepository->delete($user);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
