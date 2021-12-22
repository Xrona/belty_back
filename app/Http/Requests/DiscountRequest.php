<?php


namespace App\Http\Requests;


use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DiscountRequest extends FormRequest
{
    public function rules()
    {
        return [
            'value' => 'required|int',
            'is_percent' => 'nullable|int',
            'products' => [
                'nullable',
                'array',
                Rule::exists((new Product())->getTable(), 'id'),
            ]
        ];
    }
}
