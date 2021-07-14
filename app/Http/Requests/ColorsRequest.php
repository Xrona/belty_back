<?php 

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Color;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ColorsRequest extends FormRequest
{

  public function rules()
  {
    return [
      'name' => 'required|string',
      ];
  }
}