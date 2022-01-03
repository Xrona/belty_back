@extends('layouts.layout')

@section('title', 'Edit product')

@section('content_header')
    <h1>product {{ $product->id }}</h1>
@stop
@section('content')
    <div class="card-body">

        <a href="{{ url('/products') }}" title="Back">
            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
        </a>
        <a href="{{ url('/products/' . $product->id . '/edit') }}" title="Edit product">
            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
            </button>
        </a>

        <form method="POST" action="{{ url('products' . '/' . $product->id) }}" accept-charset="UTF-8"
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
                    <td>{{ $product->id }}</td>
                </tr>
                <tr>
                    <th> Name</th>
                    <td> {{ $product->name }} </td>
                </tr>
                <tr>
                    <th> Price</th>
                    <td> {{ $product->price }} </td>
                </tr>
                <tr>
                    <th> Category</th>
                    <td> {{ $product->category->name }} </td>
                </tr>
                <tr>
                    <th>Width</th>
                    <td> {{ $product->width }} мм</td>
                </tr>
                <tr>
                    <th>Guarantee</th>
                    <td>до {{ $product->guarantee }} дней</td>
                </tr>
                <tr>
                    <th> Material</th>
                    <td> {{ $product->material->name}} </td>
                </tr>
                <tr>
                    <th> Country</th>
                    <td> {{ $product->country->name }} </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><input type="checkbox" disabled {{$product->status ? 'checked' : ''}}></td>
                </tr>
                <tr>
                    <th>Bestseller</th>
                    <td><input type="checkbox" disabled {{$product->bestseller ? 'checked' : ''}}></td>
                </tr>
                @if($product->discount)
                    <tr>
                        <th>Discount</th>
                        <td>{{$product->discount->value}}{{ $product->discount->is_percent ? ' %' : ' р.' }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        @if(count($product->productImages) > 0)
            <div class="product-slider">
                <label>Images</label>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($product->productImages as $key => $image)
                            <div class="carousel-item {{$key === 0 ? 'active' : ''}}">
                                <img src="{{$image->url}}" class="d-block w-100" style="background-size: cover" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>
        @endif
    </div>
@endsection
