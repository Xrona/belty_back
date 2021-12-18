<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = [
        'name',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
