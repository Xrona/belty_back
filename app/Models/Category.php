<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
  use HasFactory;

  protected $table = 'categories';

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