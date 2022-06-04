<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Product;
use App\Services\traits\ProductPriceTrait;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\Pure;

/**
 * Class ProductResource
 * @mixin Product
 * @package App\Http\Resources
 */
class ProductResource extends JsonResource
{
    use ProductPriceTrait;
    /**
     * @inheritDoc
     */
    public function toArray($request): array
    {
        return array_merge(
            $this->only(
                'id',
                'name',
                'article',
            ),
            [
                'old_price' => $this->price,
                'price' => $this->checkDiscountPrice($this),
                'discount' => $this->getDiscount($this),
                'image' => new ImageResource($this->productImages->first()),
                'bestseller' => $this->bestseller,
            ]
        );
    }
}
