<?php


namespace App\Models\Filters\Product;


use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class SortingDate implements Filterable
{
    public static function apply(Builder $builder, mixed $value): Builder
    {
        return $builder
            ->orderBy('products.created_at', $value);
    }
}
