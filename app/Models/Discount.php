<?php

declare(strict_types=1);

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';

    protected $fillable = [
        'value',
        'is_percent',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function Products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
