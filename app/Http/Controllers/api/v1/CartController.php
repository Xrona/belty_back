<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Models\CartProduct;
use App\Http\Requests\CartRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddCartRequest;
use App\Http\Requests\ChangeCartProductRequest;
use App\Http\Resources\CartProductListResource;

class CartController extends ResponseController
{
    public function getCartProducts(CartRequest $request): JsonResponse
    {
        if (auth('sanctum')->user()) {
            $builder = CartProduct::where(['user_id' => auth('sanctum')->user()->id]);
        } else {
            if (!$request->has('session_id')) {
                return $this->sendResponse(['rows' => ''], 'not products');
            }

            $builder = CartProduct::where(['session_id' => $request->input('session_id')]);
        }

        return $this->sendResponse(new CartProductListResource($builder), 'cart products');
    }

    public function addCart(AddCartRequest $request): JsonResponse
    {
        if (!$request->has('session_id')) {
            return $this->sendError([], 'not session id');
        }

        $cartProduct = new CartProduct($request->all());

        return $this->sendResponse($cartProduct->saveOrFail(), 'added');
    }

    public function removeCart($id): JsonResponse
    {
        if (CartProduct::destroy($id)) {
            return $this->sendResponse(true, 'deleted');
        }

        return $this->sendError([],'product is not found' );
    }

    public function changeCount($id, ChangeCartProductRequest $request): JsonResponse
    {
        $requestData = $request->all();
        $cartProduct = CartProduct::findOrFail($id);

        if ($requestData['count'] === 0) {
            $cartProduct->delete();
        } else {
            $cartProduct->update($requestData);
        }

        return $this->sendResponse(true, 'cahnged');
    }

    public function updateProduct($id, ChangeCartProductRequest $request): JsonResponse
    {
        $requestData = $request->all();
        $cartProduct = CartProduct::findOrFail($id);

        if ($cartProduct->update($requestData)) {
            return $this->sendResponse(true, 'product updated');
        }

        return $this->sendError([], 'product not found');
    }
}
