@extends('layouts.layout')

@section('title', "Edit discount $discount->id")

@section('content_header')
    <h1>Edit Product #{{ $discount->id }}</h1>
@stop

@section('content')

    <div class="card-body">
        <a href="{{ url('/discounts') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ url('/discounts/' . $discount->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            @include ('admin.discounts.form', ['formMode' => 'edit'])

        </form>

    </div>


    @stop
