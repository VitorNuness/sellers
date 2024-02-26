<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SaleControllerTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     */
    public function testSaleShow(): void
    {
        $data = [
            "name" => "Tester",
            "mail" => "test@teste.com",
        ];
        $this->post('/api/sellers', $data);

        $data = [
            "seller" => "1",
            "value" => "20.00",
        ];
        $this->post('/api/sales', $data);
        $request = $this->get('/api/sellers/1/sales');
        $request->assertOK();
    }

    public function testSalesEmpty(): void
    {
        $request = $this->get('/api/sellers/1/sales');
        $request->assertOk()
                ->assertJsonStructure();
    }

    public function testSalesStore(): void
    {
        $data = [
            "name" => "Tester",
            "mail" => "test@teste.com",
        ];
        $this->post('/api/sellers', $data);

        $data = [
            "seller" => "1",
            "value" => "20.00",
        ];
        $response = $this->post('/api/sales/store', $data);
        $response->assertCreated()
                 ->assertJsonStructure([
                    "data" => [
                        "seller" => [
                            "id",
                            "name",
                            "mail",
                            "created_at",
                            "updated_at",
                        ],
                        "value",
                        "created_at",
                        "updated_at",
                    ],
                 ]);
    }

    public function testSalesStoreNotValid(): void
    {
        $data = [
            "seller" => "1",
            "value" => "20.00",
        ];
        $response = $this->post('/api/sales/store', $data);
        $response->assertInvalid();
    }
}
