@extends('adminlte::page')

@section('title', 'Edit color')

@section('content_header')
    <h1>color {{ $color->id }}</h1>
@stop
@section('content')
    <div class="card-body">

        <a href="{{ url('/colors') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
        <a href="{{ url('/colors/' . $color->id . '/edit') }}" title="Edit color"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

        <form method="POST" action="{{ url('colors' . '/' . $color->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete color" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
        </form>
        <br/>
        <br/>

        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <th>ID</th><td>{{ $color->id }}</td>
                </tr>
                <tr>
                  <th> name </th>
                  <td> {{ $color->name }} </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection