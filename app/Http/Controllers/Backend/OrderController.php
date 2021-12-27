<?php


namespace App\Http\Controllers\Backend;


use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\Size;

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

    public function update()
    {

    }

    public function destroy()
    {

    }
}
