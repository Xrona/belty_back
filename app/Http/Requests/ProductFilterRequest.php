<?php

declare(strict_types=1);


namespace App\Http\Requests;


use App\Enums\SortingEnum;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductFilterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'search' => [
                'nullable',
                'string',
            ],
            'category' => [
                'nullable',
                Rule::exists((new Category)->getTable(),'id'),
            ],
            'sorting_price' => [
                'nullable',
                Rule::in(array_keys(SortingEnum::getList())),
            ],
            'soring_date' => [
                'nullable',
                Rule::in(array_keys(SortingEnum::getList())),
            ],
            'only_discount' => [
                'nullable',
                'int',
                'max:1',
                'min:0',
            ],
            'only_bestseller' => [
                'nullable',
                'int',
                'max:1',
                'min:0',
            ]
        ];
    }
}
