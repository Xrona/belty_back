<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Models\CartProduct;
use App\Http\Requests\CartRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddCartRequest;
use App\Http\Requests\ChangeCartProductRequest;
use App\Http\Resources\CartProductListResource;

class CartController extends ResponseController
{
    public function getCartProducts(CartRequest $request)
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

    public function addCart(AddCartRequest $request)
    {
        if (!$request->has('session_id')) {
            return $this->sendError([], 'not session id');
        }

        $cartProduct = new CartProduct($request->all());

        return $this->sendResponse($cartProduct->saveOrFail(), 'added');
    }

    public function removeCart($id)
    {
        if (CartProduct::destroy($id)) {
            return $this->sendResponse(true, 'deleted');
        }
    }

    public function changeCount($id, ChangeCartProductRequest $request)
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
}
