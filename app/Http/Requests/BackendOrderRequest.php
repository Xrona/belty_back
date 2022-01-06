<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BackendOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'surname' => [
                'required',
                'string',
            ],
            'name' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'email',
            ],
            'phone' => [
                'required',
                'string',
                'min:11',
                'max:13',
            ],
            'post_index' => [
                'required',
                'integer',
                'digits:6',
            ],
            'city' => [
                'required',
                'string',
            ],
            'street' => [
                'required',
                'string',
            ],
            'house' => [
                'required',
                'string',
            ],
            'flat' => [
                'required',
                'string',
            ],
            'products' => [
                'array',

                'products.*.product_name' => [
                    'string',
                ],
                'products.*.count' => [
                    'int',
                    'min:1',
                ],
                'products.*.color' => [
                    'string',
                ],
                'products.*.size' => [
                    'integer',
                ],
                'products.*.is_gift' => [
                    'int',
                    'min:0',
                    'max:1',
                ],
                'products.*.engraving' => [
                    'string',
                ],
                'products.*.buy_price' => [
                    'integer',
                    'min:1',
                ],
            ],
        ];
    }
}
