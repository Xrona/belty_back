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
                    <th>Discount price</th>
                    <th>Discount</th>
                    <th>Enable/Disable <br> discount</th>
                    <th>Category</th>
                    <th>Material</th>
                    <th>Sizes</th>
                    <th>Country</th>
                    <th>Colors</th>
                    <th>Status</th>
                    <th>Bestseller</th>
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
                        <td class="td-discount-price">{{$product->getDiscountPrice()}}</td>
                        @if(is_null($product->discount))
                            <td class="td-discount">Not</td>
                        @else
                            <td class="td-discount">{{$product->discount->value}}</td>
                        @endif
                        <td>
                            <input class="enable-discount" data-enable-product-id="{{$product->id}}"
                                   {{$product->discount_id ? '' : 'disabled'}}
                                   type="checkbox" {{$product->enable_discount ? 'checked' : ''}}
                            >
                        </td>
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
                        <td>
                            <input
                                type="checkbox"
                                class="product-status"
                                data-product-id="{{$product->id}}"
                                {{ $product->status ? 'checked' : ''}}
                                value="1"
                            >
                        </td>
                        <td>
                            <input
                                type="checkbox"
                                class="product-bestseller"
                                data-product-id="{{$product->id}}"
                                {{ $product->bestseller ? 'checked' : ''}}
                                value="1"
                            >
                        </td>
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
                               {{ $product->discount_id ? 'Change discount' : 'Add discount' }}
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
    <div class="position-fixed p-3" style="bottom: 50px; right: 15px;">
        <div role="alert" aria-live="assertive" aria-atomic="true" class="toast toast-status" data-autohide="true" data-delay="2000">
            <div class="toast-body btn btn-success">
                Status changed
            </div>
        </div>
    </div>
    <div class="position-fixed p-3" style="bottom: 50px; right: 15px;">
        <div role="alert" aria-live="assertive" aria-atomic="true" class="toast toast-bestseller" data-autohide="true" data-delay="2000">
            <div class="toast-body btn btn-success">
                Bestseller changed
            </div>
        </div>
    </div>
    <div class="position-fixed p-3" style="bottom: 50px; right: 15px;">
        <div role="alert" aria-live="assertive" aria-atomic="true" class="toast toast-discount" data-autohide="true" data-delay="2000">
            <div class="toast-body btn btn-success">
                Discount changed
            </div>
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
                            <form id="formAddDiscount">
                                {{ csrf_field() }}
                                <div class="select-discount">
                                    <input class="d-none product-id" type="text" name="product_id">
                                    <div id="productName"></div>
                                    <select class="select2 form-control" name="discount_id">
                                        @foreach($discounts as $discount)
                                            <option value="{{$discount['id']}}">{{$discount['value']}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-success">Confirm</button>
                                </div>
                            </form>
                        </div>
                        <div class="collapse multi-collapse" id="createDiscount" data-parent="#discountAccordion">
                            <form id="formCreateDiscount">
                                {{ csrf_field() }}
                                <div class="create-discount">
                                    <input class="d-none product-id" type="text" name="product_id">
                                    <input type="checkbox" name="is_percent" value="1">
                                    <label for="">Скидка в процентах?</label>
                                    <input type="text" class="form-control" name="value">
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

