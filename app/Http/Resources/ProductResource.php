<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * @inheritDoc
     */
    public function toArray($request)
    {
        return array_merge(
            $this->only(
                'id',
                'name',
                'price',
                'article',
                'category_id',
                'material_id',
                'country_id',
                'status'
            )
        );
    }
}
