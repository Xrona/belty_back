<?php

declare(strict_types=1);

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    public function toArray($request)
    {
        return array_merge(
            $this->only(
                'id',
                'url',
                'queue',
            ),
        );
    }
}
