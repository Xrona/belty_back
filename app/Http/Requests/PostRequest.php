<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class PostRequest extends FormRequest
{
    #[ArrayShape([
        'name' => "string",
        'head' => "string",
        'content' => "string"
    ])] public function rules(): array
    {
        return [
            'name' => 'required|string',
            'head' => 'required|string',
            'content' => 'required|string',
        ];
    }
}
