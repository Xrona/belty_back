<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Http\Resources\ColorCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ColorListResource extends JsonResource
{
    public function toArray($request)
    {
        return new ColorCollection($this->resource->get());
    }
}
