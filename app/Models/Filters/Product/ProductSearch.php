<?php

declare(strict_types=1);

namespace App\Models\Filters\Product;


use App\Models\Product;
use App\Services\Filters\BaseSearch;
use App\Services\Filters\Searchable;

class ProductSearch implements Searchable
{
    use BaseSearch;

    protected function getModelClass(): string
    {
        return Product::class;
    }
}
