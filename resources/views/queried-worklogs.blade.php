@extends('adminlte::page')

@section('title','Gym Log')
@section('content_header')
    <h1 style="text-align: center">Welcome to gym logger 0.1!</h1>
@stop

@section('content')
    {{csrf_field()}}
    <p>Queried results</p>
    @include('worklog_view',['data'=>$data,'editable'=>true])
@stop