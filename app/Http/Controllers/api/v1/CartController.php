<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\AddCartRequest;
use App\Http\Requests\CartRequest;
use App\Http\Resources\CartProductListResource;
use App\Models\CartProduct;
use Illuminate\Support\Facades\Auth;

class CartController extends ResponseController
{
  public function index(CartRequest $request)
  {
    if ($request->has('session_id')) {
      $builder = CartProduct::where(['session_id' => $request->input('session_id')]);
    } else {
      $builder = CartProduct::where(['user_id' => $request->input('user_id')]);
    }

    return $this->sendResponse(new CartProductListResource($builder), 'cart products');
  }

  public function addCart(AddCartRequest $request)
  {
    $cartProduct = new CartProduct($request->all());

    return $this->sendResponse($cartProduct->saveOrFail(), 'added');
  }

  public function store()
  {
  }

  public function update()
  {
  }

  public function edit()
  {
  }

  public function show($id)
  {
  }

  public function destroy($id)
  {
  }
}
