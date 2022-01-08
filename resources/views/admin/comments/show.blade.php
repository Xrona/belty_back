@extends('layouts.layout')

@section('title', 'Show comment')

@section('content_header')
    <h1>comment {{$comment->id }}</h1>
@stop
@section('content')
    <div class="card-body">

        <a href="{{ url('/comments') }}" title="Back">
            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
        </a>

        <form method="POST" action="{{ url('comments' . '/' . $comment->id) }}" accept-charset="UTF-8"
              style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete color"
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
                    <td>{{ $comment->id }}</td>
                </tr>
                <tr>
                    <th> text</th>
                    <td> {{ $comment->comment }} </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
