<?php

declare(strict_types=1);

namespace App\Models\Filters\Post;

use App\Models\Post;
use App\Services\Filters\BaseSearch;
use App\Services\Filters\Searchable;

class PostSearch implements Searchable
{
    use BaseSearch;

    protected function getModelClass(): string
    {
        return Post::class;
    }
}
