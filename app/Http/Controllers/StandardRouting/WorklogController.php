<?php
/**
 * Created by PhpStorm.
 * User: alceste
 * Date: 28/02/20
 * Time: 19.48
 */
namespace App\Http\Controllers\StandardRouting;
use App\Http\Resources\WorklogView;
use App\Models\Esercizio;
use App\Models\UnitaMisura;
use App\Models\Worklog;

class WorklogController extends \Illuminate\Routing\Controller
{
    public function elencoWorklog(){
        return response()->json(['elenco_wklg'=>Worklog::all()]);
    }

    public function elencoWorklogView(){
        $data = Worklog::view();
        $dataAsResource = WorklogView::collection($data);
        return response()->json(['wklg_view'=>$dataAsResource]);
    }


}