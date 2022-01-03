<?php 

declare(strict_types=1);

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartProduct extends Model
{
    use HasFactory;

    protected $table = 'cart_products';

    protected $fillable = [
        'cart_id',
        'count',
        'product_id',
        'engraving',
        'is_gift',
        'size_id',
        'color_id',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
}
