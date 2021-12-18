@extends('layouts.layout')

@section('title', 'Материалы')

@section('content_header')
  <h1>Материалы</h1>
  <a href="{{ url('/materials/create') }}" title="create material"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> create material</button></a>
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
              @foreach($materials as $material)
                <tr>
                  <td>{{ $material['id']}}</td>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $material['name'] }}</td>
                  <td>
                    <a href="{{ url('/materials/' . $material->id) }}" title="View Material"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    <a href="{{ url('/materials/' . $material->id . '/edit') }}" title="Edit Material"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/materials' . '/' . $material->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Material" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
@stop
