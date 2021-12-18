@extends('layouts.layout')
@section('title', 'Pages')
@section('plugins.Datatables', true)
@section('content')
    @include('include.gridView', ['responses' => $pages])
@stop
