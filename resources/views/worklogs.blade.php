@extends('adminlte::page')

@section('title','Gym Log')
@section('content_header')
    <h1 style="text-align: center">Welcome to gym logger 0.1!</h1>
@stop

@section('content')
    {{csrf_field()}}
    <p>Below you have a bit of your last efforts</p>
    <p>Scroll the pages until you get the range you want</p>
    <button class="btn btn-info insert-record">INSERT RECORD!</button>
    <br>
    @if($page>1)
        <a href="{{url('worklogs?page='.($page-1))}}" style="float: left"> PREV PAGE </a>
    @endif
    @if($hasNext)
        <!-- elementi di paginazione -->
        <a href="{{url('worklogs?page='.($page+1))}}" style="float: right"> NEXT PAGE </a>
    @else()
    @endif
    @include('worklog_view',['data'=>$data,'editable'=>true])
    @if($page>1)
        <a href="{{url('worklogs?page='.($page-1))}}" style="float: left"> PREV PAGE </a>
    @endif
    @if($hasNext)
        <!-- elementi di paginazione -->
        <a href="{{url('worklogs?page='.($page+1))}}" style="float: right"> NEXT PAGE </a>
    @else()
    @endif
@stop