<?php
/**
 * Created by PhpStorm.
 * User: alceste
 * Date: 16/03/20
 * Time: 15.48
 */

namespace App\Http\Controllers\StandardRouting;


use App\Fractals\WorklogFractal;
use App\Http\Controllers\Controller;
use App\Models\Esercizio;
use App\Models\Worklog;
use Illuminate\Http\Request;

class QueryWorklogsController extends Controller
{


    public function queryWorklogs(Request $request){


        $esercizi = Esercizio::all();
        $dates = Worklog::select('data_worklog')->distinct('data_worklog')->get()->pluck('data_worklog');
        return view('query-worklogs',['exercises'=>$esercizi,'available_dates'=>$dates]);

    }

    public function performQueryWorklogs(Request $request){
      #  dd($request->all());
        $esercizio = $request->esercizio;
        $dataInizio = $request->data_inizio ?? null;
        $dataFine = $request->data_fine ?? null;

        $worklogsFoundMainQuery = Worklog::with(['esercizio','unitaMisura'])->where('esercizio_id',$esercizio);
        if ($dataInizio){
            $worklogsFoundMainQuery = $worklogsFoundMainQuery->where('data_worklog','>=',$dataInizio);
        }
        if($dataFine){
            $worklogsFoundMainQuery = $worklogsFoundMainQuery->where('data_worklog','>=',$dataFine);
        }


        $worklogsFound = $worklogsFoundMainQuery->get();
        $worklogsFractal =  new WorklogFractal($worklogsFound);
        $worklogsFoundReturnToView =  $worklogsFractal->build();
        return view('queried-worklogs',['data'=>$worklogsFoundReturnToView]);


    }


}