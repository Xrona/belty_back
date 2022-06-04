<?php

declare(strict_types=1);

namespace App\Http\Resources;


use App\Services\traits\ProductPriceTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class OneProductResource extends  JsonResource
{
    use ProductPriceTrait;

    public function toArray($request): array
    {
        return array_merge(
            $this->only(
                'id',
                'name',
                'article',
                'width',
                'guarantee',
                'bestseller'
            ),
            [
                'old_price' => $this->price,
                'price' => $this->checkDiscountPrice($this),
                'discount' => $this->getDiscount($this),
                'material' => $this->material->name,
                'country' => $this->country->name,
                'colors' => new ColorCollection($this->colors),
                'images' => new ImageCollection($this->productImages),
                'sizes' => new SizeCollection($this->sizes),
            ],
        );
    }
}
