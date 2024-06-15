<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "body_html" => $this->body_html,
            "vendor" => $this->vendor,
            "product_type" => $this->product_type,
            "tags" => $this->tags,
            "variants" => $this->variants,
            "images" => $this->images,
        ];
    }
}
