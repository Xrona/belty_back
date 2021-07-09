<?php 

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\Category;

class CategoryController extends Controller
{
  public function index()
  {
    $categories = Category::all();

    return view('admin/categories/index', compact('categories'));
  }

  public function edit($id)
  {
    $category = Category::findOrFail($id);

    return view('admin/categories/edit', compact('category'));
  }

  public function update(CategoriesRequest $request, $id)
  {
    $requestData = $request->all();

    $category = Category::findOrFail($id);
    $category->update($requestData);

    return redirect('categories')->with('flash_message', 'Category updated!');
  }

  public function show($id) 
  {
    $category = Category::findOrFail($id);

    return view('admin/categories/show', compact('category'));
  }

  public function create()
  {
    return view('admin/categories/create');
  }

  public function store(CategoriesRequest $request) 
  {
    $requestData = $request->all();

    Category::create($requestData);

    return redirect('categories')->with('flash_message', 'Category added!');
  }

  public function destroy($id)
  {
    
    Category::destroy($id);

    return redirect('categories')->with('flash_message', 'Category deleted!');
  }
}