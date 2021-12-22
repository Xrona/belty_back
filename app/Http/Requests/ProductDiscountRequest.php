<?php

declare(strict_types=1);

namespace App\Http\Requests;


use App\Models\Discount;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductDiscountRequest extends  FormRequest
{
    public  function rules()
    {
        return [
            'discount_id' => [
              'required',
              Rule::exists((new Discount())->getTable(), 'id'),
            ],
            'product_id' => [
                'required',
                Rule::exists((new Product())->getTable(), 'id'),
            ],
        ];
    }
}
