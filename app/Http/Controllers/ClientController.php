<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use Illuminate\Http\Request;
use Shopify\Clients\Rest;

class ClientController extends Controller
{
    protected $shopify;
    public function __construct(Rest $shopify)
    {
        return $this->shopify = $shopify;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = $this->shopify->get("customers");
        return $response->getDecodedBody();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $client = [
            "customer" => $request->validated()
        ];

        $response = $this->shopify->post("customers", $client);
        $responseData = $response->getDecodedBody();
        return ClientResource::make((object) $responseData['customer'])->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = $this->shopify->get("customers/$id");
        return $response->getDecodedBody();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, string $id)
    {
        $client = [
            "customer" => $request->validated()
        ];
        $response = $this->shopify->put("customers/$id", $client);
        $responseData = $response->getDecodedBody();
        return ClientResource::make((object) $responseData['customer'])->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->shopify->delete("customers/$id");
        return true;
    }
}
