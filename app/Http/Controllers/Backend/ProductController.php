<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Http\Requests\ProductsSearchRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Material;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(ProductsSearchRequest $request)
    {
        if ($request === null) {
            $products = Product::all();
        } else { 
            $products = Product::search($request);
        }
        return view('admin/products/index', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $countries = Country::all()->toArray();
        $categories = Category::all()->toArray();
        $materials = Material::all()->toArray();

        return view('admin/products/edit', compact(['product', 'countries', 'materials', 'categories']));
    }

    public function update(ProductsRequest $request, $id)
    {
        $requestData = $request->all();

        $product = Product::findOrFail($id);
        $product->update($requestData);

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

        return view('admin/products/create', compact(['countries', 'materials', 'categories']));
    }

    public function store(ProductsRequest $request)
    {
        $requestData = $request->all();

        Product::create($requestData);

        return redirect('products')->with('flash_message', 'Product added!');
    }

    public function destroy($id)
    {

        Product::destroy($id);

        return redirect('products')->with('flash_message', 'Product deleted!');
    }
}
