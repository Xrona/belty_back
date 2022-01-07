<?php


namespace App\Http\Controllers\Backend;


use App\Models\Size;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackendOrderRequest;
use App\Http\Requests\OrderRequest;

class OrderController extends  Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('admin/orders/index', compact(['orders',]));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $statusList = OrderStatusEnum::getList();
        $products = Product::all()->toArray();
        $colors = Color::all()->toArray();
        $sizes = Size::all()->toArray();


        return view('admin/orders/edit', compact([
            'order',
            'statusList',
            'products',
            'colors',
            'sizes',
        ]));
    }

    public function update(BackendOrderRequest $request, $id)
    {
        $requestData = $request->only(
            'surname',
            'name',
            'email',
            'phone',
            'post_index',
            'city',
            'street',
            'house',
            'flat',
        );

        $products = $request->get('products');

        $order = Order::findOrFail($id);

        if ($order->update($requestData)) {
            $order->orderProducts()->delete();

            foreach ($products as $product) {
                $order->orderProducts()->create($product);
            }

            return redirect('orders')->with('flash_message', 'Product updated!');
        }
    }

    public function destroy($id)
    {
        Order::destroy($id);

        return redirect('orders')->with('flash_message', 'Order deleted!');
    }
}
