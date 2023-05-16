<?php

namespace Tests\Feature;

use App\Models\User;
use App\Rules\PasswordRule;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;//Reverte as alterações feitas na bd após os testes
    use WithFaker;//gerar dados randomicos automaticamente
    public function testCreateUser()
    {
        $response = $this->postJson('user', [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt(PasswordRule::generatePassword()),
            'remember_token' => Str::random(10),
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function testShowUser()
    {
        $user = User::factory()->create();

        $response = $this->getJson('user/'.$user->id);

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testUpdateUser()
    {
        $user = User::factory()->create();

        $response = $this->putJson('user/' . $user->id, [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt(PasswordRule::generatePassword()),
            'remember_token' => Str::random(10),
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testDeleteUser()
    {
        $user = User::factory()->create();

        $response = $this->deleteJson('user/' . $user->id);

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }
}
