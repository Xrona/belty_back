@extends('adminlte::page')

@section('adminlte_css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@stop

@section('adminlte_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
@stop
