<?php 

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
{

  public function rules()
  {
    return [
      'name' => 'required|string',
      'id' => [
        'required',
        Rule::exists((new Product)->getTable(), 'category_id'),
      ],
      ];
  }
}