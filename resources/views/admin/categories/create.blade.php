@extends('layouts.layout')

@section('title', 'Create New Category')

@section('content_header')
    <h1>Create New Category</h1>
@stop

@section('content')
    <div class="card-body">
        <a href="{{ url('/categories') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
        <br />
        <br />

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ url('/categories') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            @include ('admin.categories.form', ['formMode' => 'create'])

        </form>

    </div>
@endsection
