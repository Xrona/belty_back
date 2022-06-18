<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class ProductsRequest extends FormRequest
{

    #[ArrayShape([
        'name' => "string",
        'price' => "string",
        'article' => "string",
        'country_id' => "string",
        'sizes' => "string",
        'category_id' => "array"
    ])] public function rules(): array
    {
        return [
            'name' => 'required|string',
            'price' => 'required|string',
            'article' => 'required|string',
            'country_id' => 'required|int',
            'sizes' => 'required|array',
            'category_id' => [
                'required',
                Rule::exists((new Category)->getTable(), 'id'),
            ],
        ];
    }
}
