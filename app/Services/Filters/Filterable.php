<?php

declare(strict_types=1);

namespace App\Services\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Interface Filterable
 * @package App\Services\Filters
 */
interface Filterable
{
    public static function apply(Builder $builder, mixed $value): Builder;
}
