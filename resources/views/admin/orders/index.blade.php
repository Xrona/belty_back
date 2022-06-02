@extends('layouts.layout')

@section('title', 'Orders')

@section('content_header')
    <h1>Orders</h1>
@stop

@section('content')
    <div class="table-responsive mt-3">
        <table class="table" id="orderAccordion">
            <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Status</th>
                <th>Full price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$order->id}}</td>
                    <td>
                        <div class="order-status status-{{$order->status}}"
                             id="order{{$order->id}}"
                        >
                            {{$order->getStatus()}}
                        </div>
                    </td>
                    <td>{{$order->getFullPrice()}} <span>р.</span></td>
                    <td>
                        <button
                            type="button"
                            data-toggle="collapse"
                            data-target="#userInfoCollapse{{$order->id}}"
                            aria-expanded="true"
                            aria-controls="userInfoCollapse{{$order->id}}"
                            class="btn btn-link"
                        >
                            User info
                        </button>
                        <button
                            type="button"
                            data-toggle="collapse"
                            data-target="#productsCollapse{{$order->id}}"
                            aria-expanded="true"
                            aria-controls="productsCollapse{{$order->id}}"
                            class="btn btn-link"
                        >
                            Products
                        </button>
                        <button
                            class="btn btn-warning btn-sm change-status-button"
                            data-status-id="{{$order->status}}"
                            data-order-id="{{$order->id}}"
                            data-toggle="modal"
                            data-target="#orderStatusModal"
                        >
                            Change status
                        </button>
                        <a href="{{ url('/orders/' . $order->id . '/edit') }}" title="Edit User"
                           class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o"
                               aria-hidden="true"></i> Edit
                        </a>
                        <form method="POST" action="{{ url('/orders' . '/' . $order->id) }}"
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
                <tr>
                    <td colspan="5" class="p-0">
                        <div
                            class="collapse multi-collapse bg-info rounded"
                            id="userInfoCollapse{{$order->id}}"
                            aria-labelledby="headingOne"
                        >
                            <table class="table ">
                                <tbody>
                                <tr>
                                    <td><b>Surname</b></td>
                                    <td><b>Name</b></td>
                                    <td><b>Email</b></td>
                                    <td><b>Phone</b></td>
                                    <td><b>Post index</b></td>
                                    <td><b>City</b></td>
                                    <td><b>Street</b></td>
                                    <td><b>House</b></td>
                                    <td><b>Flat</b></td>
                                </tr>
                                <tr>
                                    <td>{{$order->surname}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->post_index}}</td>
                                    <td>{{$order->city}}</td>
                                    <td>{{$order->street}}</td>
                                    <td>{{$order->house}}</td>
                                    <td>{{$order->flat}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="p-0">
                        <div
                            id="productsCollapse{{$order->id}}"
                            class="collapse multi-collapse bg-info rounded"
                            aria-labelledby="headingOne"
                        >
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td><b>Product id</b></td>
                                    <td><b>Product name</b></td>
                                    <td><b>Price</b></td>
                                    <td><b>Count</b></td>
                                    <td><b>Color</b></td>
                                    <td><b>Size</b></td>
                                    <td><b>Is gift</b></td>
                                    <td><b>Engraving</b></td>
                                </tr>
                                @foreach($order->orderProducts as $product)
                                    <tr>
                                        <td>
                                            <a
                                                class="text-white"
                                                href="/products/{{$product->product_id}}"
                                            >
                                                {{$product->product_id}}
                                            </a>
                                        </td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->buy_price}}</td>
                                        <td>{{$product->count}}</td>
                                        <td>
                                            <div
                                                style="height: 25px; width: 25px; background-color: {{$product->color}}"
                                            ></div>
                                        </td>
                                        <td>{{$product->size}}</td>
                                        <td>
                                            <input
                                                type="checkbox"
                                                disabled
                                                {{$product->is_gift ? 'checked' : ''}}
                                            >
                                        </td>
                                        <td>{{$product->engraving}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="orderStatusModal" tabindex="-1" aria-labelledby="orderStatusModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderStatusModalLabel">Change status</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <select class="select2">
                            @foreach(\App\Enums\OrderStatusEnum::getList() as $key => $status)
                                <option value="{{$key}}">{{$status}}</option>
                            @endforeach
                        </select>
                        <div class="spinner d-none">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
