@extends('layouts.layout')

@section('title', "Edit product $product->id")

@section('content_header')
    <h1>Edit Product #{{ $product->id }}</h1>
@stop

@section('content')

    <div class="card-body">
        <a href="{{ url('/products') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ url('/products/' . $product->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            @include ('admin.products.form', ['formMode' => 'edit'])

        </form>

    </div>


    @stop
