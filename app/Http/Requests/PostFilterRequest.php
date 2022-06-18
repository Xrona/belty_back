<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class PostFilterRequest extends  FormRequest
{
    #[ArrayShape(['page' => "string[]"])]
    public function  rules(): array
    {
        return  [
            'page' => [
                'nullable',
                'int',
                'min:1',
            ]
        ];
    }
}
