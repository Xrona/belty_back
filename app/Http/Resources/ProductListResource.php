<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class ProductListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    #[ArrayShape(['rows' => "array"])]
    public function toArray($request): array
    {
        $page = $request->get('page');

        if($page !== null) {
            $products = new ProductCollection(
                $this
                    ->resource
                    ->paginate(perPage: $request->get('perPage'), page: $page)
                    ->items()
            );
        } else {
            $products = new ProductCollection($this->resource->get());
        }

        return [
            'rows' => $products,
        ];
    }
}
