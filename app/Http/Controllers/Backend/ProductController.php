<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductDiscountRequest;
use App\Http\Requests\ProductDiscountRequest;
use App\Http\Requests\ProductsRequest;
use App\Http\Requests\ProductsSearchRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Country;
use App\Models\Discount;
use App\Models\Material;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class ProductController extends Controller
{
    public function index(ProductsSearchRequest $request): Factory|View|Application
    {
        if ($request === null) {
            $products = Product::all();
        } else {
            $products = Product::search($request);
        }

        $discounts = Discount::all()->toArray();

        return view('admin/products/index', compact(['products', 'discounts',]));
    }

    public function enableDiscount($id): bool
    {
        $product = Product::findOrFail($id);

        if ($product) {
            if ($product->enable_discount) {
                $product->update(['enable_discount' => 0]);
            } else {
                $product->update(['enable_discount' => 1]);
            }

            return true;
        }

        return false;
    }

    public function changeStatus($id)
    {
        $product = Product::findOrFail($id);

        if ($product) {
            if ($product->status) {
                $product->update(['status' => 0]);
            } else {
                $product->update(['status' => 1]);
            }

            return true;
        }

        return false;
    }

    public function addNewDiscount(CreateProductDiscountRequest $request)
    {
        $requestData = $request->all();

        $discount = Discount::create($requestData);

        $product = Product::findOrFail($requestData['product_id']);

        $product->update([
            'discount_id' => $discount->id,
            'enable_discount' => 1,
        ]);

        return [
            'discount_price' => $product->getDiscountPrice(),
            'discount' => $product->discount->value,
            'discount_id' => $product->discount->id,
            'unit' => $product->discount->is_percent ? '%' : 'бел. руб.',
            'product_id' => $product->id,
        ];
    }

    public function addDiscount(ProductDiscountRequest $request)
    {
        $requestData = $request->all();

        $product = Product::findOrFail($requestData['product_id']);

        $product->update([
            'discount_id' => $requestData['discount_id'],
            'enable_discount' => 1
        ]);

        return [
            'discount_price' => $product->getDiscountPrice(),
            'discount' => $product->discount->value,
            'product_id' => $product->id,
        ];
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $countries = Country::all()->toArray();
        $categories = Category::all()->toArray();
        $materials = Material::all()->toArray();
        $sizes = Size::all()->toArray();
        $colors = Color::all()->toArray();

        return view('admin/products/edit', compact([
            'product',
            'countries',
            'materials',
            'categories',
            'sizes',
            'colors',
        ]));
    }

    public function update(ProductsRequest $request, $id): Redirector|Application|RedirectResponse
    {
        $requestData = $request->all();
        $product = Product::findOrFail($id);

        $product->update($requestData);

        if ($request->input('sizes')) {
            $product->sizes()->detach();

            $product->sizes()->attach($requestData['sizes']);
        }

        if ($request->input('colors')) {
            $product->colors()->detach();

            $product->colors()->attach($requestData['colors']);
        }

        if ($request->input('images')) {
            $product->productImages()->delete();

            $i = 0;

            foreach ($requestData['images'] as $image) {
                $name = explode('/', $image);

                $product->productImages()->create([
                    'url' => $image,
                    'path' => $name[count($name) - 1],
                    'queue' => $i,
                ]);

                $i++;
            }
        }


        return redirect('products')->with('flash_message', 'Product updated!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin/products/show', compact('product'));
    }

    public function create()
    {
        $countries = Country::all()->toArray();
        $categories = Category::all()->toArray();
        $materials = Material::all()->toArray();
        $sizes = Size::all()->toArray();
        $colors = Color::all()->toArray();

        return view('admin/products/create', compact(['countries', 'materials', 'categories', 'sizes', 'colors']));
    }

    public function store(ProductsRequest $request)
    {
        $requestData = $request->all();

        $product = Product::create($requestData);

        if ($product && $request->input('sizes')) {
            $product->sizes()->attach($requestData['sizes']);
        }

        if ($product && $request->input('colors')) {
            $product->colors()->attach($requestData['colors']);
        }

        if ($product && $request->input('images')) {
            $i = 0;
            foreach ($requestData['images'] as $image) {
                $name = explode('/', $image);

                $product->productImages()->create([
                    'url' => $image,
                    'path' => $name[count($name) - 1],
                    'queue' => $i,
                ]);

                $i++;
            }
        }


        return redirect('products')->with('flash_message', 'Product added!');
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('products')->with('flash_message', 'Product deleted!');
    }
}
