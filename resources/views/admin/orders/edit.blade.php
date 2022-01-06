@extends('layouts.layout')

@section('title', "Edit order $order->id")

@section('content_header')
<h1>Edit order #{{$order->id}}</h1>
@stop

@section('content')
<div class="card-body">
    <a href="{{ url('/orders') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

    @if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif

    <form method="POST" action="{{url('/orders/' . $order->id)}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        @include('admin.orders.form', ['formMode' => 'edit'])
    </form>
</div>
@stop