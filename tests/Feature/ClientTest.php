<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory as Faker;

class ClientTest extends TestCase
{
    /**
     * Test Get Clients.
     */
    public function testGetClients()
    {
        $response = $this->get("api/clients");
        $response->assertStatus(200);
    }

    /**
     * Test Create Client
     */
    public function testCreateClient()
    {
        $faker = Faker::create();
        $createForm = [
            "first_name" => $faker->firstName(),
            "last_name" => $faker->lastName(),
            "email" => $faker->email()         
        ];
    
        $response = $this->postJson("api/clients",$createForm);
        $response->assertStatus(201);
    }
    
    /**
     * Test Show Client
     */
    public function testShowClient()
    {
        $faker = Faker::create();
        $createForm = [
            "first_name" => $faker->firstName(),
            "last_name" => $faker->lastName(),
            "email" => $faker->email()         
        ];
        $response1 = $this->post("api/clients", $createForm);
        $response1->assertStatus(201);

        $id = $response1->json()["data"]["id"];
        $response2 = $this->get("api/clients/$id");
        $response2->assertStatus(200);
    }

    /**
     * Test Update Client
     */
    public function testUpdateClient()
    {
        $faker = Faker::create();
        $createForm = [
            "first_name" => $faker->firstName(),
            "last_name" => $faker->lastName(),
            "email" => $faker->email()         
        ];
        $response1 = $this->post("api/clients", $createForm);
        $response1->assertStatus(201);

        $id = $response1->json()['data']['id'];
        $updateForm = [
            "first_name" => "zobir",
            "last_name" => "ofkir",
            "email" => $faker->email()         
        ];
        $response2 = $this->put("api/clients/$id", $updateForm);
        $response2->assertStatus(200);
    }
    
    /**
     * Test Delete Client
     */
    public function testDeleteClient()
    {
        $faker = Faker::create();
        $createForm = [
            "first_name" => $faker->firstName(),
            "last_name" => $faker->lastName(),
            "email" => $faker->email()         
        ];
        $response1 = $this->post("api/clients", $createForm);
        $response1->assertStatus(201);

        $id = $response1->json()['data']['id'];
        
        $response2 = $this->delete("api/clients/$id");
        $response2->assertStatus(200);
    }
}
