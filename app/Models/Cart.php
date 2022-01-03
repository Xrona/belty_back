<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Size;
use App\Models\Color;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
  use HasFactory;

  protected $table = 'cart';

  protected $fillable = [
      'user_id',
      'session_id',
  ];

  protected $guarded = [
      'id',
      'created_at',
      'updated_at',
  ];


  public function cartProducts(): HasMany
  {
    return $this->hasMany(CartProduct::class);
  }
}
