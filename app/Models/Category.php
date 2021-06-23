<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}