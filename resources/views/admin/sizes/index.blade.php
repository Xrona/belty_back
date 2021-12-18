@extends('layouts.layout')

@section('title', 'Размеры')

@section('content_header')
  <h1>Размеры</h1>
  <a href="{{ url('/sizes/create') }}" title="create color"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> create size</button></a>
@stop


@section('content')
    <div class="card-body">


        <div class="table-responsive">
          <table class="table">
            <thead>
            <tr>
              <th>Id</th>
              <th>#</th>
              <th>name</th>
            </tr>
            </thead>
            <tbody>
              @foreach($sizes as $size)
                <tr>
                  <td>{{ $size['id']}}</td>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $size['name'] }}</td>
                  <td>
                    <a href="{{ url('/sizes/' . $size->id) }}" title="View Size"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    <a href="{{ url('/sizes/' . $size->id . '/edit') }}" title="Edit Size"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/sizes' . '/' . $size->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Size" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
@stop
