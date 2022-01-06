<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Models\Order;
use App\Http\Requests\OrderRequest;
use App\Models\CartProduct;
use App\Models\OrderProduct;

class OrderController extends ResponseController
{
    public function order(OrderRequest $request)
    {
        $order = Order::create($request->all());

        if ($request->has('session')) {
            $cartProducts  = CartProduct::where(['session_id' => $request->input('session')])
                ->get();
        } else {
            $cartProducts = CartProduct::where(['user_id' => auth('sanctum')->user()->id])
                ->get();
        }

        if (!count($cartProducts)) {
            return $this->sendResponse(false, 'not products in cart');
        }

        foreach ($cartProducts as $cartProduct) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $cartProduct->product_id,
                'product_name' => $cartProduct->product->name,
                'buy_price' => $cartProduct->price(),
                'count' => $cartProduct->count,
                'color' => $cartProduct->color->name,
                'size' => $cartProduct->size->name,
                'is_gift' => $cartProduct->is_gift,
                'engraving' => $cartProduct->engraving,
            ]);
        }

        return $this->sendResponse(true, 'added');
    }
}
