<?php

declare(strict_types=1);


namespace App\Models;

use App\Models\Filters\Post\PostSearch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\Pure;

class Post extends  Model
{
    protected $table = 'posts';

    protected $fillable = [
        'name',
        'head',
        'content',
        'url',
        'path',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];


    #[Pure] public static function search(): PostSearch
    {
        return new PostSearch();
    }
}
