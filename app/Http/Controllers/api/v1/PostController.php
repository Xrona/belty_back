<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\PostFilterRequest;
use App\Http\Resources\PostListResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PostController extends ResponseController
{
    public function index(PostFilterRequest $request): JsonResponse
    {
        $builder = (Post::search())->apply($request);

        return $this->sendResponse(new PostListResource($builder), 'posts');
    }
}
