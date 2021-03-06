<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Filters\Product\ProductSearch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;


class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'article',
        'category_id',
        'material_id',
        'country_id',
        'discount_id',
        'enable_discount',
        'status',
        'bestseller',
        'guarantee',
        'width',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public static function search(Request $request): Builder
    {
        return (new ProductSearch())->apply($request);
    }


    public function getDiscountPrice() : float
    {
        if (is_null($this->discount_id)) {
            return  0;
        }

        if ($this->discount->is_percent) {
            $discountPrice = $this->price - (($this->price / 100) * $this->discount->value);
        } else {
            $discountPrice = $this->price - $this->discount->value;
        }

        return $discountPrice;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class);
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'product_color');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    public function discount(): BelongsTo
    {
        return  $this->belongsTo(Discount::class);
    }

    public function productImages(): HasMany
    {
        return  $this->hasMany(ProductImage::class);
    }

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }
}
