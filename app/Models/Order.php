<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
  use HasFactory;

  protected $table = 'orders';

  protected $fillable = [
      'user_id',
      'data',
      'status',
  ];

  protected $guarded = [
      'id',
      'created_at',
      'updated_at',
  ];
}