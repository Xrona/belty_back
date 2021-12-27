<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_products';

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'buy_price',
        'count',
        'color',
        'size',
        'is_gift',
        'engraving',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];


    public function product() :BelongsTo
    {
        return  $this->belongsTo(Product::class);
    }

    public function order() :BelongsTo
    {
        return  $this->belongsTo(Order::class);
    }
}
