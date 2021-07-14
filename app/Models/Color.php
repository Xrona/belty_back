<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Color extends Model
{
  use HasFactory;

  protected $table = 'colors';

  protected $fillable = [
      'name',
  ];

  protected $guarded = [
      'id',
      'created_at',
      'updated_at',
  ];

  public function product(): BelongsTo
  {
      return $this->belongsTo(Product::class);
  }
}