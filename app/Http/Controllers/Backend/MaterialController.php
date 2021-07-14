<?php 

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialsRequest;
use App\Models\Material;

class MaterialController extends Controller
{
  public function index()
  {
    $materials = Material::all();

    return view('admin/materials/index', compact('materials'));
  }

  public function edit($id)
  {
    $material= Material::findOrFail($id);

    return view('admin/materials/edit', compact('material'));
  }

  public function update(MaterialsRequest $request, $id)
  {
    $requestData = $request->all();

    $material= Material::findOrFail($id);
    $material->update($requestData);

    return redirect('materials')->with('flash_message', 'material updated!');
  }

  public function show($id) 
  {
    $material = Material::findOrFail($id);

    return view('admin/materials/show', compact('material'));
  }

  public function create()
  {
    return view('admin/materials/create');
  }

  public function store(MaterialsRequest $request) 
  {
    $requestData = $request->all();

    Material::create($requestData);

    return redirect('materials')->with('flash_message', 'material added!');
  }

  public function destroy($id)
  {
    
    Material::destroy($id);

    return redirect('materials')->with('flash_message', 'material deleted!');
  }
}