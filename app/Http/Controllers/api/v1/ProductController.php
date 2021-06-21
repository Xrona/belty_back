<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Models\Product;
use Illuminate\Http\JsonResponse;


class ProductController extends ResponseController
{
    public function index(): JsonResponse
    {
        $products = Product::all();

        return $this->sendResponse($products, 'products');
    }


    public function show($id) 
    {
        return $this->sendReposne();
    }
}
