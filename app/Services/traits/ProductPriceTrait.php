<?php

namespace App\Services\traits;

trait ProductPriceTrait
{
    public function checkDiscountPrice($context) : float|string
    {
        if ($context->enable_discount && $context->discount_id) {
            return $context->getDiscountPrice();
        } else {
            return $context->price;
        }
    }

    public function getDiscount($context): ?string
    {
        if ($context->enable_discount && $context->discount_id) {
            if ($context->discount->is_percent) {
                return "{$context->discount->value} %";
            } else {
                return  "{$context->discount->value} BYN";
            }
        }

        return null;
    }
}
