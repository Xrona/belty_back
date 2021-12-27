<?php


namespace App\Models\Filters\Product;


use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class OnlyDiscount implements Filterable
{
    public static function apply(Builder $builder, mixed $value): Builder
    {
        return $builder->where(function(Builder $query) use ($value) {
            return $query
                ->whereNotNull(['products.discount_id'])
                ->Where('products.enable_discount', '>', 0);
        });
    }
}
