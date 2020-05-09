@extends('adminlte::page')

@section('title','Gym Log')
@section('content_header')
    <h1 style="text-align: center">Welcome to gym logger 0.1!</h1>
    @stop

@section('content')
    <p>Welcome to gym logger! Menus on the left hand are unavailable until you don't login</p>

    <form action="login" method="post">
        {{csrf_field()}}
        <label for="email">email</label><br>
        <input type="text" id= "email" name="email"><br>
        <br>
        <label for="">password</label><br>
        <input type="password" id="pwd" name="pwd"><br>
        <br>
        <input type="submit">
    </form>
@stop