<?php

declare(strict_types=1);

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentFile extends Model
{
    use HasFactory;

    protected $table = 'comment_files';

    protected $fillable = [
        'comment_id',
        'path',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

}
