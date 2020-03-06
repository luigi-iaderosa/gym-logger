@extends('adminlte::page')

@section('title','Gym Log')
@section('content_header')
    <h1 style="text-align: center">Welcome to gym logger 0.1!</h1>
    @stop

@section('content')
    <p>Welcome to gym logger! Menus on the left hand are for montoring your performance</p>
    <p>Below you have a bit your last efforts, if any</p>
    @include('worklog_view',['data'=>$data])
@stop