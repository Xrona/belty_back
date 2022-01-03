@extends('layouts.layout')

@section('title', 'Скидки')

@section('content_header')
    <h1>Скидки</h1>
    <a href="{{ url('/discounts/create') }}" title="create discount">
        <button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> create discount</button>
    </a>
@stop

@section('content')
    <div class="card-body">
        <div class="table-responsive mt-3">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Discount value</th>
                </tr>
                </thead>
                <tbody>
                @foreach($discounts as $discount)
                    <tr valign="middle">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{$discount->value}}
                            {{$discount->is_percent ? ' %' : ' р.'}}
                        </td>
                        <td>
                            <a href="{{ url('/discounts/' . $discount->id) }}" title="View User">
                                <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View
                                </button>
                            </a>
                            <a href="{{ url('/discounts/' . $discount->id . '/edit') }}" title="Edit User">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                          aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <form method="POST" action="{{ url('/discounts' . '/' . $discount->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete User"
                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                                                                 aria-hidden="true"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

