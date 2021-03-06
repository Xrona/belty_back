<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartProductResource extends JsonResource
{
    public function toArray($request)
    {
        return array_merge(
            $this->only(
                'id',
                'count',
                'engraving',
            ),
            [
                'isGift' => $this->is_gift,
                'size' => $this->size->id,
                'color' => $this->color->id,
                'name' => $this->product->name,
                'price' => $this->price(),
                'colorList' => new ColorCollection($this->product->colors),
                'sizeList' => new SizeCollection($this->product->sizes),
                'imageList' => new ImageCollection($this->product->productImages),
            ],
        );
    }
}
