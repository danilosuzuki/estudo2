<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotasRequest;
use App\Models\Notas;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use RuntimeException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Services\NotasService;

class NotasController extends Controller
{
    protected $notasService;

    //Construtor
    public function __construct(NotasService $notasService){
        $this->notasService = $notasService;
    }

    //Index
    public function index()
    {
        return response()->json($this->notasService->index(), Response::HTTP_OK);
    }
    //Create
    public function store(NotasRequest $notasRequest)
    {
        $nota = $this->notasService->create($notasRequest->all());

        return response()->json($nota, Response::HTTP_CREATED);
    }
    //Read
    public function show(int $id)
    {
        return response()->json($this->notasService->find($id), Response::HTTP_OK);
    }
    //Update
    public function update(NotasRequest $notasRequest, int $id)
    {
        $nota = $this->notasService->find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota não encontrada'], Response::HTTP_NOT_FOUND);
        }

        $this->notasService->update($nota, $notasRequest->all());

        return response()->json($nota, Response::HTTP_OK);
    }
    //Delete
    public function destroy(int $id)
    {
        $nota = $this->notasService->find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota não encontrada'], Response::HTTP_NOT_FOUND);
        }

        $this->notasService->delete($nota);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
