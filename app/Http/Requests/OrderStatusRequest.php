<?php

declare(strict_types=1);

namespace App\Http\Requests;


use App\Enums\OrderStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class OrderStatusRequest extends  FormRequest
{
    #[ArrayShape(['status' => "array"])]
    public function rules(): array
    {
        return [
            'status' => [
                'required',
                Rule::in(array_keys(OrderStatusEnum::getList())),
            ]
        ];
    }
}
