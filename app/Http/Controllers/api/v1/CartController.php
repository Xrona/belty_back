<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\AddCartRequest;
use App\Http\Requests\CartRequest;
use App\Http\Requests\ChangeCartProductRequest;
use App\Http\Resources\CartProductListResource;
use App\Models\CartProduct;
use Illuminate\Http\JsonResponse;

class CartController extends ResponseController
{
    public function getCartProducts(CartRequest $request): JsonResponse
    {
        $builder = CartProduct::where(['session_id' => $request->input('session_id')]);

        if (auth('sanctum')->user()) {
            $builder->orWhere(['user_id' => auth('sanctum')->user()->id]);
        }

        return $this->sendResponse(new CartProductListResource($builder), 'cart products');
    }

    public function addCart(AddCartRequest $request): JsonResponse
    {
        if (!$request->has('session_id')) {
            return $this->sendError([], 'not session id');
        }

        $requestData = $request->all();

        if ($user = auth('sanctum')->user()) {
            $requestData['user_id'] = $user->id;
        }

        $cartProduct = new CartProduct($requestData);

        return $this->sendResponse($cartProduct->saveOrFail(), 'added');
    }

    public function removeCart($id): JsonResponse
    {
        if (CartProduct::destroy($id)) {
            return $this->sendResponse(true, 'deleted');
        }

        return $this->sendError([], 'product is not found');
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
