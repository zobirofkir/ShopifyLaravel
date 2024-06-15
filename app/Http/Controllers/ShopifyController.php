<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shopify\Clients\Rest;

class ShopifyController extends Controller
{
    protected $shopify;

    public function __construct(Rest $shopify)
    {
        $this->shopify = $shopify;
    }

    public function getAllProducts()
    {
        $response = $this->shopify->get('products');
        return response()->json($response->getDecodedBody());
    }

    
}
