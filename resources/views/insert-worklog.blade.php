@extends('adminlte::page')

@section('title','Gym Log')
@section('content_header')
    <h1 style="text-align: center">Welcome to gym logger 0.1!</h1>
@stop
@section('content')
     @if(!isset($worklog))
        <p>Insert your worklog</p>
    @else
         <p>Update your worklog</p>
    @endif
    @if($errors->any())
        <div>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
        </div>
    @endif
    <form method="post">
        {{csrf_field()}}
        @if(isset($worklog))
            <input type="hidden" name="worklog_id" id="worklog_id" value="{{$worklog->id}}">
        @endif
        <label for="data_worklog">Data</label>
        <input type="date" id="data_worklog" name="data_worklog" value="{{isset($worklog) ? $worklog->data_worklog : null}}">
        <br>
        <label for="data_worklog">Esercizio</label>
        <select name="esercizio" id="esercizio">
            @foreach($exercises as $exercise)
                @if(isset($worklog))
                    @if($exercise->id == $worklog->esercizio_id)
                        <option value="{{$exercise->id}}" selected>{{$exercise->descrizione}}</option>
                    @else
                        <option value="{{$exercise->id}}">{{$exercise->descrizione}}</option>
                    @endif
                @else
                <option value="{{$exercise->id}}">{{$exercise->descrizione}}</option>
                @endif
            @endforeach
        </select>

        <label for="data_worklog">Serie</label>
        <input type="number" id="serie" name="serie" min="1" value="{{isset($worklog) ? $worklog->serie : null}}">

        <label for="ripetizioni">Ripetizioni</label>
        <input type="number" id="ripetizioni" name="ripetizioni" min="1"
               value="{{isset($worklog) ? $worklog->ripetizioni : null}}">

        <label for="data_worklog">Sforzo</label>
        <input type="number" id="sforzo" name="sforzo" min="1"
               value="{{isset($worklog) ? $worklog->sforzo : null}}">
        <br>
        <label for="data_worklog">Unità misura sforzo</label>
        <select name="ums" id="ums">
            <option>NESSUNO SPECIFICATO</option>
            @foreach($measure_units as $um)
                @if(isset($worklog))
                    @if($worklog->unita_misura_id == $um->id)
                    <option value="{{$um->id}}" selected>{{$um->descrizione}}</option>
                    @else
                        <option value="{{$um->id}}">{{$um->descrizione}}</option>
                    @endif
                @else
                    <option value="{{$um->id}}">{{$um->descrizione}}</option>
                @endif
            @endforeach
        </select>
        <input type="submit" class="btn btn-success">
    </form>

@endsection