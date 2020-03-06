@extends('adminlte::page')

@section('title','Gym Log')
@section('content_header')
    <h1 style="text-align: center">Welcome to gym logger 0.1!</h1>
@stop
@section('content')
    <p>Insert your worklog</p>

    @if($errors->any())
        <div>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
        </div>
    @endif
    <form action="insert-worklog" method="post">
        {{csrf_field()}}
        <label for="data_worklog">Data</label>
        <input type="date" id="data_worklog" name="data_worklog">
        <br>
        <label for="data_worklog">Esercizio</label>
        <select name="esercizio" id="esercizio">
            @foreach($exercises as $exercise)
                <option value="{{$exercise->id}}">{{$exercise->descrizione}}</option>
            @endforeach
        </select>


        <label for="data_worklog">Serie</label>
        <input type="number" id="serie" name="serie" min="1">

        <label for="ripetizioni">Ripetizioni</label>
        <input type="number" id="ripetizioni" name="ripetizioni" min="1">

        <label for="data_worklog">Sforzo</label>
        <input type="number" id="sforzo" name="sforzo" min="1">
        <br>
        <label for="data_worklog">Unità misura sforzo</label>
        <select name="ums" id="ums">
            <option>NESSUNO SPECIFICATO</option>
            @foreach($measure_units as $um)
                <option value="{{$um->id}}">{{$um->descrizione}}</option>
            @endforeach
        </select>
        <input type="submit" class="btn btn-success">
    </form>

@endsection