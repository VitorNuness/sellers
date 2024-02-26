<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SellerControllerTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     */
    public function testSellerIndexEmpty(): void
    {
        $response = $this->get('/api/sellers');

        $response->assertOk()
            ->assertJsonStructure(["data"]);
    }

    public function testSellerIndex(): void
    {
        $data = [
            "name" => "Tester",
            "mail" => "test@teste.com",
        ];
        $this->post('/api/sellers', $data);

        $response = $this->get('/api/sellers');
        $response->assertOk()
            ->assertJsonStructure([
                "data" => [
                    [
                        "id",
                        "name",
                        "mail",
                        "created_at",
                        "updated_at",
                    ],
                ],
            ]);
    }

    public function testSellerStore(): void
    {
        $data = [
            "name" => "Tester",
            "mail" => "test@teste.com",
        ];
        $response = $this->post('/api/sellers', $data);
        $response->assertCreated()
                 ->assertJsonStructure([
                "data" => [
                    "id",
                    "name",
                    "mail",
                    "created_at",
                    "updated_at",
                ],
            ]);
    }

    public function testSellerStoreError(): void
    {
        $data = [
            "name" => null,
            "mail" => null,
        ];
        $response = $this->post('/api/sellers', $data);
        $response->assertInvalid();
    }

    public function testSellerShow(): void
    {
        $data = [
            "name" => "Tester",
            "mail" => "test@teste.com",
        ];
        $this->post('/api/sellers', $data);
        $response = $this->get('/api/sellers/1');
        $response->assertOk()
                 ->assertJsonStructure([
                "data" => [
                    "id",
                    "name",
                    "mail",
                    "created_at",
                    "updated_at",
                ],
            ]);
    }

    public function testSellerNotFound(): void
    {
        $response = $this->get('/api/sellers/1');
        $response->assertNotFound();
    }

    public function testSellerUpdate(): void
    {
        $data = [
            "name" => "Tester",
            "mail" => "test@teste.com",
        ];
        $this->post('/api/sellers', $data);

        $data["name"] = "Testando";
        $response = $this->put('/api/sellers/1', $data);
        $response->assertOk()
                 ->assertJsonStructure([
                "data" => [
                    "id",
                    "name",
                    "mail",
                    "created_at",
                    "updated_at",
                ],
            ]);
    }

    public function testSellerDelete(): void
    {
        $data = [
            "name" => "Tester",
            "mail" => "test@teste.com",
        ];
        $this->post('/api/sellers', $data);
        $response = $this->delete('/api/sellers/1');
        $response->assertNoContent();
    }
}
