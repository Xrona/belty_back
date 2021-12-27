<?php

declare(strict_types=1);


namespace App\Http\Resources;


use App\Models\Color;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ColorResource
 * @mixin Color
 * @package App\Http\Resources
 */
class ColorResource extends  JsonResource
{
    public function toArray($request)
    {
        return array_merge(
            $this->only(
                'id',
                'name',
            ),
        );
    }
}
