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
        @if(isset($q))
            <a href="{{url('worklogs?page='.($page-1).'&q='.$q)}}" style="float: left"> PREV PAGE </a>
        @else
            <a href="{{url('worklogs?page='.($page-1))}}" style="float: left"> PREV PAGE </a>
        @endif
    @endif
    @if($hasNext)
        <!-- elementi di paginazione -->
        @if(isset($q))
            <a href="{{url('worklogs?page='.($page+1).'&q='.$q)}}" style="float: right"> NEXT PAGE </a>
        @else
            <a href="{{url('worklogs?page='.($page+1))}}" style="float: right"> NEXT PAGE </a>
        @endif
    @endif
    @include('worklog_view',['data'=>$data,'editable'=>true])
    @if($page>1)
        @if(isset($q))
            <a href="{{url('worklogs?page='.($page-1).'&q='.$q)}}" style="float: left"> PREV PAGE </a>
        @else
            <a href="{{url('worklogs?page='.($page-1))}}" style="float: left"> PREV PAGE </a>
        @endif
    @endif
    @if($hasNext)
        @if(isset($q))
            <a href="{{url('worklogs?page='.($page+1).'&q='.$q)}}" style="float: right"> NEXT PAGE </a>
        @else
            <a href="{{url('worklogs?page='.($page+1))}}" style="float: right"> NEXT PAGE </a>
        @endif
    @endif
@stop