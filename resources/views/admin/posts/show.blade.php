@extends('layouts.layout')

@section('title', 'Edit post')

@section('content_header')
    <h1>Post {{ $post->id }}</h1>
@stop
@section('content')
    <div class="card-body">

        <a href="{{ url('/posts') }}" title="Back">
            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
        </a>
        <a href="{{ url('/posts/' . $post->id . '/edit') }}" title="Edit post">
            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
            </button>
        </a>

        <form method="POST" action="{{ url('posts' . '/' . $post->id) }}" accept-charset="UTF-8"
              style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete post"
                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                                             aria-hidden="true"></i> Delete
            </button>
        </form>
        <br/>
        <br/>

        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $post->id }}</td>
                </tr>
                <tr>
                    <th> Name</th>
                    <td> {{ $post->name }} </td>
                </tr>
                <tr>
                    <th> Head</th>
                    <td> {{ $post->head }} </td>
                </tr>
                <tr>
                    <th> Content</th>
                    <td> {{ $post->content }} </td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        <div>
                            <img style="width: 400px; aspect-ratio: 1/1; object-fit: cover" src="{{isset($post->url) ? $post->url : ''}}" alt="Image not found">
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
