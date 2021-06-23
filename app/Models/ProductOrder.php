<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductOrder extends Model
{
  use HasFactory;

  protected $table = 'product_orders';

  protected $fillable = [
      'order_id',
      'count',
      'angraving',
      'in_product',
      'is_gift',
      'size',
      'date_delivery',
  ];

  protected $guarded = [
      'id',
      'created_at',
      'updated_at',
  ];
}