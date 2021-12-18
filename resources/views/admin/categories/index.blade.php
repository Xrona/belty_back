@extends('layouts.layout')

@section('title', 'Категории')

@section('content_header')
  <h1>Категории</h1>
  <a href="{{ url('/categories/create') }}" title="create category"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> create category</button></a>
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
              @foreach($categories as $category)
                <tr>
                  <td>{{ $category['id']}}</td>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $category['name'] }}</td>
                  <td>
                    <a href="{{ url('/categories/' . $category->id) }}" title="View Category"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    <a href="{{ url('/categories/' . $category->id . '/edit') }}" title="Edit Category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/categories' . '/' . $category->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
@stop

