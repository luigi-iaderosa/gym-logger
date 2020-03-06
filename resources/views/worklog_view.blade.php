
<table class="table table-striped">
    <thead>
        <th>
            Data Worklog
        </th>
    <th>
        Esercizio
    </th>
    <th>
        serie
    </th>
    <th>
        ripetizioni
    </th>
        <th>
            sforzo
        </th>
    <th>
        Unità di misura
    </th>
    <th>
        Sforzo valore indicativo <br>
        (difficoltà intrinseca di un esercizio)
    </th>

    </thead>
    <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{$d->data_worklog}}</td>
                <td>{{$d->esercizio}}</td>
                <td>{{$d->serie}}</td>
                <td>{{$d->ripetizioni}}</td>
                <td>{{$d->sforzo}}</td>
                <td>{{$d->unita_misura}}</td>
                <td>{{$d->valore_assoluto}}</td>
                @if(isset($editable))
                    <td><button type="button" class="btn btn-danger worklog-view-button" data-worklogId="{{$d->id}}">CANCELLA </button></td>
                    <td><button type="button" class="btn btn-warning worklog-view-button" data-worklogId="{{$d->id}}">MODIFICA</button></td>
                @endif
            </tr>
        @endforeach
    </tbody>

</table>

