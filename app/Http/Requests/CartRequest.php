<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
    public function rules()
    {
        return [
            'session_id' => [
                'string',
                'nullable',
            ],
        ];
    }
}
