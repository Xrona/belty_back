<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductCart extends Model
{
  use HasFactory;

  protected $table = 'products_cart';

  protected $fillable = [
      'cart_id',
      'product_id',
      'color_id',
      'count',
      'angraving',
      'is_gift',
      'size_id',
  ];

  protected $guarded = [
      'id',
      'created_at',
      'updated_at',
  ];
}