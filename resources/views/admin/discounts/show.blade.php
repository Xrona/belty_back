@extends('layouts.layout')

@section('title', 'Edit discount')

@section('content_header')
    <h1>Discount {{ $discount->id }}</h1>
@stop
@section('content')
    <div class="card-body">

        <a href="{{ url('/discounts') }}" title="Back">
            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
        </a>
        <a href="{{ url('/discounts/' . $discount->id . '/edit') }}" title="Edit product">
            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
            </button>
        </a>

        <form method="POST" action="{{ url('discounts' . '/' . $discount->id) }}" accept-charset="UTF-8"
              style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete product"
                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                                             aria-hidden="true"></i> Delete
            </button>
        </form>
        <br/>
        <br/>

        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $discount->id }}</td>
                </tr>
                <tr>
                    <th> Discount value</th>
                    <td> {{ $discount->value }} </td>
                </tr>
                <tr>
                    <th> Is percent</th>
                    <td>
                        <input disabled type="checkbox" {{ $discount->is_percent ? 'checked' : ''}} >
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        @if(count($discount->products) === 0)
            <div class="d-flex justify-content-center">
                <div>There are no products with this discount</div>
            </div>
        @else
            <div class="table-responsive mt-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Discount price</th>
                        <th>Category</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($discount->products as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->getDiscountPrice()}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->status}}</td>
                            <td>
                                <form
                                    action="{{url('/discount/remove-product/' . $discount->id . '/' . $product->id)}}"
                                    method="POST"
                                >
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger"
                                            onclick="return confirm(&quot;Confirm delete?&quot;)"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
