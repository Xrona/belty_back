@extends('layouts.layout')

@section('title', 'Create New Discount')

@section('content_header')
    <h1>Create New Product</h1>
@stop

@section('content')
    <div class="card-body">
        <a href="{{ url('/discounts') }}" title="Back"><button class="btn btn-warning btn-sm mb-5"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ url('/discounts') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            @include ('admin.discounts.form', ['formMode' => 'create'])

        </form>

    </div>
@stop
