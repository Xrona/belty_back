<?php 

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Models\Category;
use App\Http\Requests\CategoriesRequest;
use App\Http\Resources\CategoryListResource;
use Illuminate\Http\JsonResponse;

class CategoryController extends ResponseController
{
  public function index(): JsonResponse
  {
      $builder = Category::select('categories.*');

      return $this->sendResponse(new CategoryListResource($builder), 'categories');
  }

  public function store(CategoriesRequest $request): JsonResponse
  {
      $requestData = $request->validated();

      $category =  new Category($requestData);

      return $this->sendResponse($category->saveOrFail(), 'added');
  }

  public function show($id)
  {
      return $this->sendReposne();
  }
}
