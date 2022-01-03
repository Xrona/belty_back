<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Size;
use App\Models\User;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => [
                'nullable',
                Rule::exists((new User)->getTable(), 'id'),
            ],
            'session_id' => [
                'string'
            ],
            'product_id' => [
                'int',
                Rule::exists((new Product)->getTable(), 'id')
            ],
            'count' => [
                'int',
                'min:1',
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
            ],
            'color_id' => [
                'int',
                Rule::exists((new Color)->getTable(), 'id'),
            ],
            'size_id' => [
                'int',
                Rule::exists((new Size)->getTable(), 'id'),
            ],
        ];
    }
}
