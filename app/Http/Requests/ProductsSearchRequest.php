<?php 

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsSearchRequest extends FormRequest
{

  public function rules()
  {
    return [
      'search' => 'nullable|string',
      ];
  }
}