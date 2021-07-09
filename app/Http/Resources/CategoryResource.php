<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            )
        );
    }
}
