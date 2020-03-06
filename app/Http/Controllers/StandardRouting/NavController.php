<?php
/**
 * Created by PhpStorm.
 * User: alceste
 * Date: 29/02/20
 * Time: 9.49
 */

namespace App\Http\Controllers\StandardRouting;


use App\Fractals\WorklogFractal;
use App\Http\Requests\InsertWorkLogRequest;
use App\Http\Resources\WorklogView;
use App\Models\Esercizio;
use App\Models\UnitaMisura;
use App\Models\Worklog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NavController extends Controller
{
    public function welcome(){
        $someWorkLogs = Worklog::view(20);
        $workLogFractal = new WorklogFractal($someWorkLogs);
        $someWorkLogsView = $workLogFractal->build();
        return view('welcome',['data'=>$someWorkLogsView]);
    }

    public function worklogs(Request $request){

        $page = $request->page;
        $data = Worklog::pagedView($page);
        $workLogFractal = new WorklogFractal($data);
        $someWorkLogsView = $workLogFractal->build();
        $count = Worklog::countViewElements();
        $page = $page ? $page : 1;
        $hasNext = $page * Worklog::PAGED_VIEW_ELEMENTS < $count;
        return view('worklogs',['data'=>$someWorkLogsView,'page'=>$page,'hasNext'=>$hasNext]);

    }

    public function insertWorkLog(Request $request){
        return view('insert-worklog',['exercises'=>Esercizio::all(),'measure_units'=>UnitaMisura::all()]);
    }

    public function performInsertWorklog(InsertWorkLogRequest $request){

        Worklog::create(
            [
                'data_worklog'=> $request->data_worklog,
                'esercizio_id'=> $request->esercizio,
                'serie'=> $request->serie,
                'ripetizioni'=> $request->ripetizioni,
                'unita_misura'=> $request->ums == 'NESSUNO SPECIFICATO'? null : $request->ums,
                'sforzo'=>$request->sforzo
            ]
        );


        return redirect()->to('/worklogs');

    }


    public function performDeleteWorklog(Request $request){
        $worklogId = $request->worklog_id;
        Worklog::deleteById($worklogId);
        return redirect()->to('/worklogs');
    }



}