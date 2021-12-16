<?php 

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountriesRequest;
use App\Models\Country;

class CountryController extends Controller
{
  public function index()
  {
    $countries = Country::all();

    return view('admin/countries/index', compact('countries'));
  }

  public function edit($id)
  {
    $country = Country::findOrFail($id);

    return view('admin/countries/edit', compact('country'));
  }

  public function update(CountriesRequest $request, $id)
  {
    $requestData = $request->all();

    $country= Country::findOrFail($id);
    $country->update($requestData);

    return redirect('countries')->with('flash_message', 'Country updated!');
  }

  public function show($id) 
  {
    $country = Country::findOrFail($id);

    return view('admin/countries/show', compact('country'));
  }

  public function create()
  {
    return view('admin/countries/create');
  }

  public function store(CountriesRequest $request) 
  {
    $requestData = $request->all();

    Country::create($requestData);

    return redirect('countries')->with('flash_message', 'Country added!');
  }

  public function destroy($id)
  {
    
    Country::destroy($id);

    return redirect('countries')->with('flash_message', 'Country deleted!');
  }
  public function coutryshow(){
    $
  }
}