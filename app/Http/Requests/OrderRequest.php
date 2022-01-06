<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'session' => [
                'string',
                Rule::requiredIf(function () {
                    return !auth('sanctum')->check();
                }),
            ],
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
        ];
    }
}
