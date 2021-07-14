@extends('adminlte::page')

@section('title', 'Страны')

@section('content_header')
  <h1>Countries</h1>
  <a href="{{ url('/countries/create') }}" title="create country"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> create country</button></a>
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
              @foreach($countries as $country)
                <tr>
                  <td>{{ $country['id']}}</td>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $country['name'] }}</td>
                  <td>
                    <a href="{{ url('/countries/' . $country->id) }}" title="View Country"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    <a href="{{ url('/countries/' . $country->id . '/edit') }}" title="Edit Country"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/countries' . '/' . $country->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Country" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
@stop