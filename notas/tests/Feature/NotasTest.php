<?php

namespace Tests\Feature;

use App\Models\Notas;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class NotasTest extends TestCase
{
    use DatabaseTransactions;//Reverte as alterações feitas na bd após os testes
    use WithFaker;//gerar dados randomicos automaticamente
    public function testCreateNotas()
    {
        $response = $this->postJson('notas', [
            'title' => $this->faker->name(),
            'message' => $this->faker->words(20, true),
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function testShowNotas()
    {
        $nota = Notas::factory()->create();

        $response = $this->getJson('notas/'.$nota->id);

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testUpdateNotas()
    {
        $nota = Notas::factory()->create();

        $response = $this->putJson('notas/' . $nota->id, [
            'title' => $this->faker->name(),
            'message' => $this->faker->words(20, true),
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testDeleteNotas()
    {
        $nota = Notas::factory()->create();

        $response = $this->deleteJson('notas/' . $nota->id);

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }


}
