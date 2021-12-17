<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductsRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|string',
            'price' => 'required|string',
            'article' => 'required|string',
            'country_id' => 'required|int',
            'sizes' =>  'required|array',
            'category_id' => [
                'required',
                Rule::exists((new Category)->getTable(), 'id'),
            ],
        ];
    }
}
