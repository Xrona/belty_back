<?php

declare(strict_types=1);

namespace App\Services\Filters;

use Illuminate\Http\Request;

interface Searchable
{
    public function apply(Request $request);
}
