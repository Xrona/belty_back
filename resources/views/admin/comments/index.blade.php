@extends('layouts.layout')

@section('title', 'Комментарии')

@section('content_header')
    <h1>Комментарии</h1>
@stop

@section('content')
    <div class="card-body">


        <div class="table-responsive">
            <form class="form-inline" type="get" action="{{url('/comments')}}">
                <div class="input-group">
                    <input type="search" name="search" class="form-control form control-lg" placeholder="Search"></div>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-success ml-2">
                        <i class="fa fa-search"></i>
                    </button>
                    <a href="/comments" class="btn btn-warning ml-3"> Очистить поиск </a>
                </div>
            </form>
            <div class="table-responsive mt-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Comment</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $comment->product->name}}</td>
                            <td class='comment-row'><p>{{ $comment->comment }}</p></td>
                            <td>
                                <a href="{{ url('/comments/' . $comment->id) }}" title="View Material">
                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                        View
                                    </button>
                                </a>


                                <form method="POST" action="{{ url('/comments' . '/' . $comment->id) }}"
                                      accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Material"
                                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                            class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
