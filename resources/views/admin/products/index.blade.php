@extends('layouts.layout')

@section('title', 'Товары')

@section('content_header')
    <h1>Товары</h1>
    <a href="{{ url('/products/create') }}" title="create product">
        <button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> create product</button>
    </a>
@stop

@section('content')
    <div class="card-body">
        <form class="form-inline" type="get" action="{{url('/products')}}">
            <div class="input-group">
                <input type="search" name="search" class="form-control form control-lg" placeholder="Search"></div>
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-success ml-2">
                    <i class="fa fa-search"></i>
                </button>
                <a href="/products" class="btn btn-warning ml-3"> Очистить поиск </a>
            </div>
        </form>
        <div class="table-responsive mt-3">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Material</th>
                    <th>Sizes</th>
                    <th>Country</th>
                    <th>Colors</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    @php
                        $arraySizes = $product->sizes->map(function($size) {return $size->name;})->toArray();
                    @endphp
                    <tr valign="middle">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{$product->price}}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{$product->material->name}}</td>
                        <td>{{implode(', ', $arraySizes)}}</td>
                        <td>{{$product->country->name}}</td>
                        <td>
                            <div style="display: flex; flex-wrap: wrap; max-width: 90px">
                                @foreach($product->colors as $color)
                                    <div style="
                                        width: 25px;
                                        height: 25px;
                                        background-color: {{$color->name}};
                                        border: 3px solid white;
                                        "></div>
                                @endforeach
                            </div>
                        </td>
                        <td>{{$product->status}}</td>
                        <td>
                            <a href="{{ url('/products/' . $product->id) }}" title="View User">
                                <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View
                                </button>
                            </a>
                            <button
                                type="button"
                                class="btn btn-warning btn-sm discount-button"
                                data-toggle="modal"
                                data-target="#discountModal"
                                data-product-id="{{$product->id}}"
                                data-product-name="{{$product->name}}"
                            >
                                add discount
                            </button>
                            <a href="{{ url('/products/' . $product->id . '/edit') }}" title="Edit User">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                          aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <form method="POST" action="{{ url('/products' . '/' . $product->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete User"
                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                                                                 aria-hidden="true"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="discountModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="discountModalLabel">Add discount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="accordion" id="discountAccordion">
                        <p>
                            <a href="#selectDiscount" data-toggle="collapse" data-target="#selectDiscount"
                               class="btn btn-secondary" role="button" aria-expanded="false"
                               aria-controls="selectDiscount">Select discount</a>
                            <a href="#createDiscount" data-toggle="collapse" data-target="#createDiscount"
                               class="btn btn-secondary" role="button" aria-expanded="false"
                               aria-controls="createDiscount">Create discount</a>
                        </p>
                        <div class="collapse multi-collapse" id="selectDiscount"
                             data-parent="#discountAccordion"
                        >
                            <form action="">
                                <div class="select-discount">
                                    <div id="productName"></div>
                                    <select class="select2 form-control">
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                    </select>
                                    <button type="submit" class="btn btn-success">Confirm</button>
                                </div>
                            </form>
                        </div>
                        <div class="collapse multi-collapse" id="createDiscount" data-parent="#discountAccordion">
                            <form action="">
                                <div class="create-discount">
                                    <input type="checkbox">
                                    <label for="">Скидка в процентах?</label>
                                    <input type="text" class="form-control">
                                    <button type="submit" class="btn btn-success">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

