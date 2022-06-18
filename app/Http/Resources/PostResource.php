<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends  JsonResource
{
    public function toArray($request): array
    {
        return array_merge(
            $this->only(
                'id',
                'name',
                'head',
                'content',
            ),
            [
                'date' => $this->updated_at,
                'image' => $this->url,
            ]
        );
    }
}
