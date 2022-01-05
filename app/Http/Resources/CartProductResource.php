<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartProductResource extends JsonResource
{
    public function toArray($request)
    {
        return array_merge(
            $this->only(
                'session_id',
                'user_id',
                'id',
                'count',
                'engraving',
                'is_gift',
            ),
            [
                'size' => $this->size->name,
                'color' => $this->color->name,
            ],
        );
    }
}
