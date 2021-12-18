@extends('layouts.layout')

@section('title', 'Edit country')

@section('content_header')
    <h1>country {{ $country->id }}</h1>
@stop
@section('content')
    <div class="card-body">

        <a href="{{ url('/countries') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
        <a href="{{ url('/countries/' . $country->id . '/edit') }}" title="Edit country"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

        <form method="POST" action="{{ url('countries' . '/' . $country->id) }}" accept-charset="UTF-8" style="display:inline">
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
                    <th>ID</th><td>{{ $country->id }}</td>
                </tr>
                <tr>
                  <th> name </th>
                  <td> {{ $country->name }} </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
