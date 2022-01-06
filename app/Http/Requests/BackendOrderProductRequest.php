<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendOrderProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product_name' => [
                'string',
            ],
            'count' => [
                'int',
                'min:1',
            ],
            'color' => [
                'string',
            ],
            'size' => [
                'integer',
            ],
            'is_gift' => [
                'int',
                'min:0',
                'max:1',
            ],
            'engraving' => [
                'string',
            ],
            'buy_price' => [
                'integer',
                'min:1',
            ],
        ];
    }
}
