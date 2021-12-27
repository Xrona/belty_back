<?php


namespace App\Http\Requests;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ImageDeleteRequest extends  FormRequest
{
    public function rules()
    {
        return [
            'id' => 'int|nullable',
            'name' => 'required|string',
        ];
    }
}
