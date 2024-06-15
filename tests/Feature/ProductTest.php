<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Test Get Products
    */
    public function testGetProducts()
    {
        $response = $this->get("api/products");
        $response->assertStatus(200);
    }

    /**
     * Test Create Product 
    */
    public function testCreateProduct()
    {
        $postData = [
            "title" => "zobir",
            "body_html" => "zobirofkir Testing Body",
            "vendor" => "this is a vendor",
            "product_type" => "This is a product_type",
            "tags" => "Pc",
            "variants" => "this is a variants",
            "images" => "https://TstImage"
        ];

        $response = $this->post("api/products", $postData);
        // dd($response->json());
        $response->assertStatus(201);
    }

    /**
     * Test Show Product 
    */
    public function testShowProduct()
    {
        $postData = [
            "title" => "zobir",
            "body_html" => "zobirofkir Testing Body",
            "vendor" => "this is a vendor",
            "product_type" => "This is a product_type",
            "tags" => "Pc",
            "variants" => "this is a variants",
            "images" => "https://TstImage"
        ];
    
        $response1 = $this->post("api/products", $postData);
        $response1->assertStatus(201);
        $id = $response1->json()['data']['id'];
        $response = $this->get("api/products/$id");
        $response->assertStatus(200);
    }

    /**
     * Test Update Product 
    */
    public function testUpdateProduct()
    {
        $postData = [
            "title" => "zobir",
            "body_html" => "zobirofkir Testing Body",
            "vendor" => "this is a vendor",
            "product_type" => "This is a product_type",
            "tags" => "Pc",
            "variants" => "this is a variants",
            "images" => "https://TstImage"
        ];
    
        $response1 = $this->post("api/products", $postData);
        $response1->assertStatus(201);
    
        $id = $response1->json()['data']['id'];
        
        
        $updateData = [
            "title" => "zobir 2",
            "body_html" => "Body 2",
            "vendor" => "this is a vendor",
            "product_type" => "This is a product_type",
            "tags" => "Pc",
            "variants" => "this is a variants",
            "images" => "https://TstImage"
        ];
    
        $response2 = $this->put("api/products/$id", $updateData);
        $response2->assertStatus(200); // Assert the status after the PUT request
    }

    /**
     * Test Delete Product
    */
    public function testDeleteProduct()
    {
        $postData = [
            "title" => "zobir",
            "body_html" => "zobirofkir Testing Body",
            "vendor" => "this is a vendor",
            "product_type" => "This is a product_type",
            "tags" => "Pc",
            "variants" => "this is a variants",
            "images" => "https://TstImage"
        ];
    
        $response1 = $this->post("api/products", $postData);
        $response1->assertStatus(201);
        $id = $response1->json()['data']['id'];

        $response = $this->delete("api/products/$id");
        $response->assertStatus(200);
    }
        
}
