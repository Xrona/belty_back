<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Models\Cart;
use App\Http\Requests\CartRequest;

class CartController extends ResponseController
{
  public function index()
  {
    $cart = Cart::where(['session_id' => '0909'])
      ->first();

    return $this->sendResponse($cart->cartProducts, 'cart products');
  }

  public function addCart(CartRequest $request)
  {
    $requestData = $request->validated();

    $cart = Cart::where(['session_id' => $requestData['session_id']])
      ->first();

    if (!$cart) {
      $cart =  new Cart([
        'session_id' => $requestData['session_id'],
        'user_id' => $requestData['user_id'] ?? null,
      ]);

      $cart->saveOrFail();
    }


    return $this->sendResponse($cart->cartProducts()->create($requestData), 'added');
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

