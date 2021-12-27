<?php


namespace App\Models\Filters\Product;


use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class Search implements Filterable
{

    public static function apply(Builder $builder, mixed $value): Builder
    {

        return $builder
            ->select(['products.*'])
            ->with(['category', 'country', 'material'])
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('countries', 'products.country_id', '=', 'countries.id')
            ->leftJoin('materials', 'products.material_id', '=', 'materials.id')
            ->where(function(Builder $query) use ($value) {
                return $query
                    ->where('products.name', 'ilike', "%$value%")
                    ->orWhere('products.article', 'ilike', "%$value%")
                    ->orWhere('categories.name', 'ilike', "%$value%")
                    ->orWhere('countries.name', 'ilike', "%$value%")
                    ->orWhere('materials.name', 'ilike', "%$value%");

            });

    }
}
