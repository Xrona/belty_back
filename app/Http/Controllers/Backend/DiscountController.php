<?php

declare(strict_types=1);


namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Http\Requests\ProductsSearchRequest;
use App\Models\Discount;
use App\Models\Product;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();

        return view('admin/discounts/index', compact('discounts'));
    }

    public function productSearch(ProductsSearchRequest $request)
    {

        if ($request->input('search') && $request->input('search') !== '') {
            return [
                'products' => Product::search($request)->toArray()
            ];
        } else {
            return [
                'products' => Product::all()->toArray()
            ];
        }
    }

    public function show($id)
    {
        $discount = Discount::findOrFail($id);

        return view('admin/discounts/show', compact('discount'));
    }

    public function create()
    {
        $products = Product::all();

        return view('admin/discounts/create', compact('products'));
    }

    public function store(DiscountRequest $request)
    {
        $requestData = $request->all();

        $discount = Discount::create($requestData);

        if ($discount && $requestData['products']) {
            foreach ($requestData['products'] as $product) {
                $product = Product::findOrFail($product);

                $product->update([
                    'discount_id' => $discount->id,
                    'enable_discount' => 1,
                ]);
            }
        }


        return redirect('discounts')->with('flash_message', 'Discount added');
    }

    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        $products = Product::all();

        return view('admin/discounts/edit', compact(['discount', 'products',]));
    }

    public function update(DiscountRequest $request, $id)
    {
        $requestData = $request->all();

        $discount = Discount::findOrFail($id);

        if ($discount->update($requestData) && $requestData['products']) {
            $oldProductDiscounts = $discount->products;

            if ($oldProductDiscounts) {
                foreach ($oldProductDiscounts as $product) {
                    $product->update([
                        'discount_id' => null,
                        'enable_discount' => 0,
                    ]);
                }
            }

            foreach ($requestData['products'] as $product) {
                $product = Product::findOrFail($product);

                $product->update([
                    'discount_id' => $discount->id,
                    'enable_discount' => 1,
                ]);
            }
        }

        return redirect("discounts")->with('flash_message', 'Discount updated!');
    }

    public function removeDiscountProduct($id, $productId)
    {
        $product = Product::findOrFail($productId);

        if ($product) {
            $product->update([
                'discount_id' => null,
                'enable_discount' => 0,
            ]);
        }

        return redirect("discounts/$id")->with('flash_message', 'Product discount deleted');
    }

    public function destroy($id)
    {
        Discount::destroy($id);

        return redirect('discounts')->with('flash_message', 'Discount deleted');
    }
}
