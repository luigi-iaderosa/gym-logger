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
        if (!$request->q){
            $data = Worklog::pagedView($page);
        }
        else {
            $data = Worklog::searchAllFieldsPagedView($page,$request->q);
        }

        $workLogFractal = new WorklogFractal($data);
        $someWorkLogsView = $workLogFractal->build();
        $count = Worklog::countViewElements();
        $page = $page ? $page : 1;
        $hasNext = $page * Worklog::PAGED_VIEW_ELEMENTS < $count;
        $data = ['data'=>$someWorkLogsView,'page'=>$page,'hasNext'=>$hasNext];
        if ($request->q){
            $data['q']=$request->q;
        }
        return view('worklogs',$data);

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


    public function editWorklog(Request $request){

        $worklogId = $request->worklog_id;
        $worklog = Worklog::byId($worklogId);
        $ums = UnitaMisura::all();
        $esercizi = Esercizio::all();
        return view('insert-worklog',['worklog' => $worklog, 'measure_units'=>$ums,'exercises'=>$esercizi]);
    }


    public function performEditWorklog(Request $request){
         Worklog::updateById(
            $request->worklog_id,
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


}