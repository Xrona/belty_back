@extends('adminlte::page')

@section('title', 'Create New Color')

@section('content_header')
    <h1>Create New Color</h1>
@stop

@section('content')
    <div class="card-body">
        <a href="{{ url('/colors') }}" title="Back">
            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
        </a>
        <br/>
        <br/>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ url('/colors') }}" accept-charset="UTF-8" class="form-horizontal"
              enctype="multipart/form-data">
            {{ csrf_field() }}

            @include ('admin.colors.form', ['formMode' => 'create'])

        </form>

    </div>
@endsection
