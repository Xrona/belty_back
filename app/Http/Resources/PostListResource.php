<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostListResource extends JsonResource
{
    public function toArray($request)
    {
        $page = $request->get('page');

        if ($page !=null ) {
            $posts = new ProductCollection(
                $this->resource
                ->paginate(perPage: $request->get('perPage'), page: $page)
                ->items()
            );
        } else {
            $posts = new PostCollection($this->resource->get());
        }

        return [
            'rows'=> $posts
        ];
    }
}
