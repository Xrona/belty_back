<?php 

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SizesRequest;
use App\Models\Size;

class SizeController extends Controller
{
  public function index()
  {
    $sizes = Size::all();

    return view('admin/sizes/index', compact('sizes'));
  }

  public function edit($id)
  {
    $size = Size::findOrFail($id);

    return view('admin/sizes/edit', compact('size'));
  }

  public function update(SizesRequest $request, $id)
  {
    $requestData = $request->all();

    $size= Size::findOrFail($id);
    $size->update($requestData);

    return redirect('sizes')->with('flash_message', 'Size updated!');
  }

  public function show($id) 
  {
    $size = Size::findOrFail($id);

    return view('admin/sizes/show', compact('size'));
  }

  public function create()
  {
    return view('admin/sizes/create');
  }

  public function store(SizesRequest $request) 
  {
    $requestData = $request->all();

    Size::create($requestData);

    return redirect('sizes')->with('flash_message', 'Size added!');
  }

  public function destroy($id)
  {
    
    Size::destroy($id);

    return redirect('sizes')->with('flash_message', 'Size deleted!');
  }
}