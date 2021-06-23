<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
  use HasFactory;

  protected $table = 'reviews';

  protected $fillable = [
      'user_id',
      'appraisal',
      'review_text',
  ];

  protected $guarded = [
      'id',
      'created_at',
      'updated_at',
  ];
}