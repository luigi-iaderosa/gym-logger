@extends('adminlte::page')

@section('title','Gym Log')
@section('content_header')
    <h1 style="text-align: center">Welcome to gym logger 0.1!</h1>
@stop
@section('content')
    <form method="post">
        {{csrf_field()}}

        <label for="data_worklog" style="padding-right: 12px;">Esercizio</label>
        <select class="select2_select" name="esercizio" id="esercizio" style="width: 18%;">
            @foreach($exercises as $exercise)
                    <option value="{{$exercise->id}}">{{$exercise->descrizione}}</option>
            @endforeach
        </select>
        <br>


        <label for="data_worklog">Data Inizio</label>
        <select class="select2_select" style="width: 13%" name="data_inizio" id="data_inizio">
            @foreach($available_dates as $date)
                <option value="{{$date}}">{{$date}}</option>
            @endforeach
        </select>
        <br>
        <label for="data_worklog" style="padding-right: 9px">Data Fine</label>
        <select class="select2_select" style="width: 13%" name="data_fine" id="data_fine">
            @foreach($available_dates as $date)
                <option value="{{$date}}">{{$date}}</option>
            @endforeach
        </select>
        <br>

        <input type="submit" class="btn btn-success">
    </form>

@endsection