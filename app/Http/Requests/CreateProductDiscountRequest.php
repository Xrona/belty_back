<?php

declare(strict_types=1);

namespace App\Http\Requests;


use App\Models\Discount;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProductDiscountRequest extends  FormRequest
{
    public  function rules()
    {
        return [
            'value' => 'required|integer',
            'is_new' => 'nullable|int',
            'product_id' => [
                'required',
                Rule::exists((new Product())->getTable(), 'id'),
            ],
        ];
    }
}
