<?php 

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Models\Product;

class ProductController extends Controller
{
  public function index()
  {
    $products = Product::all();

    return view('admin/products/index', compact('products'));
  }

  public function edit($id)
  {
    $product = Product::findOrFail($id);

    return view('admin/products/edit', compact('product'));
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
    return view('admin/products/create');
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