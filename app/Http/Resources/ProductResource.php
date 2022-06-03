<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\Pure;

/**
 * Class ProductResource
 * @mixin Product
 * @package App\Http\Resources
 */
class ProductResource extends JsonResource
{
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
                'price' => $this->checkDiscountPrice(),
                'discount' => $this->getDiscount(),
                'image' => new ImageResource($this->productImages->first()),
            ]
        );
    }

    public function checkDiscountPrice() : float|string
    {
        if ($this->enable_discount && $this->discount_id) {
            return $this->getDiscountPrice();
        } else {
            return $this->price;
        }
    }

    public function getDiscount(): ?string
    {
        if ($this->enable_discount && $this->discount_id) {
            if ($this->discount->is_percent) {
                return "{$this->discount->value} %";
            } else {
                return  "{$this->discount->value} BYN";
            }
        }

        return null;
    }
}
