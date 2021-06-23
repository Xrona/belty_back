<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'article',
        'category_id',
        'material_id',
        'country_id',
        'status',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
}
