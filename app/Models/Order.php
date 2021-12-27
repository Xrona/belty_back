<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'surname',
        'name',
        'email',
        'phone',
        'post_index',
        'city',
        'street',
        'house',
        'flat',
        'status',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function orderProducts(): hasMany
    {
        return  $this->hasMany(OrderProduct::class);
    }

    public function getFullPrice(): int
    {
        $fullPrice = 0;

        foreach($this->orderProducts as $product) {
            $fullPrice += ($product->count * $product->buy_price);
        }

        return  $fullPrice;
    }

    public function getStatus(): string
    {
        return OrderStatusEnum::get($this->status);
    }
}
