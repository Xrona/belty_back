<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Http\Resources\CartProductCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CartProductListResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'rows' => new CartProductCollection($this->resource->get()),
        ];
    }
}
