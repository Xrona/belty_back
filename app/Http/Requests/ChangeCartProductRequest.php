<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Size;
use App\Models\Color;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ChangeCartProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'count' => [
                'int',
                'nullable',
                'min:0',
            ],
            'color' => [
                'int',
                'nullable',
                Rule::exists((new Color)->getTable(), 'id'),
            ],
            'size' => [
                'int',
                'nullable',
                Rule::exists((new Size)->getTable(), 'id'),
            ],
            'engraving' => [
                'nullable',
                'string',
            ],
            'is_gift' => [
                'nullable',
                'int',
                'min:0',
                'max:1',
            ]
        ];
    }
}
