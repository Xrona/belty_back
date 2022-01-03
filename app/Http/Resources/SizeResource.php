<?php

declare(strict_types=1);

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class SizeResource extends  JsonResource
{
    public function toArray($request)
    {
        return $this->only(
            'id',
            'name',
        );
    }
}
