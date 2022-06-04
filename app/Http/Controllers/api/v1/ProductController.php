<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\ProductFilterRequest;
use App\Http\Requests\ProductsSearchRequest;
use App\Http\Resources\OneProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductsRequest;
use App\Http\Resources\ProductListResource;
use Illuminate\Http\JsonResponse;


class ProductController extends ResponseController
{
    public function index(ProductFilterRequest $request): JsonResponse
    {
        $builder = Product::search($request)
            ->select('products.*')
            ->where('status', '>', 0);

        return $this->sendResponse(new ProductListResource($builder), 'products');
    }

    public function store(ProductsRequest $request): JsonResponse
    {
        $requestData = $request->validated();

        $product =  new Product($requestData);

        return $this->sendResponse($product->saveOrFail(), 'added');
    }

    public function show($id): JsonResponse
    {
        $product = Product::where('id', $id)->first();

        if (!$product) {
            return $this->sendError(
                'Product not found',
                [],
                404,
            );
        }

        return $this->sendResponse(new OneProductResource($product), 'one product');
    }
}
