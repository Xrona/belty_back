<?php


namespace App\Models\Filters\Product;


use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class OnlyBestseller implements Filterable
{
    public static function apply(Builder $builder, mixed $value): Builder
    {
        return $builder
            ->where('products.bestseller', '>', 0);
    }
}
