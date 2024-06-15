<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Shopify\Clients\Rest;

class ProductController extends Controller
{
    protected $shopify;

    public function __construct(Rest $shopify)
    {
        $this->shopify = $shopify;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = $this->shopify->get("products");
        // return ProductResource::collection(
        //     $response->getDecodedBody()
        // );
        return $response->getDecodedBody();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = [
            'product' => $request->validated()
        ];
    
        $response = $this->shopify->post("products", $product);
        $responseData = $response->getDecodedBody();

        return ProductResource::make((object) $responseData['product'])->response()->setStatusCode(201);
    }
    
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = $this->shopify->get("products/$id");
        return $response->getDecodedBody();
        // return ProductResource::make(
        //     (object) $response->getDecodedBody()['product']
        // );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $product = [
            "product" => $validatedData
        ];
        $response = $this->shopify->put("products/$id.json", $product);
        $responseData = $response->getDecodedBody();
        $productResource = new ProductResource((object) $responseData['product']);    
        return $productResource->response()->setStatusCode(200);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->shopify->delete("products/{$id}");
        return true;
    }
}
