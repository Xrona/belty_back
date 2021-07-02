@extends('adminlte::page')

@section('title', 'Edit product')

@section('content_header')
    <h1>product {{ $product->id }}</h1>
@stop
@section('content')
    <div class="card-body">

        <a href="{{ url('/products') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
        <a href="{{ url('/products/' . $product->id . '/edit') }}" title="Edit product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

        <form method="POST" action="{{ url('products' . '/' . $product->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
        </form>
        <br/>
        <br/>

        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <th>ID</th><td>{{ $product->id }}</td>
                </tr>
                <tr>
                  <th> name </th>
                  <td> {{ $product->name }} </td>
                </tr>
                <tr>
                  <th> price </th>
                  <td> {{ $product->price }} </td>
                </tr>
                <tr>
                  <th> category_id </th>
                  <td> {{ $product->category_id }} </td>
                </tr>
                <tr>
                  <th> material_id </th>
                  <td> {{ $product->material_id }} </td>
                </tr>
                <tr>
                  <th> country_id </th>
                  <td> {{ $product->country_id }} </td>
                </tr>
                <tr>
                  <th> status </th>
                  <td> {{ $product->status }} </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
