<?php

declare(strict_types=1);

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class OneProductResource extends  JsonResource
{
    public function toArray($request)
    {
        return array_merge(
            $this->only(
                'id',
                'name',
                'article',
                'width',
                'guarantee'
            ),
            [
                'material' => $this->material->name,
                'country' => $this->country->name,
                'colors' => new ColorCollection($this->colors),
                'images' => new ImageCollection($this->productImages),
                'sizes' => new SizeCollection($this->sizes),
            ],
        );
    }
}
