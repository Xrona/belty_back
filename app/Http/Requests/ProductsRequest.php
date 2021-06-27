<?php 

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{

  public function rules()
  {
    return [
      'name' => 'required|string',
      'price' => 'required|string',
      'article' => 'required|string',
      'category_id' => [
        'required',
        Rule::exists((new Category)->getTable(), 'id'),
      ],
      ];
  }
}