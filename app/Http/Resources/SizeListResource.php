<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Http\Resources\SizeCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class SizeListResource extends JsonResource
{
    public function toArray($request)
    {
        return new SizeCollection($this->resource->get());
    }
}
