<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Http\Request;

class LoginRequest extends Request
{
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
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
