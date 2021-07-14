<?php 

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorsRequest;
use App\Models\Color;

class ColorController extends Controller
{
  public function index()
  {
    $colors = Color::all();

    return view('admin/colors/index', compact('colors'));
  }

  public function edit($id)
  {
    $color = Color::findOrFail($id);

    return view('admin/colors/edit', compact('color'));
  }

  public function update(ColorsRequest $request, $id)
  {
    $requestData = $request->all();

    $color= Color::findOrFail($id);
    $color->update($requestData);

    return redirect('colors')->with('flash_message', 'Color updated!');
  }

  public function show($id) 
  {
    $color = Color::findOrFail($id);

    return view('admin/colors/show', compact('color'));
  }

  public function create()
  {
    return view('admin/colors/create');
  }

  public function store(ColorsRequest $request) 
  {
    $requestData = $request->all();

    Color::create($requestData);

    return redirect('colors')->with('flash_message', 'Color added!');
  }

  public function destroy($id)
  {
    
    Color::destroy($id);

    return redirect('colors')->with('flash_message', 'Color deleted!');
  }
}