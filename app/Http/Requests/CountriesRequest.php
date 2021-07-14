<?php 

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountriesRequest extends FormRequest
{

  public function rules()
  {
    return [
      'name' => 'required|string',
      ];
  }
}