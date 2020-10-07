<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    /**
     * /items [GET]
     */
    public function testShouldReturnAllProducts(){

        $this->get("api/v1/items", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'name',
                    'price',
                    'description',
                    'created_at',
                    'updated_at'
                ]
            ]
        ]);

    }

    /**
     * /products/id [GET]
     */
    public function testShouldReturnProduct(){
        $this->get("/api/v1/items/2", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'name',
                    'price',
                    'description',
                    'created_at',
                    'updated_at'
                ]
            ]
        );

    }

    /**
     * /products [POST]
     */
    public function testShouldCreateProduct(){

        $parameters = [
            'name' => 'Test',
            'price' => 'Test_price',
            'description' => 'Test_description'
        ];

        $this->post("/api/v1/items", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
                'data' =>
                [
                    'name',
                    'price',
                    'description',
                    'created_at',
                    'updated_at'
                ]
            ]
        );
    }

    /**
     * /products/id [PUT]
     */
    public function testShouldUpdateProduct()
    {

        $parameters = [
            'product_name' => 'new_test',
            'product_description' => 'new_test'
        ];

        $this->put("api/v1/items/1", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'name',
                    'price',
                    'description',
                    'created_at',
                    'updated_at'
                ]
            ]
        );
    }

    /**
     * /products/id [DELETE]
     */
    public function testShouldDeleteProduct(){

        $this->delete("api/v1/items/1", [], []);
        $this->seeStatusCode(410);
        $this->seeJsonStructure([
            'status',
            'message'
        ]);
    }
}
