@extends('adminlte::page')

@section('title', 'Товары')

@section('content_header')
  <h1>Товары</h1>
  <a href="{{ url('/products/create') }}" title="create product"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> create product</button></a>
@stop


@section('content')
    <div class="card-body">


        <div class="table-responsive">
          <table class="table">
            <thead>
            <tr>
              <th>#</th>
              <th>name</th>
              <th>category_id</th>
            </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $product['name'] }}</td>
                  <td>{{ $product['category_id'] }}</td>
                  <td>
                    <a href="{{ url('/products/' . $product->id) }}" title="View User"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    <a href="{{ url('/products/' . $product->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/products' . '/' . $product->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
@stop

