<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:25',
            ],
            'email' => [
                'email',
                'required',
            ],
            'password' => [
                'min:6',
                'required_with:password_confirm',
                'same:password_confirm',
            ],
            'password_confirm' => [
                'string',
                'min:6',
            ],
            'session' => [
                'string',
                'nullable',
            ],
        ];
    }
}
