<?php 

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\JsonResponse;
use App\Models\Color;

class ColorController extends ResponseController
{
  

  public function show($id)
  {
      return $this->sendReposne();
  }
}