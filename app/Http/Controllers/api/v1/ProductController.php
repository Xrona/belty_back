<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductsRequest;
use App\Http\Resources\ProductListResource;
use Illuminate\Http\JsonResponse;


class ProductController extends ResponseController
{
    public function index(): JsonResponse
    {
        $builder = Product::select('products.*');

        return $this->sendResponse(new ProductListResource($builder), 'products');
    }


    public function store(ProductsRequest $request): JsonResponse
    {
        $requestData = $request->validated();

        $product =  new Product($requestData);

        return $this->sendResponse($product->saveOrFail(), 'added');
    }

    public function show($id)
    {
        return $this->sendReposne();
    }
}
