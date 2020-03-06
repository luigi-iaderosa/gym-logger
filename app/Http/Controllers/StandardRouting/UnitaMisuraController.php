<?php
/**
 * Created by PhpStorm.
 * User: alceste
 * Date: 28/02/20
 * Time: 19.48
 */
namespace App\Http\Controllers\StandardRouting;
use App\Models\Esercizio;
use App\Models\UnitaMisura;

class UnitaMisuraController extends \Illuminate\Routing\Controller
{
    public function unitaMisura(){
        return response()->json(['unita_misura'=>UnitaMisura::all()]);
    }
}