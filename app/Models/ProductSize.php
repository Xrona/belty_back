<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSize extends Model
{
  use HasFactory;

  protected $table = 'product_sizes';

  protected $fillable = [
      'product_id',
      'size_id',
  ];

  protected $guarded = [
      'id',
      'created_at',
      'updated_at',
  ];
}
