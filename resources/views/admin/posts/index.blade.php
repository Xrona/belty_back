@extends('layouts.layout')

@section('title', 'Посты')

@section('content_header')
    <h1>Посты</h1>
    <a href="{{ url('/posts/create') }}" title="create post">
        <button class="btn btn-success btn-sm">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Create post
        </button>
    </a>
@stop

@section('content')
    <div class="card-body">
        <div class="table-responsive mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>id</th>
                        <th>Name</th>
                        <th>Head</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr valign="middle">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td>{{$post->head}}</td>
                            <td>
                                <img src="{{$post->url}}" alt="Photo not found" style="width: 100px; aspect-ratio: 1/1; object-fit: cover">
                            </td>
                            <td>
                                <a href="{{url('/posts/'. $post->id)}}" title="View Post">
                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                                </a>
                                <a href="{{ url('/posts/' . $post->id . '/edit') }}" title="Edit Post">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                </a>

                                <form method="POST" action="{{ url('/posts' . '/' . $post->id) }}" accept-charset="UTF-8" style="display:inline">
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
